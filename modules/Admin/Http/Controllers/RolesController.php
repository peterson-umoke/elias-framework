<?php

namespace Modules\Admin\Http\Controllers;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Modules\Admin\Entities\Permission;
use Modules\Admin\Entities\Role;

class RolesController extends Controller
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
     * @return Factory|Response|View
     */
    public function index()
    {
        abort_unless(current_admin()->can('access-acl'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $title = "All Roles";
        $table_cols = [
            "Name",
            "Key",
            "Created on"
        ];
        $datas = Role::all();
        return view('admin::roles.index', compact("title", "table_cols", "datas"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|Response|View
     */
    public function create()
    {
        abort_unless(current_admin()->can('create-acl'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = "Create Role";
        $permissions = Permission::orderBy("title","asc")->get()->mapWithKeys(function ($data) {
            return [$data->id => $data->title];
        });
        return view('admin::roles.create', compact("title", "permissions"));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function store(Request $request)
    {
        abort_unless(current_admin()->can('create-acl'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            "name" => "required|min:2",
            "title" => "required|min:2",
            "description" => "nullable|min:5",
            "permissions" => "required",
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->title = $request->title;
        $role->description = $request->description;
        $role->save();
        $role->permissions()->sync($request->permissions);

        $this->notify("Role Created Successfully, Permissions Attached Successfully");
        return redirect()->route("admin.roles.show", $role->id);
    }

    /**
     * Show the specified resource.
     * @param Role $role
     * @return Factory|Response|View
     */
    public function show(Role $role)
    {
        abort_unless(current_admin()->can('read-acl'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = "View Role";
        $permissions = Permission::all()->mapWithKeys(function ($data) {
            return [$data->id => $data->title];
        });
        $permission = $role->permissions()->allRelatedIds();
        $admins = $role->getUsersRelationValue("users")->all();
        $table_cols = [
            "Full Name",
            "Email",
            "Created on"
        ];
        return view('admin::roles.show', compact("title", "permissions", "permission", "role","admins","table_cols"));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Role $role
     * @return Factory|Response|View
     */
    public function edit(Role $role)
    {
        abort_unless(current_admin()->can('update-acl'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = "Edit Role";
        $permissions = Permission::all()->mapWithKeys(function ($data) {
            return [$data->id => $data->title];
        });
        $permission = $role->permissions()->allRelatedIds();
        return view('admin::roles.edit', compact("title", "permissions", "permission", "role"));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
        abort_unless(current_admin()->can('update-acl'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            "name" => "required|min:2",
            "title" => "required|min:2",
            "description" => "nullable|min:5",
            "permissions" => "required|array",
        ]);

        $role->name = $request->name;
        $role->title = $request->title;
        $role->description = $request->description;
        $role->save();
        $role->permissions()->sync($request->permissions);

        $this->notify("Role Updated Successfully, Permissions Attached Successfully");
        return redirect()->route("admin.roles.show", $role->id);
    }

    /**
     * Remove the specified resource from storage.
     * @param Role $role
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Role $role)
    {
        abort_unless(current_admin()->can('delete-acl'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $title = $role->title;

        $role->permissions()->detach(); // detach the permissions
        $admins = $role->getUsersRelationValue("users")->all(); // detach the users
        foreach($admins as $admin) {
            $admin->roles()->detach();
        }
        $role->delete(); // delete role
//
        $this->notify("Role Deleted Successfully, Administrators and Permissions Detached Successfully as well","success",$title . " Role Deleted");
        return redirect()->route("admin.roles.index");
    }
}
