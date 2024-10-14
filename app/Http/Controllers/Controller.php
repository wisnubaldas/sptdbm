<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected function cekRequestDownload($r){
        $validate = $r->all();
        unset($validate[0]);
        if(empty($validate) == false){
            return \Response::json(['message'=>'Harus ada parameter untuk membuat Excel, PDF'],500);
        }
    }
    
}
