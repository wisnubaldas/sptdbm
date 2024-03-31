<?php

namespace App\Models\TpsOnline;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XmlLog extends Model
{
    use HasFactory;
    protected $connection = 'db_tpsonline';
    protected $table = 'xml_log';
    protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';
    //  public $timestamps = false;
    // const CREATED_AT = '_created_at';
    // const UPDATED_AT = '_updated_at';
}
