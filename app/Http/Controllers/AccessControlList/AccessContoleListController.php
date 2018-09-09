<?php
/**
 * Created by PhpStorm.
 * User: Mariam
 * Date: 23/04/2018
 * Time: 12:24
 */

namespace App\Http\Controllers\AccessControlList;
use App\Http\Controllers\Controller;
use DB;
use App\Models\AccessControlList;
use App\Models\Device;
use App\Models\Template;
use App\Models\DataGroup;
use App\Models\DataType;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
class AccessContoleListController  extends Controller
{
    public function ajouterAccessList()
    {
        $datagrps = DataGroup::all();
        $templates = Template::all();
        $dataTypes = DataType::all();
        $devices = Device::all();

        //$dataGroups = DataGroup::get();
        return  view('accesscontrollist/add')->with("templates", $templates)->with("datagrps", $datagrps)->with("dataTypes", $dataTypes)
            ->with("devices", $devices);
    }

    protected function insert(Request $request)
    {
        $data = ['application_name'=>$request->application_name,
            'description'=>$request->application_description,
            'password'=> bcrypt($request['password']),

             'device_template'=>Template::find($request->device_template)->toArray(),//DataType::whereIn("_id",$request->dataTypes)->get()->toArray();
            'device_name'=>Device::find($request->device_name)->toArray(),
           'Datagroups'=>DataGroup::find($request->Datagroups)->toArray(),
           'datatype'=>DataType::find($request->datatype)->toArray(),
            'accesstype'=>$request->accesstype,

        ];
        AccessControlList::create($data);
        //DB::table('access_control_lists')->insert($data);
        flashy()->success('AccessList Created Successfully', '');
        return redirect('showAccessControl');


       /* $AccessControl = new AccessControlList();
        $AccessControl->application_name = $request->input('application_name');
        $AccessControl->description = $request->input('description');
        $AccessControl->password = $request->input('password');
        $AccessControl->dataTypes = DataType::whereIn("_id",$request->dataTypes)->get()->toArray();
        $AccessControl->datagroups = DataGroup::whereIn("_id",$request->datagrps)->get()->toArray();
        $AccessControl->device_template = Template::whereIn("_id",$request->templates)->get()->toArray();
        $AccessControl->devices = Device::whereIn("_id",$request->devices)->get()->toArray();
        $AccessControl->accesstype = $request->input('accesstype');
        $AccessControl->save();

        AccessControlList::create($AccessControl);
        //DB::table('access_control_lists')->insert($request);
        return redirect('/showAccessControl')->with('success', 'access List created');*/



    }

    public function show()
    {
        $access_control_lists = AccessControlList::all();

        return view("accesscontrollist/show", array("access_control_lists" => $access_control_lists));
    }

    public function delete($accesslist_id)
    {
        DB::table('access_control_lists')->where('_id',$accesslist_id)->delete();
        flashy()->info('AccessList deleted Successfully', '');
        return redirect('/showAccessControl');
        //return "Success";
    }
    public function edit()
    {  $accesslist_id = Input::get("id");
        $datagrps = DataGroup::all();
        $templates = Template::all();
        $dataTypes = DataType::all();
        $devices = Device::all();
        $accesslists = AccessControlList::find($accesslist_id);
    return  view('accesscontrollist/editaccessList',['access_control_lists'=>$accesslists])->with("device_template", $templates)->with("Datagroups", $datagrps)->with("datatype", $dataTypes)
            ->with("device_name", $devices);

    }

        public function update(Request $request,$accesslist_id)
    {
        $accesslists = AccessControlList::find($accesslist_id);
        $accesslists->application_name = Input::get('application_name');
        $accesslists->description = Input::get('application_description');
        $accesslists->password = Input::get('password');
        $accesslists->accesstype = Input::get('accesstype');
///////////////////
 /*
  *   'device_template'=>Template::find($request->device_template)->toArray(),//DataType::whereIn("_id",$request->dataTypes)->get()->toArray();
            'device_name'=>Device::find($request->device_name)->toArray(),
           'Datagroups'=>DataGroup::find($request->Datagroups)->toArray(),
           'datatype'=>DataType::find($request->datatype)->toArray(),
 */


            $accesslists->device_template = Template::find($request->device_template)->toArray();//DataType::whereIn("_id",$request->dataTypes)->get()->toArray();
          $accesslists->device_name = Device::find($request->device_name)->toArray();
           $accesslists->Datagroups = DataGroup::find($request->Datagroups)->toArray();
            $accesslists->datatype = DataType::find($request->datatype)->toArray();


//////////////////
        $accesslists->save();
        flashy()->info('Access List Updated Successfully', '');
        return redirect('/showAccessControl');


    }

}