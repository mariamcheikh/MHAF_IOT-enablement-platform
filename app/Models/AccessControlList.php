<?php
/**
 * Created by PhpStorm.
 * User: Mariam
 * Date: 23/04/2018
 * Time: 12:29
 */

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class AccessControlList extends Model
{

    protected $fillable = ['application_name', 'description', 'password','device_template','device_name','Datagroups','datatype','accesstype'];

    protected $table = 'access_control_lists';
}