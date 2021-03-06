@extends("admin::layouts.page")
@section("title",$title)
@section("page_title",$title)
@section("page_breadcrumbs",Breadcrumbs::render("admin.roles.show", $title, $role->id))
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">
                    <div class="float-left">
                        {!! Form::open(["route" => ["admin.roles.destroy", $role->id],"method" => "delete"]) !!}
                        @if(current_admin()->can("update-acl"))
                            <a href="{{route("admin.roles.edit", $role->id)}}" class="btn btn-success"><i
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
                            <td>{{$role->title}}</td>
                        </tr>
                        <tr>
                            <td>Key:</td>
                            <td>{{$role->name}}</td>
                        </tr>
                        <tr>
                            <td>Description:</td>
                            <td>{{$role->description}}</td>
                        </tr>
                        <tr>
                            <td>Current Permissions:</td>
                            <td>
                                @foreach($role->permissions()->get() as $permission)
                                    <span class="badge badge-primary">
                                        {{$permission->title}}
                                    </span>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <h5 class="card-header">
            <div class="float-left">
                All Administrators attached to this role
            </div>
        </h5>
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataThings" class="table table-striped table-bordered initDatatables">
                    <thead>
                    <tr>
                        @foreach($table_cols as $cols)
                            <th>{{$cols}}</th>
                        @endforeach
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $admin)
                        <tr data-entry-id="{{$admin['id']}}">
                            <td>{{$admin->first_name . " " . $admin->last_name}}</td>
                            <td>{{$admin["email"]}}</td>
                            <td>{{$admin->created_at->format("d-M-Y")}}</td>
                            <td style="width: 22%;">
                                {!! Form::open(["route" => ["admin.admins.destroy", "admin" => $admin["id"]],"method" => "delete"]) !!}
                                @if(current_admin()->can("update-admins"))
                                    <a title="Edit Profile" href="{{route("admin.admins.edit", ["admin" => $admin['id']])}}"
                                       class="btn btn-success btn-sm"><i
                                            class="fas fa-edit fa-fw"></i></a>
                                @endif
                                @if(current_admin()->can("update-profile"))
                                    <a title="Change Password" href="{{route("admin.admins.password.change", ["admin" => $admin['id']])}}"
                                       class="btn btn-brand btn-sm"><i
                                            class="fas fa-lock fa-fw"></i></a>
                                @endif
                                @if(current_admin()->can("read-admins"))
                                    <a title="View Profile" href="{{route("admin.admins.show",["admin" => $admin["id"]])}}"
                                       class="btn btn-primary btn-sm">
                                        <i class="fas fa-eye fa-fw"></i>
                                    </a>
                                @endif
                                @if(current_admin()->id != $admin['id'] && current_admin()->can("delete-admins"))
                                    <button title="Delete Account" type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash-alt fa-fw"></i>
                                    </button>
                                @endif
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        @foreach($table_cols as $cols)
                            <th>{{$cols}}</th>
                        @endforeach
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@push("css")
    <link rel="stylesheet" type="text/css" href="{{admin_asset('vendor/datatables/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{admin_asset('vendor/datatables/css/buttons.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{admin_asset('vendor/datatables/css/select.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{admin_asset('vendor/datatables/css/fixedHeader.bootstrap4.css')}}">
@endpush

@push("js")

    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"
    ></script>
    <script src="{{admin_asset("vendor/datatables/js/dataTables.bootstrap4.min.js")}}"
    ></script>
    <script src="//cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"
    ></script>
    <script src="{{admin_asset("vendor/datatables/js/buttons.bootstrap4.min.js")}}"
    ></script>
    <script src="{{admin_asset("vendor/datatables/js/data-table.js")}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"
    ></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"
    ></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"
    ></script>
    <script src="//cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"
    ></script>
    <script src="//cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"
    ></script>
    <script src="//cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"
    ></script>
    <script src="//cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"
    ></script>
    <script src="//cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"
    ></script>
    <script src="//cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"
    ></script>
    <script>
        (function ($) {
            $(document).ready(function () {
                if ($("table.initDatatables").length) {
                    var table = $('table.initDatatables').DataTable({
                        // lengthChange: false,
                        "order": [[0, "asc"]],
                        // buttons: ['excel', 'pdf', 'print', 'colvis'],
                        "columnDefs": [
                            // {
                            //     "targets": [0],
                            //     "visible": true,
                            //     "searchable": true,
                            //     "sortable": true,
                            // },
                            // {
                            //     "targets": [4],
                            //     "visible": true,
                            //     "searchable": false,
                            //     "sortable": false,
                            // },
                        ],
                    });

                    // table.buttons().container()
                    //     .appendTo('#dataThings_wrapper .col-md-6:eq(0)');
                }
            });
        })(jQuery);
    </script>
@endpush
