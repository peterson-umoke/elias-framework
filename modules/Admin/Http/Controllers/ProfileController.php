<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Admin;

class ProfileController extends Controller
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

    public function getProfile()
    {
        abort_unless(current_admin()->can('read-profile'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = "My Profile";
        $admin = current_admin();
        return view("admin::profile.edit", compact("title", "admin"));
    }

    public function saveProfile(Request $request)
    {
        abort_unless(current_admin()->can('update-profile'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'first_name' => "required|min:2|max:30",
            'last_name' => "required|min:2|max:30",
        ]);

        $admin = current_admin();
        $admin->first_name = $request->input("first_name");
        $admin->last_name = $request->input("last_name");
        $admin->save();

        $this->notify("Profile Updated Successfully");

        // return the admin to the dashboard
        return redirect()->back();
    }

    public function changePassword()
    {
        abort_unless(current_admin()->can('read-profile'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = "Change My Password";
        $admin = current_admin();
        return view("admin::profile.change-password", compact("title"));
    }

    public function savePassword(Request $request)
    {
        abort_unless(current_admin()->can('update-profile'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'old_password' => 'required|max:30|min:6',
            'password' => 'max:30|min:6|confirmed',
        ]);

        $admin = current_admin();
        if (!Hash::check($request->old_password, $admin->getAuthPassword())) {
            $this->notify("Your Old Password is incorrect", "error");
        }

        $admin->password = bcrypt($request->new_password);
        $admin->save();

        $this->notify("Password Changed Successfully");
        return redirect()->back();
    }
}
