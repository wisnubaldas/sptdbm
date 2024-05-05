<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataScanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index() {
        return view('report.data-scan');
    }
}
