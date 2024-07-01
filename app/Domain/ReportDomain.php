<?php

namespace App\Domain;

use App\Models\TpsOnline\GateImportIn;
use DB;
use App\Models\Report\DataTimbun;
use  Carbon\Carbon;
use Carbon\CarbonPeriod;
/**
 * Class Domain.
 *
 * @package namespace App\Domain;
 */
class ReportDomain implements ReportDomainInterface
{
    
    public function data_timbun($date = null)
    {
        if(!$date){
            $date = Carbon::today()->setTimezone('Asia/Jakarta')->subDay()->format('Ymd');
        }
        
        $data_timbun = GateImportIn::from('gate_imp_in as a')
        ->select(DB::raw('a.id_kms, a.no_master_bl_awb, a.no_bl_awb, a.no_bc11, a.tgl_bc11, a.consignee, a.no_voy_flight, a.bruto,
        concat(a.created_at," / ",a.kd_dok_inout," - ",a.no_dok_inout, " - ",a.ref_num) as document_in,
        (select concat(created_at," / ",kd_dok_inout," - ",no_dok_inout, " - ", ref_num) from gate_imp_out where no_bl_awb = a.no_bl_awb limit 1) as document_out,
        a.flag_gateout'))
        ->where('a.tgl_bc11',$date)
        ->get();

        if($data_timbun->count() > 0){
            foreach ($data_timbun as $v) {
                DataTimbun::create($v->toArray());
            }
        }else{
            dump('Data kosong.....!!!!');
        }
    }
    public function first_run(){
        $period = CarbonPeriod::create('20240101','20240506');
        foreach ($period as $date) {
            $this->data_timbun($date->format('Ymd'));
        }
    }
    
}
