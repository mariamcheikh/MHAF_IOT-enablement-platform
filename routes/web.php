<?php
use Psr\Http\Message\ServerRequestInterface;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*
Route::get('/addDataGroup', function () {
    return view('add_data_group');
});
*/
// Devices routes
Route::get('/devices', 'Devices\DevicesController@show')->name('devices_show');
Route::get('/devices_add', 'Devices\DevicesController@add')->name('devices_add');
Route::get('/devices_connect', 'Devices\DevicesController@connect')->name('devices_connect');
Route::get('/devices_data', 'Devices\DevicesController@data');
Route::get('/devices_showdata/{id}', 'Devices\DevicesController@showData');
Route::get('/devices_showdatas', 'Devices\DevicesController@showDatas')->name('chart');
Route::get('/noDataFound', 'Devices\DevicesController@EmptyPage')->name('nodata');
Route::get('/sharethis', 'Devices\DevicesController@shareThis')->name('sharethis');

Route::get('/addpred', 'Devices\DevicesController@addPrediction');

//Template routes
Route::get('/createtemp','Devices\TemplatesController@create')->name('createtemp');
Route::post('/storetemp','Devices\TemplatesController@store')->name('storethis');
Route::get('/templates','Devices\TemplatesController@index')->name('templates');

//Data Group routes
Route::get('/dataGroup','Devices\DataGroupController@allDataGroup');
Route::get('/addDataGroup','Devices\DataGroupController@showAddDataGroup');
Route::post('/dataGroupForm','Devices\DataGroupController@addDataGroup');
Route::get('/addddttodg','Devices\DataGroupController@index');

//Code Generator
Route::get('/codeGenerator','CodeGeneratorController@index');
Route::get('/generatedCode','CodeGeneratorController@generateCode');
Route::get('/showGeneratedCode','CodeGeneratorController@showGeneratedCode');
Route::post('/generator','CodeGeneratorController@generator');

//Data Type
Route::get('/insertdatatype','Devices\DatatypeController@insert');
Route::get('/createdatatype','Devices\DatatypeController@ajouterdatatype');
Route::get('/showdatatype','Devices\DatatypeController@show');
Route::get('/delete/{id}','Devices\DatatypeController@delete');
Route::get('/editdatatype','Devices\DatatypeController@edit');
Route::get('/updatedatatypeh/{id}','Devices\DatatypeController@update');

Route::get('/addtrigger', 'Devices\DevicesController@addTrgigger');

Route::get('/getdata','Devices\DeviceDataController@getData');

Route::get('/getdata1', function (ServerRequestInterface $request) {
    $name = $request->input("val");
    echo $name;
});


//TRIGGERS
Route::get('/createtriggers','Triggers\TriggerController@ajoutertrigger');
Route::get('/inserttrigger','Triggers\TriggerController@insert');
Route::get('/showtriggers','Triggers\TriggerController@show');

// Applications
Route::get('/application_show', 'Application\ApplicationController@show')->name('application_show');
Route::get('/application_setup', 'Application\ApplicationController@setup')->name('application_setup');
Route::get('/application_create', 'Application\ApplicationController@create')->name('application_create');
Route::post('/application_finish', 'Application\ApplicationController@finish')->name('application_finish');
Route::get('/application_edit', 'Application\ApplicationController@edit')->name('application_edit');
Route::get('/application_test', 'Application\ApplicationController@test')->name('application_test');

////////////////////////////////////////////////////////////////////////////////////////////////////////

//Bulk Device
Route::get('/bulkDeviceUpload','Devices\DevicesController@bulk');
Route::get('/UploadCSV','Devices\DevicesController@upload');

// accesscontrollist
Route::get('/insertaccessList','AccessControlList\AccessContoleListController@insert');
Route::get('/createaccessList','AccessControlList\AccessContoleListController@ajouterAccessList');
Route::get('/showAccessControl','AccessControlList\AccessContoleListController@show');
Route::get('/deleteaccesslist/{id}','AccessControlList\AccessContoleListController@delete');
Route::get('/editaccesslist','AccessControlList\AccessContoleListController@edit');
Route::get('/updatedatatype/{id}','AccessControlList\AccessContoleListController@update');

//Authentification Tokens

Route::get('/auth/token','TokenController@auth');
Route::get('/auth/refresh','TokenController@refresh');
Route::get('/auth/token/invalidate','TokenController@invalidate');
Route::get('account','AccountController@index');

//WebServices For THE ANDROID APP

Route::get('datatype_android',function (){
    return json_encode(\App\Models\DataType::all());
});
Route::get('datagroup_android',function (){
    return json_encode(\App\Models\DataGroup::all());
}
);
Route::get('template_android',function (){
    return json_encode(\App\Models\Template::all());
}
);
Route::get('devices_android',function (){
    return json_encode(\App\Models\Device::all());
}
);
Route::get('devices_connected_android',function (){
    return json_encode(\App\Models\Device::all()->where("status",true));
}
);
Route::get('AccessTypeControl_android',function (){
    return json_encode(\App\Models\AccessControlList::all());
}
);

Route::get('login_android',function (){
    return json_encode(\Jenssegers\Mongodb\Auth\User::all());
}
);
Route::get('Datavalues_android',function (){
    return json_encode(\App\Models\DataValue::all());
}
);

Route::get('/loginandroid', function () {
    return json_encode(\Jenssegers\Mongodb\Auth\User::all());
});

Route::get('Datavalues_android',function (){
    return json_encode(\App\Models\DataValue::all());
}
);
