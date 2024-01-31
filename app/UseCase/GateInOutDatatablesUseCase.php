<?php

namespace App\UseCase;

use Yajra\DataTables\DataTables;
use \App\Models\TpsOnline\GateExpIn;
use \App\Models\TpsOnline\GateExpOut;

/**
 * Class UseCase.
 *
 * @package namespace App\UseCase;
 */
class GateInOutDatatablesUseCase implements GateInOutDatatablesUseCaseInterface
{
    protected $fillable = array("kd_tps", "nm_angkut", "no_voy_flight","tg_tiba", 
    "kd_gudang", "ref_num", "no_bl_awb", "tgl_bl_awb", "no_master_bl_awb", "tgl_master_bl_awb", 
    "id_consignee", "consignee", "bruto", "kd_kem","jml_kem", "kd_dok_inout",
    "no_dok_inout", "tgl_dok_inout", "wk_inout","no_pol",
    "no_bc11", "tgl_bc11", "no_pos_bc11", "pel_muat", "pel_transit","pel_bongkar",
     "no_daftar_pabean", "tgl_daftar_pabean", "no_segel_bc");
    public function make_tables()
    {
        $first = GateExpIn::select($this->fillable)->where(['flag_gateout'=>1]);
        $union = GateExpOut::select($this->fillable)->where(['flag_transfer'=>2])->union($first);
        return DataTables::of($union)->make(true);
    }
    public function carnow_tables(){
        $gateIn = GateExpIn::select($this->fillable)->doesntHave('tegah')->where(['flag_gateout'=>1]);
        return DataTables::of($gateIn)->make(true);
    }
}
