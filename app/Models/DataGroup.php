<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class DataGroup extends Eloquent
{
    protected $fillable = ['name', 'description', 'time', 'unit', 'datatypes'];

    protected $table = 'data_groups';

    /*public function datatypes()
    {
        return $this->belongsToMany('App\Models\DataType');
    }*/

    //protected $appends = array('availability');
}
