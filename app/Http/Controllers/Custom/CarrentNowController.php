<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UseCase\MasterDataUseCase;
use App\UseCase\ImportGateInOutUseCase;
use App\UseCase\ExportGateInOutUseCase;
use \App\Exports\TpsImport;
use \Carbon\Carbon;
class CarrentNowController extends Controller
{
    protected $InOutData;
    protected $masterData;
    protected $customRequest;
    public function __construct(MasterDataUseCase $master){
        $this->middleware('auth');
        $this->masterData = $master;
    }
    public function index(Request $request,ImportGateInOutUseCase $data,ExportGateInOutUseCase $export) {
        if($request->ajax()){
            switch ($request->target) {
                case 'IMPORT':
                        return $data->getCurrentNow($request);
                    break;
                case 'EXPORT':
                        return $export->currentNowExportIn($request);
                    break;
                default:
                        return $data->getCurrentNow($request);
                    break;
            }
        }     
        return view('custom.carnow.index',['master'=>$this->masterData]);
    }
    public function get_data_tegah($awb,ImportGateInOutUseCase $ImportGateInOut){
        $dataTegah = $ImportGateInOut->getDataTegah($awb);
        return view('custom.carnow.form-tegah',compact('dataTegah'));
    }
    public function post_tegah(Request $request,ImportGateInOutUseCase $ImportGateInOut){
        $dataTegah = $ImportGateInOut->getDataTegah($request->hawb);
        $ImportGateInOut->setDataTegah($dataTegah,$request->all());
        return \redirect()->route('carrent-now');
    }
    public function currentnow_excel(Request $r,TpsImport $excel){
        return (new TpsImport($r))->download('carnow-'.Carbon::now()->format('YmdHis').'.xlsx');
    }

}
