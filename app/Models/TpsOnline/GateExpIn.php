<?php

namespace App\Models\TpsOnline;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\TpsOnline\AutoPenegahan;
class GateExpIn extends Model
{
    use QueryCacheable, HasFactory;
    protected $connection = 'db_tpsonline';
    protected $table = 'get_exp_in';
    protected $primaryKey = 'id_kms';
    // public $incrementing = false;
    // protected $keyType = 'string';
    //  public $timestamps = false;
    const CREATED_AT = 'date_create';
    const UPDATED_AT = 'date_update';

    protected $fillable = array("kd_dok", "kd_tps", "nm_angkut", "no_voy_flight", "call_sign", "tg_tiba", "kd_gudang", "ref_num", "no_bl_awb", "tgl_bl_awb", "no_master_bl_awb", "tgl_master_bl_awb", "id_consignee", "consignee", "consignee_alm", "bruto", "uraian_brg", "no_bc11", "tgl_bc11", "no_pos_bc11", "cont_asal", "seri_kem", "kd_kem", "jml_kem", "kd_timbun", "kd_dok_inout", "no_dok_inout", "tgl_dok_inout", "wk_inout", "kd_sar_angkut", "no_pol", "pel_muat", "pel_transit", "pel_bongkar", "gudang_tujuan", "kode_kantor", "no_daftar_pabean", "tgl_daftar_pabean", "no_segel_bc", "tg_segel_bc", "no_ijin_tps", "tgl_ijin_tps", "flag_transfer", "date_create", "date_update", "flag_gateout", "respon", "token", "Manual");
    // protected $appends = ['code', 'status'];
    protected $cacheFor = 180;

    public function tegah(): HasOne
    {
        return $this->hasOne(AutoPenegahan::class,'no_bl_awb', 'no_bl_awb');
    }
}
