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
        <!-- Start col -->
        <div class="col-md-12 col-lg-12 col-xl-12">
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
            var table = $('.data-table').DataTable({
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
                "lengthMenu": [[25, 50, 75, 100, -1], [25, 50, 75, 100, "All"]],
            });
        });
    </script>
@endsection
