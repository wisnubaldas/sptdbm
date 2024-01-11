<?php

namespace App\Models\TpsOnline;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThOutbound extends Model
{
    use HasFactory;
    protected $connection = 'db_tpsonline';
    protected $table = 'th_outbond';
    protected $primaryKey = 'id_';
    // public $incrementing = false;
    // protected $keyType = 'string';
    //  public $timestamps = false;
    const CREATED_AT = '_created_at';
    const UPDATED_AT = '_updated_at';
    protected $fillable = [
        'tps',
        'gate_type',
        'waybill_smu',
        'hawb',
        'koli',
        'netto',
        'volume',
        'kindofgood',
        'airline_code',
        'flight_no',
        'origin',
        'transit',
        'dest',
        'shipper_name',
        'consignee_name',
        '_is_active'
    ];
    public static function booted()
    {
        parent::boot();
        static::creating(function ($kolom) {
            $kolom->_created_by = auth()->user()->name;
            $kolom->tps = auth()->user()->roles->pluck('name')[0];
        });

        static::updating(function ($kolom) {
            $kolom->_updated_by = auth()->user()->name;
        });
    }
    public function td_outbond_acceptance()
    {
        return $this->hasOne(\App\Models\TpsOnline\TdOutbondAcceptance::class, 'id_header', 'id_');
    }
    public function td_outbond_weighing()
    {
        return $this->hasOne(\App\Models\TpsOnline\TdOutbondWeighing::class, 'id_header', 'id_');
    }
    public function td_outbond_manifest()
    {
        return $this->hasOne(\App\Models\TpsOnline\TdOutbondManifest::class, 'id_header', 'id_');
    }
    public function td_outbond_storage()
    {
        return $this->hasOne(\App\Models\TpsOnline\TdOutbondStorage::class, 'id_header', 'id_');
    }
    public function td_outbond_buildup()
    {
        return $this->hasOne(\App\Models\TpsOnline\TdOutbondBuildup::class, 'id_header', 'id_');
    }
    public function td_outbond_delivery_staging()
    {
        return $this->hasOne(\App\Models\TpsOnline\TdOutbondDeliveryStaging::class, 'id_header', 'id_');
    }
    public function td_outbond_delivery_aircarft()
    {
        return $this->hasOne(\App\Models\TpsOnline\TdOutbondDeliveryAircarft::class, 'id_header', 'id_');
    }
    public function td_outbond_loading_aircarft()
    {
        return $this->hasOne(\App\Models\TpsOnline\TdOutbondLoadingAircarft::class, 'id_header', 'id_');
    }
}