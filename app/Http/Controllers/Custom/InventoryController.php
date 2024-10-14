<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UseCase\ImportGateInOutUseCase;
use App\UseCase\ExportGateInOutUseCase;
use \App\UseCase\TpsPdfUseCase;
use \App\Exports\TpsImport;
use \Carbon\Carbon;
class InventoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        // return $table->render('custom.inventory.index');
        return view('custom.inventory.index');
    }
    public function get_data_in(Request $request,ImportGateInOutUseCase $importData){
        return $importData->getDataInInventory($request);
        
    }
    public function get_data_out(Request $request,ImportGateInOutUseCase $importData){
        return $importData->getDataOutInventory($request);
        
    }
    public function export_in(Request $request,ExportGateInOutUseCase $exportData) {
        return $exportData->getExportIn($request);
    }
    public function export_out(Request $request,ExportGateInOutUseCase $exportData) {
        return $exportData->getExportOut($request);
    }
    public function inventory_excel(Request $r,TpsImport $excel){
        $this->cekRequestDownload($r);
        return (new TpsImport($r))->download('TPS-'.Carbon::now()->format('YmdHis').'.xlsx');
    }
    public function inventory_pdf(Request $r, TpsPdfUseCase $pdf){
        $this->cekRequestDownload($r);
        return $pdf->inventory($r,'Inventory Data '.$r->type);
    }
}
