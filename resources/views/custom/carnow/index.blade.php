@extends('template.index')

@section('content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Custom</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Carrent Now</a></li>
        <li class="breadcrumb-item active">index</li>
    </ol>

    <h1 class="page-header">Daftar Barang Carrent Now  <small>Import/Export </small></h1>
    <div class="panel">
        <div class="panel-body">
            <div class="panel-loader"></div>
            <form action="{{ route('custom.carnow.get-data') }}" method="post">
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
                                        <option selected>Select Type</option>
                                        @foreach ($master->select_search() as $item)
                                            <option value="{{$item->id}}">{{$item->text}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row pt-4">
                                <label class="form-label col-form-label col-lg-4">Change Type</label>
                                <div class="col-lg-8">
                                    <div class="form-check mb-2 form-check-inline">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1" value="export" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Export
                                        </label>
                                    </div>
                                    <div class="form-check mb-2 form-check-inline">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1" value="import">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Import
                                        </label>
                                    </div>
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
                </table>
            </div>

        </div>
    </div>
    
    {{-- form modal --}}
    <div class="modal fade" id="modal-dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Form Penegahan</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="row">
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control fs-15px" id="mawb" readonly/>
                            <label for="floatingInput" class="d-flex align-items-center fs-13px">
                              Master Airway Bill
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control fs-15px" id="consignee" readonly/>
                            <label for="floatingInput" class="d-flex align-items-center fs-13px">
                              Consignee
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control fs-15px" id="hawb" readonly/>
                            <label for="floatingInput" class="d-flex align-items-center fs-13px">
                              Host Airway Bill
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control fs-15px" id="petugas" required/>
                            <label for="floatingInput" class="d-flex align-items-center fs-13px">
                              Nama Petugas Penegahaan
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="">Alasan Penegahan</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
                
              
            </div>
            <div class="modal-footer">
              <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
              <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
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
            let dInOut = {{ Js::from(route('custom.carnow.get-data')) }};
            $('#myTable').DataTable({
                responsive: true,
                serverSide: true,
                processing: true,
                deferRender: true,
                ajax: dInOut,
                columns: [{
                        "data": "kd_tps",
                        "title": "Kode TPS",
                        "orderable": true,
                        "searchable": true
                    },
                    {
                        "data": "nm_angkut",
                        "title": "Nama Angkut",
                        "orderable": true,
                        "searchable": true
                    },
                    {
                        "data": "no_voy_flight",
                        "title": "Flight No",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "tg_tiba",
                        "title": "Tgl Tiba",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "kd_gudang",
                        "title": "Kd Gudang",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "ref_num",
                        "title": "Refnumber",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "no_bl_awb",
                        "title": "AWB",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "tgl_bl_awb",
                        "title": "TGL AWB",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "no_master_bl_awb",
                        "title": "MAWB",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "tgl_master_bl_awb",
                        "title": "Tgl MAWB",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "id_consignee",
                        "title": "Id Consignee",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "consignee",
                        "title": "Consignee",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "bruto",
                        "title": "Bruto",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "kd_kem",
                        "title": "Kd Kemasan",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "jml_kem",
                        "title": "Jml Kemasan",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "kd_dok_inout",
                        "title": "Kd Dok Inout",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "no_dok_inout",
                        "title": "Dok Inout",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "tgl_dok_inout",
                        "title": "Tgl Inout",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "wk_inout",
                        "title": "Waktu Inout",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "no_pol",
                        "title": "No Pol",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "no_bc11",
                        "title": "No BC11",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "tgl_bc11",
                        "title": "Tgl BC11",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "no_pos_bc11",
                        "title": "No Pos BC11",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "pel_muat",
                        "title": "Pelabuhan Muat",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "pel_transit",
                        "title": "Pelabuhan Transit",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "pel_bongkar",
                        "title": "Pelabuhan Bongkar",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "no_daftar_pabean",
                        "title": "No Daftar Pabean",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "tgl_daftar_pabean",
                        "title": "Tgl Daftar Pabean",
                        "orderable": true,
                        "searchable": true
                    }, {
                        "data": "no_segel_bc",
                        "title": "No Segel",
                        "orderable": true,
                        "searchable": true
                    },
                    {
                        "data": "no_bl_awb",
                        "title": "Fitur Penegahaan",
                        "orderable": false,
                        "searchable": false,
                        "render": function ( data, type, row ) {
                            // console.log(row);
                            $('#consignee').val(row.consignee)
                            $('#hawb').val(row.no_bl_awb)
                            $('#mawb').val(row.no_master_bl_awb)
                            let x = `<a href="#modal-dialog" data-bs-toggle="modal" class="btn btn-purple ">
                                            <i class="fas fa-lg fa-fw fa-hand-paper"></i> Tegah
                                    </a>`
                            return x;
                        }
                    },


                ]
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
            
            $(".default-select2").select2();
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
