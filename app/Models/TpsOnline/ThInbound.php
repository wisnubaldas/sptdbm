<?php

namespace App\Models\TpsOnline;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThInbound extends Model
{
    use HasFactory;
    protected $connection = 'db_tpsonline';
    protected $table = 'th_inbound';
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
        '_is_active',
        '_created_by',
        '_created_at',
        '_updated_by',
        '_updated_at',
        '_remarks_last_update',
        'key_upload',
        'full_check'
    ];

    // static value untuk model   
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

    public function td_inbound_delivery_aircarft()
    {
        return $this->hasOne(\App\Models\TpsOnline\TdInboundDeliveryAircarft::class, 'id_header', 'id_');
    }
    public function td_inbound_breakdown()
    {
        return $this->hasOne(\App\Models\TpsOnline\TdInboundBreakdown::class, 'id_header', 'id_');

    }
    public function td_inbound_storage()
    {
        return $this->hasOne(\App\Models\TpsOnline\TdInboundStorage::class, 'id_header', 'id_');

    }
    public function td_inbound_clearance()
    {
        return $this->hasOne(\App\Models\TpsOnline\TdInboundClearance::class, 'id_header', 'id_');

    }
    public function td_inbound_pod()
    {
        return $this->hasOne(\App\Models\TpsOnline\TdInboundPod::class, 'id_header', 'id_');

    }
}