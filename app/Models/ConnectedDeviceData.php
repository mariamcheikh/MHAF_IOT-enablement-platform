<?php
/**
 * Created by PhpStorm.
 * User: Anis
 * Date: 5/24/2018
 * Time: 5:38 AM
 */

namespace App\Models;

class TypeData
{
    public $id, $name, $unit, $access, $type;

    public function __construct($id) {
        // Get the type
        $type = DataType::find($id);
        if($type == null)
            return;

        $this->id = $type->_id;
        $this->name = $type->data_type_name;
        $this->type = $type->data_type_type;
        $this->unit = $type->data_type_unit;
        $this->access = $type->data_type_access;
    }
}

class GroupData
{
    public $name, $time, $unit, $datatypes;

    public function __construct($id) {
        // Get the group
        $group = DataGroup::find($id);
        if($group == null)
            return;

        $this->name = $group->name;
        $this->time = $group->time;
        $this->unit = $group->unit;
        $this->datatypes = array();

        // Loop through types
        foreach ($group->datatypes as $typeId)
        {
            // Create new group
            $type = new TypeData($typeId);
            // Add it to the groups array
            array_push($this->datatypes, $type);
        }
    }
}

class TemplateData
{
    public $name, $ping_time, $ping_unit, $datagroups;

    public function __construct($id) {
        // Get the template
        $template = Template::find($id);
        if($template == null)
            return;

        $this->name = $template->name;
        $this->ping_time = $template->ping_time;
        $this->ping_unit = $template->ping_unit;
        $this->datagroups = array();

        // Loop through groups
        foreach ($template->datagroups as $groupId)
        {
            // Create new group
            $group = new GroupData($groupId);
            // Add it to the groups array
            array_push($this->datagroups, $group);
        }
    }
}

class ConnectedDeviceData
{
    public $name, $longitude, $latitude, $template;

    public function __construct($device) {
        $this->name = $device->name;
        $this->longitude = $device->longitude;
        $this->latitude = $device->latitude;

        $this->template = new TemplateData($device->template);
    }
}