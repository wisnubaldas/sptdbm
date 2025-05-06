<div>
    <form action="{{ $action }}" method="{{$method}}" id="frm-serch">
        <div class="row m-3">
            <div class="col-md-3 col-sm-12">
                <div class="form-floating mb-3 mb-md-0 pb-1">
                    <input name="no_bc11" type="text" class="form-control fs-15px" id="bc11" placeholder="">
                    <label for="floatingInput" class="d-flex align-items-center fs-13px">No BC 1.1</label>
                </div>
                <div class="btn btn-group m-0 p-0">
                    <button class="btn btn-primary" type="button" id="export-pdf">Download PDF</button>
                    <button class="btn btn-warning" type="button" id="export-excel">Download Excel</button>
                    <button class="btn btn-info" type="button" id="search-data"><i class="fas fa-fw fa-search"></i> Search</button>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="form-floating mb-3 mb-md-0 pb-1">
                    <input name="wk_inout" type="text" class="form-control fs-15px" id="gate-in-date" placeholder="">
                    <label for="floatingInput" class="d-flex align-items-center fs-13px">Waktu Gate In/Out</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="form-floating mb-3 mb-md-0 pb-1">
                    <input name="no_daftar_pabean" type="text" class="form-control fs-15px" id="no-pabean" placeholder="">
                    <label for="floatingInput" class="d-flex align-items-center fs-13px">Nomor Pendaftaran Pabean</label>
                </div>
                <div class="form-floating mb-3 mb-md-0 pb-1">
                    <input name="ref_num" type="text" class="form-control fs-15px" id="floatingInput" placeholder="">
                    <label for="floatingInput" class="d-flex align-items-center fs-13px">Ref Number</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="form-floating mb-3 mb-md-0 pb-1">
                    <input name="no_bl_awb" type="text" class="form-control fs-15px" id="awb" placeholder="">
                    <label for="floatingInput" class="d-flex align-items-center fs-13px">Host AWB</label>
                </div>
                <div class="form-floating mb-3 mb-md-0 pb-1">
                    <input name="no_master_bl_awb" type="text" class="form-control fs-15px" id="floatingInput" placeholder="">
                    <label for="floatingInput" class="d-flex align-items-center fs-13px">Master AWB</label>
                </div>
            </div>
        </div>
    </form>
</div>
@push('js')
<script src="{{ asset('/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>
<script>
    let uri_excel = {{ Js::from($excel) }};
    let uri_pdf = {{ Js::from($pdf) }};
    
    $(document).ready(function(){
        $("#gate-in-date").datepicker({
                todayHighlight: true,
                autoclose: true,
                format:'yyyymmdd',
                orientation: "bottom left"
            });
        
        // kasih ajax disini
        // $('#export-excel').click(function(a){
        //     let dataForm = $('#frm-serch').serialize()
        //     let linkNya = uri_excel+'?type='+propData.tab+'&'+dataForm
        //     window.open(linkNya, "_blank");
        // })
        
        // $('#export-pdf').click(function(a){
        //     let dataForm = $('#frm-serch').serialize()
        //     let linkNya = uri_pdf+'?type='+propData.tab+'&'+dataForm
        //     console.log(linkNya);
        //     window.open(linkNya, "_blank");
        // })
    })
</script>
@endpush
@push('css')
<link href="{{ asset('/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
@endpush