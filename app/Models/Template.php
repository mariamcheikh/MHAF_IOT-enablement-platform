<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Template extends Model
{
    protected $fillable = ['name', 'location', 'description', 'ping_time', 'ping_unit', 'data_source', 'login', 'password', 'datagroups'];

    protected $table = 'devices_templates';
}
