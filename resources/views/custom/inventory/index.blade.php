@extends('template.index')

@section('content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Custom</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Inventory</a></li>
        <li class="breadcrumb-item active">index</li>
    </ol>

    <h1 class="page-header">Inventory <small>data Timbun TPS</small></h1>
    <ul class="nav nav-tabs " id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">IMPORT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false">EXPORT</a>
        </li>
    </ul>
    <div class="tab-content bg-white p-3 rounded-bottom" id="myTabContent">
        <x-form-search action="#" method="" />
        {{-- panel table IN --}}
        <div class="panel panel-inverse">
            <div class="panel-heading panel-heading bg-lime-600 text-white">
                <h4 class="panel-title fw-bold">Data Inventory GateIn</h4>
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
                        <table id="tbl-gatein" class="table table-striped table-bordered align-middle display nowrap"
                            style="width: 100%">
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- panel table out --}}
        <div class="panel panel-inverse">
            <div class="panel-heading panel-heading bg-pink-400 text-white">
                <h4 class="panel-title">Data Inventory GateOut</h4>
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
                        <table id="tbl-gateout" class="table table-striped table-bordered align-middle display nowrap"
                            style="width: 100%">
                        </table>
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
    <script src="{{ asset('/assets/plugins/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-fixedcolumns-bs4/js/fixedColumns.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/moment/min/moment.min.js') }}"></script>
    <script>
        
        $(document).ready(function() {
            let importIn = {{ Js::from(route('inventory.get_data_in')) }};
            let importOut = {{ Js::from(route('inventory.get_data_out')) }};
            let exportIn = {{ Js::from(route('inventory.export_in')) }};
            let exportOut = {{ Js::from(route('inventory.export_out')) }};

            let tblGateIn = $('#tbl-gatein').DataTable({
                // deferLoading: 57,
                lengthChange: false,
                searching: false,
                responsive: false,
                serverSide: true,
                processing: true,
                scrollX: true,
                ajax: importIn,
                columns: custom.fieldTable
            });

            let tblGateOut = $('#tbl-gateout').DataTable({
                // deferLoading: 57,
                lengthChange: false,
                searching: false,
                responsive: false,
                serverSide: true,
                processing: true,
                scrollX: true,
                ajax: importOut,
                columns: custom.fieldTable
            });

            // table.on('mouseenter', 'td', function () {

            //         let colIdx = table.cell(this).index().column;
            //         table
            //             .cells()
            //             .nodes()
            //             .each((el) => el.classList.remove('highlight'));
            //         table
            //             .column(colIdx)
            //             .nodes()
            //             .each((el) => el.classList.add('highlight'));
            //     });

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
                        tblGateIn.ajax.url(importIn).load()
                        tblGateOut.ajax.url(importOut).load()
                        break;
                    case 'EXPORT':
                        propData.tab = 'EXPORT'
                        tblGateIn.ajax.url(exportIn).load()
                        tblGateOut.ajax.url(exportOut).load()
                        break;
                }
            })

            propData.searchable(tblGateIn, tblGateOut, importIn, importOut, exportIn, exportOut)

        });
    </script>
@endpush

@push('css')
    <link href="{{ asset('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <style type="text/css">
        td.highlight {
            background-color: #e9ecef !important;
        }

        html.dark td.highlight {
            background-color: rgba(var(--dt-row-hover), 0.082) !important;
        }

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
