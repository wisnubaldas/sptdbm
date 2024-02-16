<?php

namespace App\Models\TpsOnline;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class AutoPenegahan extends Model
{
    use HasFactory;
    protected $connection = 'db_tpsonline';
    protected $table = 'gate_tegah';
    protected $primaryKey = 'id_kms';
    // public $incrementing = false;
    // protected $keyType = 'string';
     public $timestamps = false;
    // const CREATED_AT = 'date_create';
    // const UPDATED_AT = 'date_update';

    protected $fillable = ["id_kms", "type_penegahan", "kd_dok", "kd_tps", "nm_angkut", "no_voy_flight", "call_sign", "tg_tiba", "kd_gudang", "no_bl_awb", "tgl_bl_awb", "no_master_bl_awb", "tgl_master_bl_awb", "id_consignee", "consignee", "bruto", "no_bc11", "tgl_bc11", "no_pos_bc11", "cont_asal", "seri_kem", "kd_kem", "jml_kem", "kd_timbun", "kd_dok_inout", "tgl_dok_inout", "wk_inout", "kd_sar_angkut", "no_pol", "pel_muat", "pel_transit", "pel_bongkar", "kode_kantor", "no_daftar_pabean", "tgl_daftar_pabean", "no_segel_bc", "tg_segel_bc", "alasan_segel", "nama_petugas_segel", "date_create", "no_lepas_segel", "tgl_lepas_segel", "alasan_lepas_segel", "petugas_lepas_segel", "flag_release", "info"];
    // protected $appends = ['code', 'status'];
    
}
