<?php
/**
 * Created by PhpStorm.
 * User: Anis
 * Date: 3/15/2018
 * Time: 10:49 PM
 */

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Application extends Model
{
    // Setup the primary key as a unique increamenting key
    public $incrementing = true;

    // Attributes
    protected $fillable = ['name', 'blocks'];
}