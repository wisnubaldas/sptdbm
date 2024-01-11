<?php

namespace App\Models\TpsOnline;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TdInboundBreakdown extends Model
{
    use HasFactory;
    protected $connection = 'db_tpsonline';
    protected $table = 'td_inbound_breakdown';
    protected $primaryKey = 'id_';
    // public $incrementing = false;
    // protected $keyType = 'string';
    //  public $timestamps = false;
    const CREATED_AT = '_created_at';
    const UPDATED_AT = '_updated_at';

    protected $fillable = ['id_header', 'status_date', 'status_time', '_is_active', '_created_by', '_updated_by', '_remarks_last_update'];
    protected $appends = ['code', 'status'];
    public function getCodeAttribute()
    {
        return 'A2';
    }
    public function getStatusAttribute()
    {
        return 'Arrival at Incoming warehouse';
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