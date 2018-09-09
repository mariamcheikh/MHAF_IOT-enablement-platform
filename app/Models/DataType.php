<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;


class DataType extends Model
{
    protected $fillable = ['data_type_name', 'data_type_unit', 'data_type_type', 'data_type_access'];

    protected $table = 'data_types';

}
