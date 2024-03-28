<?php

namespace App\UseCase;

use App\Models\TpsOnline\GateExpIn;
use App\Models\TpsOnline\GateExpOut;
use App\Models\TpsOnline\GateImportIn;
use App\Models\TpsOnline\GateImportOut;
use DB;
use Carbon\Carbon;
/**
 * Class UseCase.
 *
 * @package namespace App\UseCase;
 */
class DashboardUseCase implements DashboardUseCaseInterface
{

    public function panel_header()
    {
        return [
            'import' => [
                'gate_in' => GateImportIn::count(),
                'gate_out' => GateImportIn::where('flag_gateout', 1)->count(),
            ],
            'export'=>[
                'gate_in' => GateExpIn::count(),
                'gate_out' => GateExpIn::where('flag_gateout', 1)->count(),
            ]
        ];
    }
    public function chart_import(){
        $wr = new Carbon('now');
        return GateImportIn::select(DB::raw('SUBSTRING(tgl_bl_awb,7) AS tgl,COUNT(tgl_bl_awb) AS jml'))
        ->whereRaw("(date_format(str_to_date(tgl_bl_awb,'%Y%m%d'),'%Y%m%d') BETWEEN '".$wr->startOfMonth()->format('Ymd')."' AND '".$wr->endOfMonth()->format('Ymd')."')")
        ->groupBy('tgl_bl_awb')
        ->get();
    }
    function chart_ekspor() {
        $wr = new Carbon('now');
        return GateExpIn::select(DB::raw('SUBSTRING(tgl_bl_awb,7) AS tgl,COUNT(tgl_bl_awb) AS jml'))
        ->whereRaw("(date_format(str_to_date(tgl_bl_awb,'%Y%m%d'),'%Y%m%d') BETWEEN '".$wr->startOfMonth()->format('Ymd')."' AND '".$wr->endOfMonth()->format('Ymd')."')")
        ->groupBy('tgl_bl_awb')
        ->get();
    }

}
