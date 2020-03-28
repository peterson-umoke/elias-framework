<?php

namespace Modules\Admin\Http\Controllers;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Modules\Admin\Entities\Permission;

class PermissionsController extends Controller
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
        abort_unless(current_admin()->can('access-acl'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = "All Permissions";
        $table_cols = [
            "Name",
            "Key",
            "Created on"
        ];
        $datas = Permission::all();
        return view('admin::permissions.index', compact("title", "table_cols", "datas"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|Response|View
     */
    public function create()
    {
        abort_unless(current_admin()->can('create-acl'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $title="Create Permission";
        return view('admin::permissions.create', compact("title"));
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
            "name" => "required|min:5",
            "title" => "required|min:5",
            "description" => "nullable|min:5",
        ]);

        $permission = new Permission;
        $permission->name = $request->name;
        $permission->title = $request->title;
        $permission->description = $request->description;
        $permission->save();

        $this->notify("Permission Created Successfully");
        return redirect()->route("admin.permissions.show", $permission->id);
    }

    /**
     * Show the specified resource.
     * @param Permission $permission
     * @return Factory|View
     */
    public function show(Permission $permission)
    {
        abort_unless(current_admin()->can('read-acl'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = "View Permission";
        return view('admin::permissions.show', compact("title", "permission"));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Permission $permission
     * @return Factory|View
     */
    public function edit(Permission $permission)
    {
        abort_unless(current_admin()->can('update-acl'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = "Edit Permission";
        return view('admin::permissions.edit', compact("title", "permission"));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Permission $permission
     * @return RedirectResponse
     */
    public function update(Request $request, Permission $permission)
    {
        abort_unless(current_admin()->can('update-acl'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            "name" => "required|min:5",
            "title" => "required|min:5",
            "description" => "nullable|min:5",
        ]);

        $permision->name = $request->name;
        $permision->title = $request->title;
        $permision->description = $request->description;
        $permission->save();

        $this->notify("Permission Created Successfully");
        return redirect()->route("admin.permissions.show", $permision->id);
    }

    /**
     * Remove the specified resource from storage.
     * @param Permission $permission
     * @return Response
     * @throws Exception
     */
    public function destroy(Permission $permission)
    {
        abort_unless(current_admin()->can('delete-acl'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission->roles()->detach();
        $permission->delete();

        $this->notify("Permission Deleted Successfully, Roles Detached From Permissions Successfully");

        // return the admin to the dashboard
        return redirect()->route("admin.admins.index");
    }
}
