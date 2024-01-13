<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UseCase\GateInOutDatatablesUseCase;

class AbandonController extends Controller
{
    protected $InOutData;
    public function __construct(GateInOutDatatablesUseCase $InOutData){
        $this->middleware('auth');
        $this->InOutData = $InOutData;
    }
    public function index() {
        return view('custom.abandon.index');
    }
}
