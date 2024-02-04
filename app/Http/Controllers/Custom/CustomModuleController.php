<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\UseCase\ImportGateInOutUseCase;
use Illuminate\Http\Request;
class CustomModuleController extends Controller
{
    protected $InOutData;
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request, ImportGateInOutUseCase $importGateInOut) {
        if($request->ajax()){
            return $importGateInOut->getCustomModule();
        }
        return view('custom.module.index');
    }
    public function get_data_release($awb,ImportGateInOutUseCase $importGateInOut){
        $data = $importGateInOut->getDataRelease($awb);
        return view('custom.module.form-data-release',compact('data'));
    }
    public function post_data_release(Request $request,ImportGateInOutUseCase $ImportGateInOut){
        $ImportGateInOut->setDataRelease($request);
        return \redirect()->route('custom-module');
    }
}
