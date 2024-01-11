<?php

namespace App\Models\TpsOnline;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class TdInboundDeliveryAircarft extends Model
{
    use HasFactory;
    protected $connection = 'db_tpsonline';
    protected $table = 'td_inbound_delivery_aircarft';
    protected $primaryKey = 'id_';
    // public $incrementing = false;
    // protected $keyType = 'string';
    //  public $timestamps = false;
    const CREATED_AT = '_created_at';
    const UPDATED_AT = '_updated_at';

    protected $fillable = ['id_header', 'status_date', 'status_time', '_is_active', '_created_by', '_updated_by', '_remarks_last_update'];
    // tambahin static fill di model
    protected $appends = ['code', 'status'];
    public function getCodeAttribute()
    {
        return 'A1';
    }
    public function getStatusAttribute()
    {
        return 'Delivery from aircraft to incoming warehouse';
    }
    // static value untuk model   
    public static function booted()
    {
        parent::boot();
        static::creating(function ($user) {
            $user->_created_by = auth()->user()->name;
        });

        static::updating(function ($user) {
            $user->_updated_by = auth()->user()->name;
        });
    }

}