<?php

namespace App\Models\TpsOnline;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TdOutbondStorage extends Model
{
    use HasFactory;
    protected $connection = 'db_tpsonline';
    protected $table = 'td_outbond_storage';
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
    ];
    protected $appends = ['code', 'status'];
    public function getCodeAttribute()
    {
        return 'C3';
    }
    public function getStatusAttribute()
    {
        return 'Storage Position';
    }
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

}