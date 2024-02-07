<?php

namespace App\UseCase;
use App\Models\TpsOnline\GateExpIn;
use App\Models\TpsOnline\GateExpOut;
use Yajra\DataTables\DataTables;
/**
 * Class UseCase.
 *
 * @package namespace App\UseCase;
 */
class ExportGateInOutUseCase implements ExportGateInOutUseCaseInterface
{

    public function getExportIn($request){
        $query = GateExpIn::query();
        return DataTables::of($query)
            ->filter(function ($query){
                if (request()->has('no_bl_awb') && request()->filled('no_bl_awb')) {
                    $query->where('no_bl_awb', request('no_bl_awb'));
                }
                if (request()->has('no_bc11') && request()->filled('no_bc11')) {
                    $query->where('no_bc11', request('no_bc11'));
                }
                if (request()->has('no_daftar_pabean') && request()->filled('no_daftar_pabean')) {
                    $query->where('no_daftar_pabean', request('no_daftar_pabean'));
                }
                if (request()->has('no_master_bl_awb') && request()->filled('no_master_bl_awb')) {
                    $query->where('no_master_bl_awb', request('no_master_bl_awb'));
                }
                if (request()->has('wk_inout') && request()->filled('wk_inout')) {
                    $query->where('wk_inout', 'like', request('wk_inout') . "%");
                }
            })
            ->orderColumns(['no_bl_awb', 'wk_inout'], '-:column $1')
            ->make(true);
    }
    public function getExportOut($request){
        $query = GateExpOut::query();
        return DataTables::of($query)
            ->filter(function ($query){
                if (request()->has('no_bl_awb') && request()->filled('no_bl_awb')) {
                    $query->where('no_bl_awb', request('no_bl_awb'));
                }
                if (request()->has('no_bc11') && request()->filled('no_bc11')) {
                    $query->where('no_bc11', request('no_bc11'));
                }
                if (request()->has('no_daftar_pabean') && request()->filled('no_daftar_pabean')) {
                    $query->where('no_daftar_pabean', request('no_daftar_pabean'));
                }
                if (request()->has('no_master_bl_awb') && request()->filled('no_master_bl_awb')) {
                    $query->where('no_master_bl_awb', request('no_master_bl_awb'));
                }
                if (request()->has('wk_inout') && request()->filled('wk_inout')) {
                    $query->where('wk_inout', 'like', request('wk_inout') . "%");
                }
            })
            ->orderColumns(['no_bl_awb', 'wk_inout'], '-:column $1')
            ->make(true);
    }
    
}
