<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataCurrentNowController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index() {
        return view('report.data-current-now');
    }
    public function tbl_current_now(\App\UseCase\ReportCurrentNowUseCase $data){
        return $data->tbl_use_case();
    }
    public function detail_current_now(Request $request,\App\UseCase\ReportCurrentNowUseCase $data){
        return $data->awb($request->awb);
    }
}
