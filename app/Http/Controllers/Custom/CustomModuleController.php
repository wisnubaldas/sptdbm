<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UseCase\GateInOutDatatablesUseCase;
use App\UseCase\MasterDataUseCase;
class CustomModuleController extends Controller
{
    protected $InOutData;
    public function __construct(GateInOutDatatablesUseCase $InOutData,MasterDataUseCase $master){
        $this->middleware('auth');
        $this->InOutData = $InOutData;
        $this->masterData = $master;
    }
    public function index() {
        return view('custom.module.index',['master'=>$this->masterData]);
    }
}
