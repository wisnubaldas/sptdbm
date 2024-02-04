@extends('template.index')

@section('content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Custom</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Carrent Now</a></li>
        <li class="breadcrumb-item active">index</li>
    </ol>
    <h1 class="page-header">Form Release Barang <small>Import/Export </small></h1>
    <div class="panel">
        <div class="panel-body">
            <form action="{{route('custom-module.post-release')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input name="mawb" type="text" class="form-control fs-15px" id="mawb" readonly placeholder="" value="{{$data->no_master_bl_awb}}"/>
                            <label for="floatingInput" class="d-flex align-items-center fs-13px">
                              Master Airway Bill
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="consignee" type="text" class="form-control fs-15px" id="consignee" readonly placeholder="" value="{{$data->consignee}}"/>
                            <label for="floatingInput" class="d-flex align-items-center fs-13px">
                              Consignee
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="no_lepas_segel" type="text" class="form-control fs-15px" id="no_lepas_segel" required placeholder=""/>
                            <label for="floatingInput" class="d-flex align-items-center fs-13px">
                              Nomor Lepas Segel
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input name="hawb" type="text" class="form-control fs-15px" id="hawb" readonly placeholder="" value="{{$data->no_bl_awb}}"/>
                            <label for="floatingInput" class="d-flex align-items-center fs-13px">
                              Host Airway Bill
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="petugas_lepas_segel" type="text" class="form-control fs-15px" id="petugas_lepas_segel" required placeholder=""/>
                            <label for="floatingInput" class="d-flex align-items-center fs-13px">
                              Nama Petugas
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="tgl_lepas_segel" type="text" class="form-control fs-15px" id="tgl_lepas_segel" required placeholder=""/>
                            <label for="floatingInput" class="d-flex align-items-center fs-13px">
                              Tanggal Lepas Segel
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="">Alasan Lepas Segel</label>
                        <textarea name="alasan_lepas_segel" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                
              
            </div>
            <div class="modal-footer">
              <a href="{{route('custom-module')}}" class="btn btn-white" data-bs-dismiss="modal">Close</a>
              <button class="btn btn-success submit-tegah" type="submit" >Submit</button>
            </div>
        </form>
        </div>
      </div>
@endsection

@push('js')
    <script src="{{ asset('/assets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#tgl_lepas_segel").datepicker({
                todayHighlight: true,
                autoclose: true,
                format:'yyyymmdd',
                orientation: "bottom left"
            });
        })
    </script>
@endpush

@push('css')
<link href="{{ asset('/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
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
