@extends('template.index')

@section('content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Custom</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Custom Module</a></li>
        <li class="breadcrumb-item active">index</li>
    </ol>

    <h1 class="page-header">Custom Module  <small>Import/Export </small></h1>
    <div class="panel">
        <div class="panel-body">
            <div class="panel-loader"></div>
            <form action="{{ route('custom.inventory.find-data') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-6 p-4">
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <textarea name="search_by_val" id="search_by_val" cols="20" rows="10" style="width: 100%"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <select class="default-select2 form-control" name="search_by" style="width: 100%">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row pt-4">
                            <div class="btn btn-group">
                                <button class="btn btn-success" type="submit">Submit</button>
                                <button class="btn btn-warning" type="button">Export Excel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div class="panel panel-inverse">
        <div class="panel-body">
            <div class="modal-content">
                <table id="myTable" class="table table-striped table-bordered align-middle" style="width: 100%">
                    <thead>
                        <tr>
                            <th  align="center">No</th>
                            <th  align="center">Kode Tps</th>
                            <th  align="center">Nama Angkut</th>
                            <th  align="center">No. Voy/Flight</th>
                            <th  align="center">Tgl. Tiba</th>
                            <th  align="center">Kode Gudang</th>
                            <th  align="center">Reff Number</th>
                            <th  align="center">No. BL/Awb</th>
                            <th  align="center">Tgl. BL/Awb</th>
                            <th  align="center">No. Master BL/Awb</th>
                            <th  align="center">Tgl. Master BL/Awb</th>
                            <th  align="center">Id Consignee</th>
                            <th  align="center">Consignee</th>
                            <th  align="center">Bruto (Kg)</th>
                            <th  align="center">Kode Kemasan</th>
                            <th  align="center">Jumlah Kemasan</th>
                            <th  align="center">Kd. Dok Inout</th>
                            <th  align="center">No. Dok Inout</th>
                            <th  align="center">Tgl. Dok Inout</th>
                            <th  align="center">Wk Inout</th>
                            <th  align="center">No. Pol.</th>
                            <th  align="center">No. Bc11</th>
                            <th  align="center">Tgl. Bc11</th>
                            <th  align="center">No. Pos Bc11</th>
                            <th  align="center">Pel. Muat</th>
                            <th  align="center">Pel. Transit</th>
                            <th  align="center">Pel. Bongkar</th>
                            <th  align="center">Nomor Daftar Pabean</th>
                            <th  align="center">Tgl. Daftar Pabean</th>
                            <th  align="center">No. Segel Bc</th>
                            <th  align="center">Tgl. Segel Bc</th>
                            <th  align="center">Status</th>
                            <th  align="center">Fitur Penegahan</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
    <script>
        $(document).ready(function() {
            let dInOut = {{ Js::from(route('custom.inventory.get-data')) }};
            $('#myTable').DataTable({
                responsive: true,
                serverSide: true,
                processing: true,
                deferRender: true,
                ajax: dInOut,
            });

            $("#default-daterange").daterangepicker({
                opens: "right",
                format: "MM/DD/YYYY",
                separator: " to ",
                startDate: moment().subtract("days", 0),
                endDate: moment(),
                minDate: moment().subtract("month", 3),
                maxDate: "+3M",
            }, function(start, end) {
                $("#default-daterange input").val(start.format("DD/MM/yyyy") + "-" + end.format(
                    "DD/MM/yyyy"));
            });
            let dataSelect = [{
                    id: 'ref_num',
                    text: 'Refrensi Number'
                },
                {
                    id: 'wk_inout',
                    text: 'Waktu Gate In Out'
                },
                {
                    id: 'no_daftar_pabean',
                    text: 'No Pendaftaran'
                },
                {
                    id: 'no_bc11',
                    text: 'BC 11'
                },
                {
                    id: 'tgl_bc11',
                    text: 'Tanggal BC 11'
                },
                {
                    id: 'no_master_bl_awb',
                    text: 'MAWB'
                },
                {
                    id: 'no_bl_awb',
                    text: 'HAWB'
                },
                {
                    id: 'consignee',
                    text: 'Consignee'
                },
                {
                    id: 'nm_angkut',
                    text: 'Sarana Angkut'
                },
            ]
            $(".default-select2").select2({
                data: dataSelect
            });
        });
    </script>
@endpush

@push('css')
    <link href="{{ asset('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
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
