<?php
/**
 * Created by PhpStorm.
 * User: Mariam
 * Date: 08/02/2018
 * Time: 12:12
 */

namespace App\Http\Controllers\Devices;
use App\Http\Controllers\Controller;
use App\Models\DataType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Symfony\Component\VarDumper\Cloner\Data;

class DatatypeController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'data_type_name' => 'required|string|max:255',
            'data_type_unit' => 'string|max:255',
            'data_type_type' => 'required|string|max:255',
        ]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajouterdatatype()
    {

        return  view('createdatatype');
    }

    protected function insert(Request $request)
    {
        DataType::create(array('data_type_name' => $request->data_type_name, 'data_type_unit' => $request->data_type_unit,
            'data_type_type' => $request->data_type_type, 'data_type_access' => $request->data_type_access));

        flashy()->success('DataType Created Successfully', '');

        return redirect('/showdatatype');
    }

    public function show()
    {
        $datatypes = DataType::all();

        return view("showdatatype", array("datatypes" => $datatypes));
    }

    public function delete($data_type_id)
    {
        DB::table('data_types')->where('_id',$data_type_id)->delete();
        flashy()->info('DataType deleted Successfully', '');
        return redirect('/showdatatype');
        //return "Success";
    }


    public function edit()
    {
        $data_type_id = Input::get("id");
        $datatypes = DataType::find($data_type_id);

        return view('editdatatype',['datatypes'=>$datatypes]);
    }

    public function update(Request $request,$data_type_id)
    {
        $datatypes = DataType::find($data_type_id);
        $datatypes->data_type_name = Input::get('data_type_name');
        $datatypes->data_type_unit = Input::get('data_type_unit');
        $datatypes->data_type_type = Input::get('data_type_type');
        $datatypes->data_type_access = Input::get('data_type_access');
        $datatypes->save();
        flashy()->info('DataType Updated Successfully', '');
        return redirect('/showdatatype');

    }



}