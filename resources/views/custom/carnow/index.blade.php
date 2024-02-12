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
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#import" role="tab" aria-controls="home"
                aria-selected="true">IMPORT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#export" role="tab" aria-controls="profile"
                aria-selected="false">EXPORT</a>
        </li>
    </ul>
    <div class="tab-content bg-white p-3 rounded-bottom" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <x-form-search action="#" method="#" excel="{{route('currentnow.download-excel')}}" pdf="{{route('download-pdf')}}"/>
            <div class="panel panel-inverse">
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
        </div>
    </div>
  
      @endsection

@push('js')
    <script src="{{ asset('/assets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/moment/min/moment.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            let dInOut = {{ Js::from(route('carrent-now')) }};
            let tbl = $('#myTable').DataTable({
                            responsive: false,
                            serverSide: true,
                            processing: true,
                            scrollX: true,
                            ajax: dInOut,
                            order: [ [17, 'desc'] ],
                            columns: custom.fieldTable.concat([{
                                    "data":"status_tegah",
                                    "title": "Fitur Penegahaan",
                                    "orderable": false,
                                    "searchable": false,
                                }])
                        });

            

            $('#search-data').on('click',function(a){
                a.preventDefault()
                // console.log(propData.tab)
                let dataForm = $('#frm-serch').serialize()
                tbl.ajax.url('?target='+propData.tab+'&'+dataForm).load()
                $('#frm-serch')[0].reset();
            })

            // tab show
            $('#myTab a').on('click', function(e) {
                // e.preventDefault()
                $(this).tab('show')
            })
            $('#myTab a').on('shown.bs.tab', function(e) {
                // console.log(e.target.innerText)
                // console.log(e.relatedTarget);
                switch (e.target.innerText) {
                    case 'IMPORT':
                        propData.tab = 'IMPORT'
                        tbl.ajax.url(dInOut+'?target=IMPORT').load()
                        break;
                    case 'EXPORT':
                        propData.tab = 'EXPORT'
                        tbl.ajax.url(dInOut+'?target=EXPORT').load()
                        break;
                }
            })
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
