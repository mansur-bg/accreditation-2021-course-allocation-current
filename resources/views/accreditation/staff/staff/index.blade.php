@extends('accreditation.staff.layouts.app',['page_title'=>'CS Course Allocation | Staff'])

@section('css-before')

@endsection

@section('css-after')
    <!-- Switchery css -->
    <link href="{{asset('assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet">
    <!-- DataTables css -->
    <link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive Datatable css -->
    <link href="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/flag-icon.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <!-- Start row -->
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-round btn-outline-primary my-1" data-toggle="modal" data-target=".bd-example-modal-lg"><i class='far fa-plus'></i></button>
{{--            <a  href='".URL::signedRoute('staff.staff.show', ['staff'=>$row->id])."' class='d-inline justify-content-center align-items-center btn btn-round btn-outline-primary'><i class='far fa-eye' role='button'></i></a>--}}
        </div>
        <!-- Start col -->

        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="row">
                <div class="col-12" id="ajax_messages_table"></div>
            </div>
        <div class="table-responsive">
            <table class="table table-bordered data-table" style="width: 100%;">
                <thead>
                <tr style="color: black">
                    <th>#</th>
                    <th></th>
{{--                    <th>P100</th>--}}
                    <th>Name</th>
                    <th>Rank</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th style="width: 160px">Action</th>
                </tr>
                </thead>
                <tbody style="color: black">
                </tbody>
            </table>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
        <!-- Large modal -->
        <div class="modal fade bd-example-modal-lg" id="modals-slide-in" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleLargeModalLabel"><i class="fa fa-user-plus"></i> Add Staff</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="ajax_messages"></div>
{{--                    <form method="post" action="{{URL::signedRoute('staff.staff.store')}}">--}}
                    <form method="post">
                        @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card m-b-30">
                                    <div class="row no-gutters">
{{--                                        <div class="col-md-4">--}}
{{--                                            <img src="{{asset('assets/photos/staff/no-image.jpg')}}" style="height: 400px; width: 100%" class="card-img" alt="Card image">--}}
{{--                                        </div>--}}
                                        <div class="col-12">
                                            <div class="card-body">
{{--                                                <h5 class="card-title font-18"> Add Staff</h5>--}}

                                    @foreach($controls as $control)
                                        <div class="form-group row">
                                            <label for="{{$control['name']}}" class="col-sm-4 col-form-label my-n1 text-right">{{$control['label']}}</label>
                                            <div class="col-sm-8">
                                                @if($control['control'] == 'text')
                                                    <input type="text" class="form-control my-n1" id="{{$control['name']}}" name="{{$control['name']}}" aria-describedby="{{$control['name']}}" value="{{old($control['name']) ?? $control['value']}}">
                                                @elseif($control['control'] == 'select')
                                                    <select class="form-control my-n1" id="{{$control['name']}}" name="{{$control['name']}}">
                                                        <option value="">Select {{$control['label']}}</option>
                                                        @foreach($control['options'] as $option)
                                                            {{--                                                        @if($option == $control['value'])--}}
                                                            {{--                                                            <option selected="selected" >{{$option}}</option>--}}
                                                            {{--                                                        @else--}}
                                                            {{--                                                            <option>{{$option}}</option>--}}
                                                            {{--                                                        @endif--}}
                                                            @if($control['value'] == null)
                                                                @if (old($control['name']) == $option)
                                                                    <option value="{{$option}}" selected="selected">{{ $option }}</option>
                                                                @else
                                                                    <option value="{{$option}}">{{ $option }}</option>
                                                                @endif
                                                            @else
                                                                @if (old($control['name']) == $option)
                                                                    <option value="{{$option}}" selected="selected">{{ $option }}</option>
                                                                @elseif ($control['value'] == $option)
                                                                    <option value="{{$option}}" selected="selected">{{ $option }}</option>
                                                                @else
                                                                    <option value="{{$option}}">{{ $option }}</option>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-close font-16"></i> Close</button>
{{--                        <button type="button" class="btn btn-primary">Save changes</button>--}}
                        <button type="button" id="btn_add_staff" name="btn_add_staff" class="btn btn-primary"><i class="far fa-save font-16"></i> Save</button>
                    </div>
                </div>
            </div>
        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>

@endsection

@section('scripts-middle')
    <!-- Datatable js -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/custom/custom-table-datatable.js')}}"></script>

    <script type="text/javascript">

        $(function () {
            let table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('staff.staff.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    // {data: 'staff_photo', name: 'staff_photo'},
                    {data: 'thumbnail', name: 'thumbnail', orderable: false, searchable: false},
                    // {data: 'staff_number', name: 'staff_number'},
                    {data: 'staff_name', name: 'staff_name'},
                    {data: 'rank', name: 'rank'},
                    {data: 'phone_number', name: 'phone_number'},
                    {data: 'email', name: 'email'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],

                columnDefs: [ {
                    targets: "_all",
                    createdCell: function (td, cellData, rowData, row, col) {
                        // if ( rowData[5] === 'Inactive' ) {
                            $(td).css('color', 'black');
                        // }
                    }
                } ],

                // "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                "lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "All"]],
            });
        // });
        $('#btn_add_staff').click(function () {
            let select = document.getElementById("title");
            let title = select.options[select.selectedIndex].value;
            select = document.getElementById("rank");
            let rank = select.options[select.selectedIndex].value;
            select = document.getElementById("status");
            let status = select.options[select.selectedIndex].value;
            // let logo = $('#new-logo')[0].files[0];
            let formData = new FormData();
            formData.append('_token', $('input[name=_token]').val());
            formData.append('staff_number', $('#staff_number').val());
            formData.append('name', $('#name').val());
            formData.append('title', title);
            formData.append('rank', rank);
            formData.append('status', status);
            formData.append('phone_number', $('#phone_number').val());
            formData.append('email', $('#email').val());
            formData.append('qualifications', $('#qualifications').val());
            formData.append('specialisation', $('#specialisation').val());
            $.ajax({
                type: 'post',
                url: '{{URL::signedRoute('staff.staff.store')}}',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    ajaxMessage(data);
                    if (data.success) {
                        $('#modals-slide-in').modal('hide');
                        table.ajax.reload();
                        ajaxMessage(data, 'ajax_messages_table');
                    }
                }
            });
        });

            function ajaxMessage(data, div='ajax_messages') {
                if (data.error) {
                    let err = "<ol>";
                    $.each(data.error, function (item, index) {
                        err = err + "<li>" + index + "</li>";
                        $('#' + item).addClass('is-invalid').removeClass('is-valid');
                    });
                    err = err + "</ul>";
                    $('#'+div).html("<div class='alert fade show alert-dismissible   alert-danger d-flex align-items-center justify-content-between' role='alert'><div class='flex-00-auto'> <i class='fa fa-fw fa-exclamation-triangle'></i></div> <div class='flex-fill mr-3'> <p class='mb-0'>&nbsp;" +
                        err +
                        "</p></div>" +
                        "<button type='button' class='btn btn-outline-success' data-dismiss='alert' aria-label='Close'><i class='fa fa-times'></i> " +
                        // "    <span aria-hidden='true'><i class='fa fa-fw fa-times-circle'></i></span>\n" +
                        "  </button> </div>");
                } else if (data.success) {
                    $('#'+div).html("<div class='alert fade show alert-dismissible   alert-success d-flex align-items-center justify-content-between' role='alert'><div class='flex-00-auto'> <i class='fa fa-fw fa-check'></i></div> <div class='flex-fill mr-3'> <p class='mb-0'>&nbsp;" +
                        data.success +
                        "</p></div>" +
                        "<button type='button' class='btn btn-outline-success' data-dismiss='alert' aria-label='Close'><i class='fa fa-times'></i> " +
                        // "    <span aria-hidden='true'><i class='fa fa-fw fa-times-circle'></i></span>\n" +
                        "  </button> </div>");
                } else if (data.info) {
                    $('#'+div).html("<div class='alert fade show alert-dismissible   alert-info d-flex align-items-center justify-content-between' role='alert'><div class='flex-00-auto'> <i class='fa fa-fw fa-check'></i></div> <div class='flex-fill mr-3'> <p class='mb-0'>&nbsp;" +
                        data.info +
                        "</p></div>" +
                        "<button type='button' class='btn btn-outline-success' data-dismiss='alert' aria-label='Close'><i class='fa fa-times'></i> " +
                        // "    <span aria-hidden='true'><i class='fa fa-fw fa-times-circle'></i></span>\n" +
                        "  </button> </div>");
                }
            }
        });
    </script>
@endsection
