@extends("admin::layouts.page")
@section("title",$title)
@section("page_title",$title)
@section("page_breadcrumbs",Breadcrumbs::render("admin.customers.show", $title, $customer->id))
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">
                    <div class="float-left">
                        {!! Form::open(["route" => ["admin.customers.destroy", $customer->id],"method" => "delete"]) !!}
                        @if(current_admin()->can("update-customers"))
                            <a href="{{route("admin.customers.edit", $customer->id)}}" class="btn btn-success"><i
                                    class="fas fa-edit"></i> Edit Account</a>
                        @endif
                        @if(current_admin()->can("update-profile"))
                            <a href="{{route("admin.customers.password.change", $customer->id)}}" class="btn btn-brand"><i
                                    class="fas fa-lock"></i> Change Password</a>
                        @endif
                        @if(current_admin()->can("delete-customers"))
                            <button title="Delete Account" type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash-alt fa-fw"></i> Delete Account
                            </button>
                        @endif
                        {!! Form::close() !!}
                    </div>
                </h5>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td style="width: 20%;">Full Name:</td>
                            <td>{{$customer->first_name . " "  . $customer->last_name}}</td>
                        </tr>
                        <tr>
                            <td>Email Address:</td>
                            <td>{{$customer->email}}</td>
                        </tr>
                        <tr>
                            <td>Phone Number:</td>
                            <td>
                                {{$customer->phone_number}}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
