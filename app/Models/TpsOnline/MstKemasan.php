<?php

namespace App\Models\TpsOnline;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstKemasan extends Model
{
    use HasFactory;
    protected $connection = 'db_tpsonline';
    protected $table = 'mst_kemasan';
    protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';
    //  public $timestamps = false;
    // const CREATED_AT = 'date_create';
    // const UPDATED_AT = 'date_update';
    protected $fillable = array("kd_kemasan","nama_kemasan");
    // protected $cacheFor = 180;
}
