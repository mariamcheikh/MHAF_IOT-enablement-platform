<?php
/**
 * Created by PhpStorm.
 * User: Firas
 * Date: 12/03/2018
 * Time: 17:41
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CodeGeneratorController extends Controller
{

    public function index()
    {
        return view('code_generator');
    }

    public function generateCode (Request $request){
        //$code =  Input::get('res');
        session(['value' => $request->value]);
        $name = $request->name;
        dump($name);
        DB::table('generate_code')->insert(
            ['user_id' => Auth::user()->getAuthIdentifier(),'name' => $name, 'code_gen' => $request->value]
        );
        //return view('generated_code')->with('code', $res);
        //return redirect()->action('CodeGeneratorController@generator');
    }

    public function showGeneratedCode(Request $request){
        //$code =  Input::get('res');
        session(['value' => $request->value]);
        //return view('generated_code')->with('code', $res);
        //return redirect()->action('CodeGeneratorController@generator');
    }

    public function generator(Request $request){
        $value = $request->session()->get('value');
        $request->session()->forget('value');
        $codeGens = DB::table('generate_code')->where('user_id',Auth::user()->getAuthIdentifier())->select('name', 'code_gen')->get();
        $test_strting=file_get_contents("CodeGenerator.xml");
        $xml = simplexml_load_string($test_strting);
        echo ($value);
        $import = $xml->import;
        $declaration = "";
        $extraFunction = "";
        $setup = $xml->setup->signature;
        $setup = $setup.$xml->setup->begin;
        $loop = $xml->loop->signature;

        if(strlen($value)>4){
            if($value[0]=="1"){
                $declaration = $declaration.$xml->declaration->lcd;
                $setup = $setup.$xml->setup->lcd;
                $loop = $loop.$xml->loop->lcd;
            }
            if($value[0]=="2"){
                $declaration = $declaration.$xml->declaration->lcd2;
                $setup = $setup.$xml->setup->lcd2;
                $loop = $loop.$xml->loop->lcd2;
                $extraFunction = $extraFunction.$xml->lcd2draw;
            }


            if($value[1]=="1"){
                $declaration = $declaration.$xml->declaration->buzzer;
                $setup = $setup.$xml->setup->buzzer;
                $loop = $loop.$xml->loop->buzzer;
            }

            if($value[2]=="1"){
                $declaration = $declaration.$xml->declaration->light;
                $setup = $setup.$xml->setup->light;
                $loop = $loop.$xml->loop->light;
            }
            if($value[2]=="2"){
                $declaration = $declaration.$xml->declaration->lightDisc;
                $setup = $setup.$xml->setup->lightDisc;
                $loop = $loop.$xml->loop->lightDisc;
            }

            if($value[3]=="1"){
                $declaration = $declaration.$xml->declaration->sound;
                $setup = $setup.$xml->setup->sound;
                $loop = $loop.$xml->loop->sound;
            }

            if($value[4]=="1"){
                $declaration = $declaration.$xml->declaration->temperature;
                $loop = $loop.$xml->loop->temperature;
            }
            if($value[4]=="2"){
                $declaration = $declaration.$xml->declaration->humidity;
                $loop = $loop.$xml->loop->humidity;
            }

            if($value[5]=="1"){
                $declaration = $declaration.$xml->declaration->TouchPad;
                $setup = $setup.$xml->setup->TouchPad;
                $loop = $loop.$xml->loop->TouchPad;
            }
            if($value[5]=="2"){
                $declaration = $declaration.$xml->declaration->KeyPad;
                $setup = $setup.$xml->setup->KeyPad;
                $loop = $loop.$xml->loop->KeyPad;
            }
            if($value[5]=="3"){
                $declaration = $declaration.$xml->declaration->touch;
                $setup = $setup.$xml->setup->touch;
                $loop = $loop.$xml->loop->touch;
            }
            if($value[5]=="4"){
                $declaration = $declaration.$xml->declaration->WheelPad;
                $setup = $setup.$xml->setup->WheelPad;
                $loop = $loop.$xml->loop->WheelPad;
            }


        }
        $setup = $setup.$xml->setup->close;
        $loop = $loop.$xml->loop->close;

        $res=$import.$declaration.$extraFunction.$setup.$loop;
        return view('generated_code',['code' => $res,"code_gens" => $codeGens]);
    }

}