<?php

namespace App\UseCase;

use App\Models\TpsOnline\GateExpIn;
use App\Models\TpsOnline\GateExpOut;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

/**
 * Class UseCase.
 *
 * @package namespace App\UseCase;
 */
class ExportGateInOutUseCase implements ExportGateInOutUseCaseInterface
{

    public function getExportIn($request)
    {
        $query = GateExpIn::query();
        return DataTables::of($query)
            ->filter(function ($query) {
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
    public function getExportOut($request)
    {
        $query = GateExpOut::query();
        return DataTables::of($query)
            ->filter(function ($query) {
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
    public function abandonExportIn($request)
    {
        $date = Carbon::now()->subDays(30);
        $query = GateExpIn::query()->where('tgl_bc11', '<', $date->format('Ymd'))->where('flag_gateout', 6);
        return DataTables::of($query)
            ->filter(function ($query) {
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
    public function currentNowExportIn($request)
    {
        $query = GateExpIn::doesntHave('tegah');
        return DataTables::of($query)
            ->filter(function ($query) {
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
            ->addColumn('status_tegah', function ($data) {
                $r = route('custom.carnow.get-data-tegah', $data->no_bl_awb);
                return '<a href="' . $r . '" class="btn btn-danger btn-xs ">
                                <i class="fas fa-lg fa-fw fa-hand-paper"></i> Tegah
                        </a>';
            })
            ->rawColumns(['status_tegah'])
            ->make(true);
    }
    public function getExportTegah($hawb)
    {
        return GateExpIn::where('no_bl_awb', $hawb)->first();
    }
    public function getExportCustomModule()
    {
        $query = GateExpIn::has('tegah');
        return DataTables::of($query)
            ->filter(function ($query) {
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
            ->addColumn('status_tegah', function ($data) {
                if ($data->tegah->flag_release == 0) {
                    return '<strong class="text-danger">Proses Tegah oleh petugas</strong>';
                }
                if ($data->tegah->flag_release == 1) {
                    return '<strong class="text-success">Barang sudah realease</strong>';
                }
            })
            ->addColumn('status_release', function ($data) {
                if ($data->tegah->flag_release == 0) {
                    $r = route('custom-module.get-release', $data->no_bl_awb);
                    return '<a href="' . $r . '" class="btn btn-success btn-xs ">
                                <i class="fas fa-lg fa-fw fa-handshake"></i> Realease
                        </a>';
                }
                if ($data->tegah->flag_release == 1) {
                    return '<button class="btn btn-info btn-xs" onClick=propData.detail_release("' . $data->no_bl_awb . '") >
                        <i class="fas fa-lg fa-fw fa-list-alt"></i> Detail
                    </button>';
                }
            })
            ->rawColumns(['status_tegah', 'status_release'])
            ->make(true);
    }
    public function getExportRealeaseDataForm($hawb)
    {
        return GateExpIn::where('no_bl_awb', $hawb)->first();
    }
    
}
