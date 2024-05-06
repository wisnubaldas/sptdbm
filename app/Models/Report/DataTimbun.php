<?php

namespace App\Models\Report;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTimbun extends Model
{
    use HasFactory;
    protected $fillable = ["id_kms", "no_master_bl_awb", "no_bl_awb", "no_bc11", "tgl_bc11", "consignee", "no_voy_flight", "bruto", "document_in", "document_out", "flag_gateout"];
}
