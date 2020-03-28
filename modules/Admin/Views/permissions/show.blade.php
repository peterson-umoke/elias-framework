@extends("admin::layouts.page")
@section("title",$title)
@section("page_title",$title)
@section("page_breadcrumbs",Breadcrumbs::render("admin.permissions.show", $title, $permission->id))
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">
                    <div class="float-left">
                        {!! Form::open(["route" => ["admin.permissions.destroy", $permission->id],"method" => "delete"]) !!}
                        @if(current_admin()->can("update-acl"))
                            <a href="{{route("admin.permissions.edit", $permission->id)}}" class="btn btn-success"><i
                                    class="fas fa-edit"></i> Edit</a>
                        @endif
                        @if(current_admin()->can("delete-acl"))
                            <button title="Delete Account" type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash-alt fa-fw"></i> Delete
                            </button>
                        @endif
                        {!! Form::close() !!}
                    </div>
                </h5>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td style="width: 20%;">Title:</td>
                            <td>{{$permission->title}}</td>
                        </tr>
                        <tr>
                            <td>Key:</td>
                            <td>{{$permission->name}}</td>
                        </tr>
                        <tr>
                            <td>Description:</td>
                            <td>{{$permission->description}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
