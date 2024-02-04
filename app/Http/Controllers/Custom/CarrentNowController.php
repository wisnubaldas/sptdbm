<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UseCase\MasterDataUseCase;
use App\UseCase\ImportGateInOutUseCase;
class CarrentNowController extends Controller
{
    protected $InOutData;
    protected $masterData;
    protected $customRequest;
    public function __construct(MasterDataUseCase $master){
        $this->middleware('auth');
        $this->masterData = $master;
    }
    public function index(Request $request,ImportGateInOutUseCase $data) {
        if($request->ajax()){
            return $data->getCurrentNow($request);
        }     
        return view('custom.carnow.index',['master'=>$this->masterData]);
    }
    
    // public function get_data_carrent_now(ImportGateInOutUseCase $data){
    //      return $data->getCurrentNow($this->customRequest);
    // }
    public function get_data_tegah($awb,ImportGateInOutUseCase $ImportGateInOut){
        $dataTegah = $ImportGateInOut->getDataTegah($awb);
        return view('custom.carnow.form-tegah',compact('dataTegah'));
    }
    public function post_tegah(Request $request,ImportGateInOutUseCase $ImportGateInOut){
        $dataTegah = $ImportGateInOut->getDataTegah($request->hawb);
        $ImportGateInOut->setDataTegah($dataTegah,$request->all());
        return \redirect()->route('carrent-now');
    }

}
