<?php

namespace Modules\Admin\Http\Controllers;

use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Modules\Admin\Entities\Admin;
use Modules\Admin\Entities\Role;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("admin.authenticate:admin");
    }

    /**
     * Display a listing of the resource.
     * @return Factory|View
     */
    public function index()
    {
        abort_unless(current_admin()->can('access-admins'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = "All Administrators";
        $table_cols = [
            "Full Name",
            "Email",
            "Role",
            "Created on"
        ];
        $admins = Admin::all();
        $admins = $admins->map(function ($data) {
            $current = Carbon::now();
            $future = $current->addMonth();
            return [
                "id" => $data->id,
                "roles" => $data->roles()->get()->map(function ($roles) {
                    return $roles->title;
                }),
                "full_name" => $data->first_name . " " . $data->last_name,
                "email" => $data->email,
                'created_on' => $data->created_at,
            ];
        });
        return view('admin::administrators.index', compact("title", "table_cols", "admins"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|View
     */
    public function create()
    {
        abort_unless(current_admin()->can('create-admins'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $title = "Create Administrator";
        $roles = Role::all()->mapWithKeys(function ($data) {
            return [$data->id => $data->title];
        });
        return view('admin::administrators.create', compact("title", "roles"));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function store(Request $request)
    {
        abort_unless(current_admin()->can('create-admins'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'first_name' => "required|min:2|max:30",
            'last_name' => "required|min:2|max:30",
            'email' => "required|email|unique:admins",
            'password' => "required|confirmed|min:6",
            "role" => "required",
        ]);

        $admin = new Admin;
        $admin->first_name = $request->input("first_name");
        $admin->last_name = $request->input("last_name");
        $admin->email = $request->input("email");
        $admin->password = bcrypt($request->input("password"));
        $admin->save();

        // synchronize the roles
        $admin->roles()->sync($request->input("role"));

        $this->notify("Administrator Created Successfully, Roles Attached Successfully");

        // return the admin to the dashboard
        return redirect()->route("admin.admins.show", $admin->id);
    }

    /**
     * Show the specified resource.
     * @param Admin $admin
     * @return Factory|View
     */
    public function show(Admin $admin)
    {
        abort_unless(current_admin()->can('read-admins'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::all()->mapWithKeys(function ($data) {
            return [$data->id = $data->title];
        });
        $role = $admin->roles()->allRelatedIds();
        $title = "Viewing Administrator Account";
        return view('admin::administrators.show', compact('admin', "roles", "role", "title"));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Admin $admin
     * @return Factory|View
     */
    public function edit(Admin $admin)
    {
        abort_unless(current_admin()->can('update-admins'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::all()->mapWithKeys(function ($data) {
            return [$data->id => $data->title];
        });
        $role = $admin->roles()->allRelatedIds();
        $title = "Edit Administrator Account";
        return view('admin::administrators.edit', compact('admin', "roles", "role", "title"));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Admin $admin
     * @return RedirectResponse|void
     */
    public function update(Request $request, Admin $admin)
    {
        abort_unless(current_admin()->can('update-admins'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'first_name' => "required|min:2|max:30",
            'last_name' => "required|min:2|max:30",
            "role" => "required",
        ]);

        $admin->first_name = $request->input("first_name");
        $admin->last_name = $request->input("last_name");
        $admin->save();

        // synchronize the roles
        $admin->roles()->sync($request->input("role"));

        $this->notify("Administrator Updated Successfully, Roles Updated Successfully");

        // return the admin to the dashboard
        return redirect()->route("admin.admins.show", $admin->id);
    }

    /**
     * Remove the specified resource from storage.
     * @param Admin $admin
     * @return RedirectResponse|void
     * @throws Exception
     */
    public function destroy(Admin $admin)
    {
        abort_unless(current_admin()->can('delete-admins'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // remove all roles on the admin
        $admin->detachRoles();
        $admin->delete();

        $this->notify("Administrator Deleted Successfully, Roles Detached Successfully");

        // return the admin to the dashboard
        return redirect()->route("admin.admins.index");
    }

    /**
     * generate form for the password
     *
     * @param Admin $admin
     * @return Factory|View
     */
    public function changePasswordForm(Admin $admin)
    {
        abort_unless(current_admin()->can('update-profile'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = "Change Password";
        return view("admin::administrators.change-password", compact("title", 'admin'));
    }

    /**
     * save the new password for the admin
     *
     * @param Request $request
     * @param Admin $admin
     * @return RedirectResponse
     */
    public function saveChangePassword(Request $request, Admin $admin)
    {
        abort_unless(current_admin()->can('update-profile'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'old_password' => 'required|max:30|min:6',
            'password' => 'max:30|min:6|confirmed',
        ]);

        if (!Hash::check($request->old_password, $admin->getAuthPassword())) {
            $this->notify("Your Old Password is incorrect", "error");
        }

        $admin->password = bcrypt($request->new_password);
        $admin->save();

        $this->notify("Password Changed Successfully");
        return redirect()->route("admin.admins.show", $admin->id);
    }
}
