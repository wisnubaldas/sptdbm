<?php

namespace App\Models\TpsOnline;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TdInboundStorage extends Model
{
    use HasFactory;
    protected $connection = 'db_tpsonline';
    protected $table = 'td_inbound_storage';
    protected $primaryKey = 'id_';
    // public $incrementing = false;
    // protected $keyType = 'string';
    //  public $timestamps = false;
    const CREATED_AT = '_created_at';
    const UPDATED_AT = '_updated_at';
    protected $fillable = [
        'id_header',
        'status_date',
        'status_time',
        '_is_active',
        '_created_by',
        '_created_at',
        '_updated_by',
        '_updated_at',
        '_remarks_last_update'
    ];
    public static function booted()
    {
        parent::boot();
        static::creating(function ($kolom) {
            $kolom->_created_by = auth()->user()->name;
        });

        static::updating(function ($kolom) {
            $kolom->_updated_by = auth()->user()->name;
        });
    }
    protected $appends = ['code', 'status'];
    public function getCodeAttribute()
    {
        return 'A2';
    }
    public function getStatusAttribute()
    {
        return 'Storage';
    }
}