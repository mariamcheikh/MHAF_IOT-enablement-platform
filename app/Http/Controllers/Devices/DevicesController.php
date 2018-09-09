<?php
/**
 * Created by PhpStorm.
 * User: Anis
 * Date: 2/7/2018
 * Time: 7:06 PM
 */

namespace App\Http\Controllers\Devices;


use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationMessage;
use App\Models\ConnectedDeviceData;
use App\Models\DataGroup;
use App\Models\DataType;
use App\Models\DataValue;
use App\Models\Device;
use App\DeviceData;
use App\Models\Prediction;
use App\Models\Template;
use App\Models\Trigger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\Array_;

class DevicesController extends Controller
{
    public function show()
    {
        // Get all devices
        $devices = Device::all();
        // Send them to the blade's view
        return view("devices/show", array("devices" => $devices));
    }

    public function add()
    {
        // Do we have an add form
        $name = Input::get("name");
        if(!isset($name)){
            $templates = Template::all();
            return view("devices/add")->with("templates", $templates);
        }
        else
        {
            // Get parameters
            $description = Input::get("description");
            $location = Input::get("location");
            $template = Input::get("template");
            // Validate parameters
            if(!isset($description) || !isset($location) || !isset($template))
                return view("devices/add", array("error" => "Missing parameters, Please try again !"));

            // Get locations
            $longitude = strtok($location, ",");
            $latitude = strtok(",");

            $longitude = substr($longitude, 1);
            $latitude = substr($latitude, 0, strlen($latitude) - 1);
            // Get the template
            $targetTemplate = Template::find($template[0]);
            // Create a new device model
            Device::create(array('name' => $name, 'longitude' => $longitude, 'latitude' => $latitude,
                'description' => $description, 'status' => false, 'template' => $targetTemplate->_id));

            // Fill device data
            /*$deviceData = new DeviceData();
            $temp = Template::all()->where('_id', $template[0])->toArray();
            $deviceData->template = $temp[0];
            $deviceData->save();*/
            return Redirect::route('devices_show', array('success' => "Device \"$name\" was successfully created."));
        }
    }

    public function connect()
    {
        // Get id
        $id = Input::get("id");
        // Find device by id
        $device = Device::find($id);
        if($device == null)
            return Response("Invalid device identifier", 405);

        // Set device as connected
        $device->status = true;
        $device->last_time = date('Y-m-d H:i:s');
        $device->save();
        // Retrieve and return the data
        $connectedDevice = new ConnectedDeviceData($device);
        return json_encode($connectedDevice);
    }
    public function connect2()
    {
        // Get id
        $id = Input::get("id");
        // Find device by id
        $device = Device::find($id);
        if($device == null)
            return Response("Invalid device identifier", 405);

        // Set device as connected
        $device->status = true;
        $device->save();
        // Retrieve and return the data
        return DeviceData::all();
    }

    public function data()
    {
        // Get id
        $id = Input::get("id");
        $value = Input::get("value");
        if(!isset($id) || !isset($value))
             return Response("Invalid parameters", 405);
        //$name = DB::table('templates')->where('_id', '5a848a94ce74e01bbc0e880d')->first();

        //DeviceData::create(array('name' => $name, 'value' => 'aaa'));
        //DeviceData::create(array('name' => $name, 'value' => 'aaa'));
        // Send data
        DataValue::create(array('data_id' => $id, 'value' => $value));
        $dt= DataType::where("_id",$id)->get();
        $trigger = Trigger::select("select * from triggers WHERE datatype._id == ".$id)->first();
        Trigger::all()->where("_id", $trigger->_id);
        // Process application
        $commands = array();
        //$this->processApplication($id, $value, $commands);
        return $commands;
    }

    public function showData($id)
    {
        $devices = DataValue::where('device_id', $id)->get();
        $c = 0;

        // different data types IDs
        $dataTypeIds = array();

        //find number of data types

        //fill the dataVeues names in list
        $labelList = array();
        $label1 = DataType::where('_id', $devices[0]->data_id)->get();
        $labelList [0] = $label1[0]->data_type_name;

        //$dataTypeIds[$label1[0]->data_type_name] = $devices[0]->data_id;
        $dataTypeIds[0] = $devices[0]->data_id;
        for($i = 1; $i < $devices->count(); $i++){
            if(!(in_array($devices[$i]->data_id, $dataTypeIds)))
            {
                $label1 = DataType::where('_id', $devices[$i]->data_id)->get();
                $c++;
                $dataTypeIds[$c] = $devices[$i]->data_id;
                $labelList [$c] = $label1[0]->data_type_name;
            }
        }

        //fill list with data value arrays()
        $devicesArray = array();
        for($cpt = 0; $cpt < count($dataTypeIds); $cpt++)
        {
            /*$ar = array();
            for($i2 = 0; $i2 < $devices->count(); $i2++)
            {
                if($devices[$i2]->data_id == $dataTypeIds[$cpt])
                {
                    $ar[] = $devices[$i2];
                }
            }*/
            $devicesArray[] = DataValue::where('device_id', $id)->where('data_id', $dataTypeIds[$cpt])->get();
        }

        $trigger1 = Trigger::all()->first();
        $triggers = array();
        for($cpt1 = 0; $cpt1 < count($dataTypeIds); $cpt1++)
        {
            $triggers[] = Trigger::where("datatype.data_type_name", $labelList[$cpt1])->get();
        }
        //$trg = ((object)($trigger[0]->datatype))->data_type_name;
        $pred = Prediction::all()->first();

        if(count($devicesArray)>0 && count($devicesArray[0])>0)
        {
            //return view("./devices/DeviceData", ["triggers"=> $triggers, "devicesArray" => $devicesArray, "labelList" => $labelList, "devicedata" => $devices, "warningValue" => $trigger1->value , "pred" => $pred->value, "dtCount" => $c+1, "dataTypeIds" => "lala"])->with('devicedata', $devices);
            return view("./devices/DeviceData", ["triggers"=> $triggers, "devicesArray" => $devicesArray, "labelList" => $labelList, "devicedata" => $devices, "warningValue" => $trigger1->value , "pred" => $pred->value, "dtCount" => $c+1, "dataTypeIds" => "lala"])->with('devicedata', $devices);
        }
        else
        {
            return redirect()->route('nodata');
        }
        //return  count($devicesArray[0]);//[0];//->value;
    }

    private function processApplication($datatype, $datatype_value, &$messages)
    {
        // Process application
        $application = Application::where("datatype", $datatype)->get();
        echo $application;
        if($application != null)
        {
            foreach ($application[0]->blocks as $block)
            {
                if (!$this->processBlock($block, $datatype_value, $messages))
                    break;
            }
        }
    }

    private function processBlock($block, $datatype_value, &$messages)
    {
        if($block["type"] == 0)
        {
            $value = $block["value"];
            $condition = $block["condition"];

            $output = false;
            switch ($condition)
            {
                case 0:
                    $output = $datatype_value == $value;
                    break;

                case 1:
                    $output = $datatype_value != $value;
                    break;

                case 2:
                    $output = $datatype_value >= $value;
                    break;

                case 3:
                    $output = $datatype_value <= $value;
                    break;

                case 4:
                    $output = $datatype_value > $value;
                    break;

                case 5:
                    $output = $datatype_value < $value;
                    break;
            }

            return $output;
        }
        else
        {
            $action = $block["action"];
            if($action == 2)
            {
                $msg = new ApplicationMessage();
                $msg->message = $block["message"];

                array_push($messages, $msg);
            }
            return true;
        }
    }

    public function EmptyPage()
    {
        return view("./noDataFound");
    }

    public function shareThis()
    {
        return view("./Share");
    }

    public function addTrgigger()
    {
        $dataypes = DataType::all();
        return view("/addTrigger")->with('datatype', $dataypes);
    }

    public  function addPrediction()
    {
        Prediction::create(array('data_id' => "aaa", 'value' => "18"));
        return "Done";
    }


    public function senddata($data){

        $id = Input::get("id");
        $value = Input::get("value");

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'http://172.16.30.21');

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        curl_setopt($ch, CURLOPT_PORT, 8000);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);

        curl_setopt($ch, CURLOPT_POST, true);

        $pf = array('data_id' => $id,'value' => $value);

        foreach($data as $k => $v) {
            $pf['data'][$k] = $v;
        }

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($pf));

        curl_exec($ch);
        curl_close($ch);


        return "senddata1";
    }


    public function sync()
    {
        $id = Input::get("id");
        $values = DeviceSync::where('device_id', $id)->get();
        DeviceSync::where('device_id', $id)->delete();
        return Response($values, 200);
    }

    public function ping()
    {
        // Get id
        $id = Input::get("id");
        if(!isset($id))
            return Response("Invalid parameters", 405);
        // Send data
        $device = Device::find($id);
        $device->last_time = date('Y-m-d H:i:s');
        $device->save();
        return 200;
    }

    public function bulk()
    {

        return view("devices/bulk");
        // $devices = Device::all();
        //return view("devices/show", array("devices" => $devices));
    }


    public function upload()
    {

        $command = escapeshellcmd('python Bulk.py');
        shell_exec($command);
        // return view("devices/bulk");
        $devices = Device::all();
        flashy()->info('CSV File Uploaded Successfully', '');
        return view("devices/show", array("devices" => $devices));
    }


}