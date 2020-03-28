<?php

namespace Modules\Customer\Http\Controllers\Admin;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Modules\Admin\Http\Controllers\Controller;
use Modules\Customer\Entities\Customer;

class CustomerController extends Controller
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
        abort_unless(current_admin()->can('access-customers'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::all();
        $title = "All Customers";
        $table_cols = [
            "Full Name",
            "Email",
            "Phone Number",
            "Created on"
        ];

        return view('customer::admin.index', compact('customers', 'title', "table_cols"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|Response|View
     */
    public function create()
    {
        abort_unless(current_admin()->can('create-customers'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = "Create Customer";
        return view('customer::admin.create', compact("title"));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function store(Request $request)
    {
        abort_unless(current_admin()->can('create-customers'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            "first_name" => "required|min:3",
            "last_name" => "required|min:3",
            "email" => "required|min:5|unique:users",
            "phone_number" => "required|min:5",
            "password" => "required|min:6|confirmed",
        ]);

        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone_number = $request->phone_number;
        $customer->password = bcrypt($request->password);
        $customer->save();

        $this->notify("Customer Created Successfully");
        return redirect()->route("admin.customers.show", $customer->id);
    }

    /**
     * Show the specified resource.
     * @param Customer $customer
     * @return Factory|Response|View
     */
    public function show(Customer $customer)
    {
        abort_unless(current_admin()->can('read-customers'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = "Viewing Customer";

        return view('customer::admin.show', compact("customer", "title"));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Customer $customer
     * @return Factory|Response|View
     */
    public function edit(Customer $customer)
    {
        abort_unless(current_admin()->can('update-customers'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = "Editing Customer";
        return view('customer::admin.edit', compact('customer', 'title'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Customer $customer
     * @return RedirectResponse|Response
     */
    public function update(Request $request, Customer $customer)
    {
        abort_unless(current_admin()->can('update-customers'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            "first_name" => "required|min:3",
            "last_name" => "required|min:3",
            "phone_number" => "required|min:5",
        ]);

        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone_number = $request->phone_number;
        $customer->save();

        $this->notify("Customer Updated Successfully");
        return redirect()->route("admin.customers.show", $customer->id);
    }

    /**
     * Remove the specified resource from storage.
     * @param Customer $customer
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Customer $customer)
    {
        abort_unless(current_admin()->can('delete-customers'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $customer->delete();
        $this->notify("Customer Deleted Successfully");

        return redirect()->route("admin.customers.index");
    }

    /**
     * generate form for the password
     *
     * @param Customer $customer
     * @return Factory|View
     */
    public function changePasswordForm(Customer $customer)
    {
        abort_unless(current_admin()->can('update-customers'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = "Change Password";
        return view("customer::admin.change-password", compact("title", 'customer'));
    }

    /**
     * save the new password for the admin
     *
     * @param Request $request
     * @param Customer $customer
     * @return RedirectResponse
     */
    public function saveChangePassword(Request $request, Customer $customer)
    {
        abort_unless(current_admin()->can('update-customers'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'old_password' => 'required|max:30|min:6',
            'password' => 'max:30|min:6|confirmed',
        ]);

        if (!Hash::check($request->old_password, $customer->getAuthPassword())) {
            $this->notify("Your Old Password is incorrect", "error");
        }

        $customer->password = bcrypt($request->new_password);
        $customer->save();

        $this->notify("Password Changed Successfully");
        return redirect()->route("admin.customers.show", $customer->id);
    }
}
