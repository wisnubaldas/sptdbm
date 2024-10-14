<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UseCase\ImportGateInOutUseCase;
use App\UseCase\ExportGateInOutUseCase;
use \App\Exports\TpsImport;
use \Carbon\Carbon;
class AbandonController extends Controller
{
    protected $InOutData;
    public function __construct(){
        $this->middleware('auth');
    }
    public function index() {
        return view('custom.abandon.index');
    }
    public function import_in(Request $request,ImportGateInOutUseCase $importData){
        return $importData->abandonImportIn($request);
        
    }
    public function export_in(Request $request,ExportGateInOutUseCase $exportData) {
        return $exportData->abandonExportIn($request);
    }
    public function abandon_excel(Request $r,TpsImport $excel){
        $this->cekRequestDownload($r);

        return (new TpsImport($r))->download('abandon-'.Carbon::now()->format('YmdHis').'.xlsx');
    }
}
