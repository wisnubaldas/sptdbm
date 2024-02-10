<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\UseCase\ImportGateInOutUseCase;
use App\UseCase\ExportGateInOutUseCase;
use Illuminate\Http\Request;
use \App\Exports\TpsImport;
use \Carbon\Carbon;
class CustomModuleController extends Controller
{
    protected $InOutData;
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request, ImportGateInOutUseCase $importGateInOut,ExportGateInOutUseCase $export) {
        if($request->ajax()){
            switch ($request->target) {
                case 'IMPORT':
                    return $importGateInOut->getCustomModule();
                    break;
                case 'EXPORT':
                    return $export->getExportCustomModule();
                    break;
                default:
                    return $importGateInOut->getCustomModule();
                    break;
            }
            
        }
        return view('custom.module.index');
    }
    public function get_data_release($awb,ImportGateInOutUseCase $importGateInOut,ExportGateInOutUseCase $export){
        $data = $importGateInOut->getDataRelease($awb);
        if(!$data){
            $data = $export->getExportRealeaseDataForm($awb);
        }
        return view('custom.module.form-data-release',compact('data'));
    }
    public function post_data_release(Request $request,ImportGateInOutUseCase $ImportGateInOut){
        $ImportGateInOut->setDataRelease($request);
        return \redirect()->route('custom-module');
    }
    public function detail_release($awb){
        return \App\Models\TpsOnline\AutoPenegahan::where('no_bl_awb',$awb)->first();
    }
    public function custom_excel(Request $r,TpsImport $excel){
        return (new TpsImport($r))->download('modul-'.Carbon::now()->format('YmdHis').'.xlsx');
    }
}
