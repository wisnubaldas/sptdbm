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
            <x-form-search action="{{ route('custom.inventory.find-data') }}" />
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <x-form-search action="#" />
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
              <button class="btn btn-success submit-tegah" type="button" >Submit</button>
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
            $('.submit-tegah').click(function(){
                let idTegah = $('#hawb').val()
                console.log($('#'+idTegah))
                $('#'+idTegah).parent().html(`<h5 class='text-danger'>Status Tegah</h5>`);
                $('#'+idTegah).remove();
            })

            $('#myTab a').on('click', function(e) {
                e.preventDefault()
                $(this).tab('show')
            })
            let dInOut = {{ Js::from(route('custom.carnow.get-data')) }};
            $('#myTable').DataTable({
                responsive: false,
                serverSide: true,
                processing: true,
                scrollX: true,
                ajax: dInOut,
                columns: custom.fieldTable.concat([{
                        "data": "no_bl_awb",
                        "title": "Fitur Penegahaan",
                        "orderable": false,
                        "searchable": false,
                        "render": function ( data, type, row ) {
                            // console.log(row);
                            $('#consignee').val(row.consignee)
                            $('#hawb').val(row.no_bl_awb)
                            $('#mawb').val(row.no_master_bl_awb)
                            let x = `<a href="#modal-dialog" data-bs-toggle="modal" class="btn btn-purple btn-sm " id="${row.no_bl_awb}">
                                            <i class="fas fa-lg fa-fw fa-hand-paper"></i> Tegah
                                    </a>`
                            return x;
                        }
                    }])
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
