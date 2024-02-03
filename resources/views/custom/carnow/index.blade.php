@extends('template.index')

@section('content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Custom</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Carrent Now</a></li>
        <li class="breadcrumb-item active">index</li>
    </ol>

    <h1 class="page-header">Daftar Barang Carrent Now  <small>Import/Export </small></h1>
    <ul class="nav nav-tabs " id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">EXPORT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false">IMPORT</a>
        </li>
    </ul>
    <div class="tab-content bg-white p-3 rounded-bottom" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <x-form-search action="#" method="#"/>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <x-form-search action="#" method="GET" />
        </div>
    </div>
    <div class="panel panel-inverse p-2">
        <div class="panel-heading panel-heading bg-cyan-700 text-white">
            <h4 class="panel-title">Data Inventory</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"
                    data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                        class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
                        class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                        class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="panel-body">
            <div class="modal-content">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped table-bordered align-middle display nowrap"
                        style="width: 100%">
                    </table>
                </div>
            </div>
        </div>
    </div>
    
      @endsection

@push('js')
    <script src="{{ asset('/assets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/assets/plugins/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>
    <script>

        $(document).ready(function() {
           

            // $('.submit-tegah').click(function(){
            //     let idTegah = $('#hawb').val()
            //     console.log($('#'+idTegah))
            //     $('#'+idTegah).parent().html(`<h5 class='text-danger'>Status Tegah</h5>`);
            //     $('#'+idTegah).remove();
            // })

            $('#myTab a').on('click', function(e) {
                e.preventDefault()
                $(this).tab('show')
            })
            let dInOut = {{ Js::from($dataTables) }};
            let tbl = $('#myTable').DataTable({
                            responsive: false,
                            serverSide: true,
                            processing: true,
                            scrollX: true,
                            ajax: dInOut,
                            columns: custom.fieldTable.concat([{
                                    "data":"status_tegah",
                                    "title": "Fitur Penegahaan",
                                    "orderable": false,
                                    "searchable": false,
                                }])
                        });

            $('#bc11').keyup( function() {
                tbl.search( this.value ).draw();
            });

            $("#gate-in-date").datepicker({
                todayHighlight: true,
                autoclose: true
            });

            // $("#default-daterange").daterangepicker({
            //     opens: "right",
            //     format: "MM/DD/YYYY",
            //     separator: " to ",
            //     startDate: moment().subtract("days", 0),
            //     endDate: moment(),
            //     minDate: moment().subtract("month", 3),
            //     maxDate: "+3M",
            // }, function(start, end) {
            //     $("#default-daterange input").val(start.format("DD/MM/yyyy") + "-" + end.format(
            //         "DD/MM/yyyy"));
            // });
            
            // $(".default-select2").select2();
        });
    </script>
@endpush

@push('css')
    <link href="{{ asset('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <style type="text/css">
        .modal-loader {
            background: rgba(255, 255, 255, 0.85);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 10;
        }
    </style>
@endpush
