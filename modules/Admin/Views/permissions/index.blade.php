@extends("admin::layouts.page")
@section("title",$title)
@section("page_title",$title)
@section("page_breadcrumbs",Breadcrumbs::render("admin.permissions.index", $title))
@section("content")
    <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">
                    <div class="float-left">
                        @if(current_admin()->can("create-acl"))
                            <a href="{{route("admin.permissions.create")}}" class="btn btn-primary"><i
                                    class="fas fa-plus fa-fw"></i> Create</a>
                        @endif
                        @if(current_admin()->can("delete-acl"))
                            <a id="bulkDeleteBtn" href="{{route("admin.permissions.create")}}" class="btn btn-danger"><i
                                    class="fas fa-trash fa-fw"></i> Delete</a>
                        @endif
                    </div>
                </h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataThings" class="table table-striped table-bordered initDatatables">
                            <thead>
                            <tr>
                                <th>
                                    <label class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="selectAllTop"
                                               type="checkbox" value="Check All"><span class="custom-control-label"></span>
                                    </label>
                                </th>
                                @foreach($table_cols as $cols)
                                    <th>{{$cols}}</th>
                                @endforeach
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                                <tr>
                                    <td style="width: 1%;">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input selectem"
                                                   name="bulkSelect[]" value="{{$data->id}}"><span
                                                class="custom-control-label"></span>
                                        </label>
                                    </td>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <td style="width: 17%;">
                                        {!! Form::open(["route" => ["admin.permissions.destroy", "permission" => $data->id],"method" => "delete"]) !!}
                                        @if(current_admin()->can("update-acl"))
                                            <a href="{{route("admin.permissions.edit", ["permission" => $data->id])}}"
                                               class="btn btn-success btn-sm"><i
                                                    class="fas fa-edit fa-fw"></i></a>
                                        @endif
                                        @if(current_admin()->can("read-acl"))
                                            <a href="{{route("admin.permissions.show",["permission" => $data->id])}}"
                                               class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye fa-fw"></i>
                                            </a>
                                        @endif
                                        @if(current_admin()->can("delete-acl"))
                                            <button type="submit" class="btn btn-danger btn-sm">
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
                                <th>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                               id="selectAllFooter" value="Check All"><span class="custom-control-label"></span>
                                    </label>
                                </th>
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
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
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
{{--    <script src="{{admin_asset("vendor/datatables/js/data-table.js")}}"></script>--}}
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
                        "order": [[1, "asc"]],
                        // buttons: ['excel', 'pdf', 'print', 'colvis'],
                        "columnDefs": [
                            {
                                "targets": [0],
                                "visible": true,
                                "searchable": false,
                                "sortable": false,
                            },
                            {
                                "targets": [4],
                                "visible": true,
                                "searchable": false,
                                "sortable": false,
                            },
                        ],
                    });

                    // table.buttons().container()
                    //     .appendTo('#dataThings_wrapper .col-md-6:eq(0)');
                }
            });
        })(jQuery);
    </script>
@endpush
