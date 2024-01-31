<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UseCase\GateInOutDatatablesUseCase;
use App\UseCase\MasterDataUseCase;

class CarrentNowController extends Controller
{
    protected $InOutData;
    protected $masterData;
    public function __construct(GateInOutDatatablesUseCase $InOutData,MasterDataUseCase $master){
        $this->middleware('auth');
        $this->InOutData = $InOutData;
        $this->masterData = $master;
    }
    public function index() {
        return view('custom.carnow.index',['master'=>$this->masterData]);
    }
    public function get_data_carrent_now(){
         return $this->InOutData->carnow_tables();
    }

}
