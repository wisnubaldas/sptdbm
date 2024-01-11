<?php

namespace App\Models\TpsOnline;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GateExpOut extends Model
{
    use HasFactory;
    protected $connection = 'db_tpsonline';
    protected $table = 'get_exp_out';
    protected $primaryKey = 'id_kms';
    // public $incrementing = false;
    // protected $keyType = 'string';
    //  public $timestamps = false;
    const CREATED_AT = 'date_create';
    const UPDATED_AT = 'date_update';
    protected $fillable = array("id_kms", "kd_dok", "kd_tps", "nm_angkut", "no_voy_flight", "call_sign", "tg_tiba", "kd_gudang", "ref_num", "no_bl_awb", "tgl_bl_awb", "no_master_bl_awb", "tgl_master_bl_awb", "id_consignee", "consignee", "consignee_alm", "bruto", "uraian_brg", "no_bc11", "tgl_bc11", "no_pos_bc11", "cont_asal", "seri_kem", "kd_kem", "jml_kem", "kd_timbun", "kd_dok_inout", "no_dok_inout", "tgl_dok_inout", "wk_inout", "kd_sar_angkut", "no_pol", "pel_muat", "pel_transit", "pel_bongkar", "gudang_tujuan", "kode_kantor", "no_daftar_pabean", "tgl_daftar_pabean", "no_segel_bc", "tg_segel_bc", "no_ijin_tps", "tgl_ijin_tps", "id_kms_in", "flag_transfer", "date_create", "date_update", "respon", "token");
}
