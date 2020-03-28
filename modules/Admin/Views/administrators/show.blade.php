@extends("admin::layouts.page")
@section("title",$title)
@section("page_title",$title)
@section("page_breadcrumbs",Breadcrumbs::render("admin.admins.show", $title, $admin->id))
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">
                    <div class="float-left">
                        {!! Form::open(["route" => ["admin.admins.destroy", "admin" => $admin->id],"method" => "delete"]) !!}
                        @if(current_admin()->can("update-admins"))
                            <a href="{{route("admin.admins.edit", $admin->id)}}" class="btn btn-success"><i
                                    class="fas fa-edit"></i> Edit Account</a>
                        @endif
                        @if(current_admin()->can("update-profile"))
                            <a href="{{route("admin.admins.password.change", $admin->id)}}" class="btn btn-brand"><i
                                    class="fas fa-lock"></i> Change Password</a>
                        @endif
                        @if(current_admin()->id != $admin->id && current_admin()->can("delete-admins"))
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
                            <td>{{$admin->first_name . " "  . $admin->last_name}}</td>
                        </tr>
                        <tr>
                            <td>Email Address:</td>
                            <td>{{$admin->email}}</td>
                        </tr>
                        <tr>
                            <td>Current Role:</td>
                            <td>
                                <span class="badge badge-primary">
                                    {{$admin->roles()->first()->title}}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
