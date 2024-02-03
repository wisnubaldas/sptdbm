<div>
    <form action="{{ $action }}" method="{{$method}}" id="frm-serch">
        @csrf
        <div class="row m-3">
            <div class="col-3">
                <div class="form-floating mb-3 mb-md-0 pb-1">
                    <input name="bc11" type="text" class="form-control fs-15px" id="bc11" placeholder="">
                    <label for="floatingInput" class="d-flex align-items-center fs-13px">No BC 1.1</label>
                </div>
                <div class="btn btn-group">
                    <button class="btn btn-primary" type="button">Export PDF</button>
                    <button class="btn btn-warning" type="button">Export Excel</button>
                </div>
            </div>
            <div class="col-3">
                <div class="form-floating mb-3 mb-md-0 pb-1">
                    <input type="text" class="form-control fs-15px" id="gate-in-date" placeholder="">
                    <label for="floatingInput" class="d-flex align-items-center fs-13px">Waktu Gate In/Out</label>
                </div>
            </div>
            <div class="col-3">
                <div class="form-floating mb-3 mb-md-0 pb-1">
                    <input type="text" class="form-control fs-15px" id="no-pabean" placeholder="">
                    <label for="floatingInput" class="d-flex align-items-center fs-13px">Nomor Pendaftaran Pabean</label>
                </div>
                <div class="form-floating mb-3 mb-md-0 pb-1">
                    <input type="text" class="form-control fs-15px" id="floatingInput" placeholder="">
                    <label for="floatingInput" class="d-flex align-items-center fs-13px">Ref Number</label>
                </div>
                {{-- <div class="form-group row">
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
                    
                </div> --}}
            </div>
            <div class="col-3">
                <div class="form-floating mb-3 mb-md-0 pb-1">
                    <input type="text" class="form-control fs-15px" id="floatingInput" placeholder="">
                    <label for="floatingInput" class="d-flex align-items-center fs-13px">Host AWB</label>
                </div>
                <div class="form-floating mb-3 mb-md-0 pb-1">
                    <input type="text" class="form-control fs-15px" id="floatingInput" placeholder="">
                    <label for="floatingInput" class="d-flex align-items-center fs-13px">Master AWB</label>
                </div>
            </div>
        </div>
    </form>
</div>