<?php
/**
 * Created by PhpStorm.
 * User: Mariam
 * Date: 28/03/2018
 * Time: 16:07
 */

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;


class DeviceSync extends Model
{
    // Setup the primary key as a unique string key
    public $incrementing = false;
    public $keyType = "string";

    protected $table = 'devices_sync';

    // Disable timestamp columns
    public $timestamps = false;

    // Attributes
    protected $fillable = ['value', 'datatype_id', 'device_id'];
}