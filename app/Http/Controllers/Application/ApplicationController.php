<?php
/**
 * Created by PhpStorm.
 * User: Anis
 * Date: 3/12/2018
 * Time: 7:19 PM
 */

namespace App\Http\Controllers\Application;


use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationAction;
use App\Models\ApplicationActionMessage;
use App\Models\ApplicationCondition;
use App\Models\DataType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class ApplicationController extends Controller
{
    public function show()
    {
        // Find applications
        $applications = Application::all();
        // Render view
        return view("application/show", array("applications" => $applications));
    }

    public function setup()
    {
        // Find datatypes
        $datatypes = DataType::all();
        // Find device's datatypes
        return view("application/setup", array("datatypes" => $datatypes));
    }

    public function create()
    {
        $name = Input::get("name");
        $datatype = Input::get("datatype");

        $application = Application::create(array('name' => $name, "datatype" => $datatype, "blocks" => array()));
        return view("application/create", array("application" => $application));
    }

    public function finish(Request $request)
    {
        $data = $request->json();

        $blocks = array();
        $header = false;
        foreach ($data as $block)
        {
            // Get header
            if(!$header)
            {
                $id = $block["id"];
                $header = true;
                continue;
            }
            $type = $block["type"];
            if($type == 0)
            {
                $condition_type = $block["condition"];
                $value = $block["value"];

                $condition = new ApplicationCondition();
                $condition->type = $type;
                $condition->condition = $condition_type;
                $condition->value = $value;

                array_push($blocks, $condition);
            }
            else
            {
                $action_type = $block["action"];

                if($action_type == 2)
                {
                    $action = new ApplicationActionMessage();
                    $action->type = $type;
                    $action->action = $action_type;
                    $action->message = $block["message"];
                }
                else
                {
                    $action = new ApplicationAction();
                    $action->type = $type;
                    $action->action = $action_type;
                }

                array_push($blocks, $action);
            }
        }

        // Update application
        Application::find($id)->update(array("blocks" => $blocks));

       // Application::create(array('name' => $name, "datatype" => $datatype, "blocks" => $blocks));
        return Response::HTTP_OK;
    }

    public function edit()
    {
        $id = Input::get("id");

        $application = Application::find($id);
        return view("application/create", array("application" => $application));
    }

    public function test()
    {
        $name = Input::get("name");
        $datatype = Input::get("datatype");

        $application = Application::create(array('name' => $name, "datatype" => $datatype, "blocks" => array()));
        return view("application/test", array("application" => $application));
    }
}