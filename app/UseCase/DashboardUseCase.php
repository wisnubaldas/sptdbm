<?php

namespace App\UseCase;

use App\Models\TpsOnline\GateExpIn;
use App\Models\TpsOnline\GateExpOut;
use App\Models\TpsOnline\GateImportIn;
use App\Models\TpsOnline\GateImportOut;
use App\Models\TpsOnline\XmlLog;
use DB;
use Carbon\Carbon;

/**
 * Class UseCase.
 *
 * @package namespace App\UseCase;
 */
class DashboardUseCase implements DashboardUseCaseInterface
{
    public $dateNow;

    public function __construct()
    {
        $this->dateNow = Carbon::now();
    }
    public function panel_header()
    {
        return [
            'import' => [
                'gate_in' => GateImportIn::count(),
                'gate_out' => GateImportIn::where('flag_gateout', 1)->count(),
            ],
            'export' => [
                'gate_in' => GateExpIn::count(),
                'gate_out' => GateExpIn::where('flag_gateout', 1)->count(),
            ]
        ];
    }
    public function chart_import($date = null)
    {
        if ($date) {
            $start = $date->start;
            $end = $date->end;
        } else {
            $start = $this->dateNow->startOfMonth()->format('Ymd');
            $end = $this->dateNow->endOfMonth()->format('Ymd');
        }
        return GateImportIn::select(DB::raw('SUBSTRING(tgl_bl_awb,5) AS tgl,COUNT(tgl_bl_awb) AS jml'))
            ->whereRaw("(date_format(str_to_date(tgl_bl_awb,'%Y%m%d'),'%Y%m%d') BETWEEN '" . $start . "' AND '" . $end . "')")
            ->groupBy('tgl_bl_awb')
            ->get();
    }
    public function chart_ekspor($date = null)
    {
        if ($date) {
            $start = $date->start;
            $end = $date->end;
        } else {
            $start = $this->dateNow->startOfMonth()->format('Ymd');
            $end = $this->dateNow->endOfMonth()->format('Ymd');
        }
        return GateExpIn::select(DB::raw('SUBSTRING(tgl_bl_awb,5) AS tgl,COUNT(tgl_bl_awb) AS jml'))
            ->whereRaw("(date_format(str_to_date(tgl_bl_awb,'%Y%m%d'),'%Y%m%d') BETWEEN '" . $start . "' AND '" . $end . "')")
            ->groupBy('tgl_bl_awb')
            ->get();
    }
    public function chart_bruto()
    {
        return GateImportIn::select(DB::raw('SUBSTRING(tgl_bl_awb,7) AS tgl,SUM(bruto) AS berat'))
            ->whereRaw("(date_format(str_to_date(tgl_bl_awb,'%Y%m%d'),'%Y%m%d') BETWEEN '" . $this->dateNow->startOfMonth()->format('Ymd') . "' AND '" . $this->dateNow->endOfMonth()->format('Ymd') . "')")
            ->groupBy('tgl_bl_awb')
            ->get();
    }
    
    public function pie_pertahun() {
        // dd($this->dateNow->format('Y'));
        return GateImportOut::select(DB::raw('SUBSTRING(tgl_bl_awb,5,2) AS bln, COUNT(id_kms) AS jml_out'))
            ->whereRaw("(date_format(str_to_date(tgl_bl_awb,'%Y%m%d'),'%Y') BETWEEN '" . $this->dateNow->startOfYear()->format('Y') . "' AND '" . $this->dateNow->endOfYear()->format('Y') . "')")
            ->groupBy('bln')
            ->get();
    }

    public function donat_per_tahun()
    {
        // dd($this->dateNow->format('Y'));
        return GateImportIn::select(DB::raw('SUBSTRING(tgl_bl_awb,5,2) AS bln, SUM(bruto) AS berat'))
            ->whereRaw("(date_format(str_to_date(tgl_bl_awb,'%Y%m%d'),'%Y') BETWEEN '" . $this->dateNow->startOfYear()->format('Y') . "' AND '" . $this->dateNow->endOfYear()->format('Y') . "')")
            ->groupBy('bln')
            ->get();
    }
    public function log_xml()
    {
        return XmlLog::latest()->limit(7)->get();
    }

}
