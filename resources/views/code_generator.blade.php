@extends("index")
@section("head")
    <style>
        .iot_ports, .iot_ports_drop {
            float: left;
            display: inline-block;
            margin: 2px;
            padding: 2px;
            border: solid;
            text-align: center;
            vertical-align: middle;
            background-repeat: no-repeat;
            background-position: center;
            position: relative;


        }
    </style>
    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            /*ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            var src = document.getElementById (ev.dataTransfer.getData ("src"));
            var idx = data.indexOf("_");
            var idx2 = ev.target.id.indexOf("_");
            if(data.substring(0, idx) == ev.target.id.substring(0, idx2)){
                ev.target.appendChild(document.getElementById(data));
                    //data.target.parent.appendChild(ev.target.childNodes[1])
            }*/



            ev.preventDefault ();
            var src = document.getElementById (ev.dataTransfer.getData ("text"));
            var data = ev.dataTransfer.getData("text");
            var srcParent = src.parentNode;
            var idx = data.indexOf("_");
            var idx2 = ev.target.id.indexOf("_");
            var tgt = ev.currentTarget.firstElementChild;
            if((data.substring(0, idx) == ev.target.id.substring(0, idx2))&& tgt != null) {
                ev.currentTarget.replaceChild(src, tgt);
                srcParent.appendChild(tgt);
            }else if(data.substring(0, idx) == ev.target.id.substring(0, idx2)){
                ev.target.appendChild(document.getElementById(data));
            }

        }
    </script>
@endsection

@section("body")
        <div class="">

            <div class="page-title">
                <div class="title_left">
                    <h3>
                        Code Generator
                    </h3>
                </div>

            </div>
            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12">
                    <div class="x_panel">

                        <div class="x_content">


                            <div class="row">

                                <div class="col-sm-4 mail_view">


                                    <div class="mail_list">
                                        <div class="right">
                                            <h3> <small style="font-size: 15px;color: #ff0000;">Port I2C</small></h3>
                                        </div>
                                        <div class="right">
                                            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                                                <div class="menu_section">
                                                    <ul class="nav side-menu">
                                                        <li class="" style="font-size: 20px;color: #73879C;">LCD<span class="fa fa-chevron-down"></span>
                                                            <ul class="nav child_menu" style="display: none;">
                                                                <li><div class="iot_ports" id="lcd_port" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-width: 205px; min-height: 70px;background-image: url(images/CodeGenerator/LCD_BG.png);">
                                                                        <img src="images/CodeGenerator/LCD.png" draggable="true" ondragstart="drag(event)" id="lcd_image1">
                                                                    </div>
                                                                </li>
                                                                <li><div class="iot_ports" id="lcd_port" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-width: 205px; min-height: 70px;background-image: url(images/CodeGenerator/LCD_BG.png);">
                                                                        <img src="images/CodeGenerator/LCD12.png" draggable="true" ondragstart="drag(event)" id="lcd_image2">
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>

                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="mail_list">
                                        <div class="right">
                                            <h3> <small style="font-size: 15px;color: #ff0000;">Port D</small></h3>
                                        </div>
                                        <div class="right">
                                            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                                                <div class="menu_section">
                                                    <ul class="nav side-menu">
                                                        <li class="" style="font-size: 20px;color: #73879C;">Buzzer<span class="fa fa-chevron-down"></span>
                                                            <ul class="nav child_menu" style="display: none;">
                                                                <li><div class="iot_ports" id="buzzer_port" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-width: 104px; min-height: 107px;background-image: url(images/CodeGenerator/Buzzer_BG.png); ">
                                                                        <img src="images/CodeGenerator/Buzzer.png" draggable="true" ondragstart="drag(event)" id="buzzer_sensor1">
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>

                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="right">
                                            <h3> <small style="font-size: 15px;color: #ff0000;">Port A</small></h3>
                                        </div>
                                        <div class="right">
                                            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                                                <div class="menu_section">
                                                    <ul class="nav side-menu">
                                                        <li class="" style="font-size: 20px;color: #73879C;">Light Sensor<span class="fa fa-chevron-down"></span>
                                                            <ul class="nav child_menu" style="display: none;">
                                                                <li><div class="iot_ports" id="light_port" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-width: 104px; min-height: 107px;background-image: url(images/CodeGenerator/Light_sensor_BG.png);">
                                                                        <img src="images/CodeGenerator/Light_sensor.png" draggable="true" ondragstart="drag(event)" id="light_sensor1">
                                                                    </div>
                                                                </li>
                                                                <li><div class="iot_ports" id="light_port" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-width: 104px; min-height: 107px;background-image: url(images/CodeGenerator/Light_sensor_BG.png);">
                                                                        <img src="images/CodeGenerator/Light.png" draggable="true" ondragstart="drag(event)" id="light_sensor2">
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>

                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="right">
                                            <h3> <small style="font-size: 15px;color: #ff0000;">Port A</small></h3>
                                        </div>
                                        <div class="right">
                                            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                                                <div class="menu_section">
                                                    <ul class="nav side-menu">
                                                        <li class="" style="font-size: 20px;color: #73879C;">Sound Sensor<span class="fa fa-chevron-down"></span>
                                                            <ul class="nav child_menu" style="display: none;">
                                                                <li> <div class="iot_ports" id="sound_port" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-width: 104px; min-height: 107px;background-image: url(images/CodeGenerator/Sound_sensor_BG.png);">
                                                                        <img src="images/CodeGenerator/Sound_sensor.png" draggable="true" ondragstart="drag(event)" id="sound_sensor1">
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>

                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="right">
                                            <h3> <small style="font-size: 15px;color: #ff0000;">Port A</small></h3>
                                        </div>
                                        <div class="right">
                                            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                                                <div class="menu_section">
                                                    <ul class="nav side-menu">
                                                        <li class="" style="font-size: 20px;color: #73879C;">Temperature Sensor<span class="fa fa-chevron-down"></span>
                                                            <ul class="nav child_menu" style="display: none;">
                                                                <li> <div class="iot_ports" id="temp_port" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-width: 104px; min-height: 107px;background-image: url(images/CodeGenerator/Temperature_sensor_BG.png);">
                                                                        <img src="images/CodeGenerator/Temperature.png" draggable="true" ondragstart="drag(event)" id="temp_sensor1">
                                                                    </div>
                                                                </li>
                                                                <li> <div class="iot_ports" id="temp_port" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-width: 104px; min-height: 107px;background-image: url(images/CodeGenerator/Temperature_sensor_BG.png);">
                                                                        <img src="images/CodeGenerator/Temperature-Humidity.png" draggable="true" ondragstart="drag(event)" id="temp_sensor2">
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>

                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="right">
                                            <h3> <small style="font-size: 15px;color: #ff0000;">Port D</small></h3>
                                        </div>
                                        <div class="right">
                                            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                                                <div class="menu_section">
                                                    <ul class="nav side-menu">
                                                        <li class="" style="font-size: 20px;color: #73879C;">Touch Sensor<span class="fa fa-chevron-down"></span>
                                                            <ul class="nav child_menu" style="display: none;">
                                                                <li><div class="iot_ports" id="touch_port" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-width: 104px; min-height: 107px;background-image: url(images/CodeGenerator/Touch_sensor_BG.png);">
                                                                        <img src="images/CodeGenerator/TouchPad.png" draggable="true" ondragstart="drag(event)" id="touch_sensor1">
                                                                    </div>
                                                                </li>
                                                                <li><div class="iot_ports" id="touch_port" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-width: 104px; min-height: 107px;background-image: url(images/CodeGenerator/Touch_sensor_BG.png);">
                                                                        <img src="images/CodeGenerator/KeyPad.png" draggable="true" ondragstart="drag(event)" id="touch_sensor2">
                                                                    </div>
                                                                </li>
                                                                <li><div class="iot_ports" id="touch_port" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-width: 104px; min-height: 107px;background-image: url(images/CodeGenerator/Touch_sensor_BG.png);">
                                                                        <img src="images/CodeGenerator/Touch_sensor.png" draggable="true" ondragstart="drag(event)" id="touch_sensor3">
                                                                    </div>
                                                                </li>
                                                                <li><div class="iot_ports" id="touch_port" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-width: 104px; min-height: 107px;background-image: url(images/CodeGenerator/Touch_sensor_BG.png);">
                                                                        <img src="images/CodeGenerator/WheelPad.png" draggable="true" ondragstart="drag(event)" id="touch_sensor4">
                                                                    </div>
                                                                </li>

                                                            </ul>
                                                        </li>

                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <!-- /MAIL LIST -->


                                <!-- CONTENT MAIL -->
                                <div class="col-sm-8 mail_view" >
                                    <div class="inbox-body">
                                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  action="/generator" method="post">
                                            {{ csrf_field() }}
                                        <div class="row x_title">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="control-label col-md-1 col-sm-1 col-xs-3" for="first-name">Name
                                                    </label>
                                                    <div class="col-md-6 col-sm-2 col-xs-3">
                                                        <input type="text" id="codegenname" name="codegenname" required class="form-control col-md-7 col-xs-12" data-parsley-id="3856">

                                                    </div>
                                                    <div class="col-md-4 col-sm-3 col-xs-6">
                                                    <select class="form-control" onchange="selectLang()" id="selectType">
                                                        <option>Arduino</option>
                                                        <option>Node.JS</option>
                                                    </select>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <button type="submit" class="btn btn-success" onclick="generateCode()"><i class="fa fa-reply"></i> Generate Code</button>
                                            </div>

                                        </div>
                                        <div id="data" style="display: none">
                                            <div class="form-group">
                                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Device</label>
                                                <div class="col-md-4 col-sm-9 col-xs-12">
                                                    <select class="form-control">
                                                        <option>Arduino</option>
                                                        <option>Node.JS</option>
                                                    </select>
                                                </div>
                                                <label class="control-label col-md-2 col-sm-3 col-xs-1">Template</label>
                                                <div class="col-md-4 col-sm-9 col-xs-12">
                                                    <select class="form-control">
                                                        <option>Arduino</option>
                                                        <option>Node.JS</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Data Group</label>
                                                <div class="col-md-4 col-sm-9 col-xs-12">
                                                    <select class="form-control">
                                                        <option>Arduino</option>
                                                        <option>Node.JS</option>
                                                    </select>
                                                </div>
                                                <label class="control-label col-md-2 col-sm-3 col-xs-1">Data Type</label>
                                                <div class="col-md-4 col-sm-9 col-xs-12">
                                                    <select class="form-control">
                                                        <option>Arduino</option>
                                                        <option>Node.JS</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                        <div class="sender-info">

                                            <div class="iot_ports_drop" id="lcd_port" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-width: 205px; min-height: 70px;background-image: url(images/CodeGenerator/LCD_BG.png);"></div>

                                        </div>
                                        <div class="sender-info">
                                            <div class="iot_ports_drop" id="buzzer_port" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-width: 104px; min-height: 107px;background-image: url(images/CodeGenerator/Buzzer_BG.png);"></div>
                                        </div>
                                        <div class="sender-info">
                                            <div class="iot_ports_drop" id="light_port" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-width: 104px; min-height: 107px;background-image: url(images/CodeGenerator/Light_sensor_BG.png);"></div>
                                        </div>

                                        <div class="attachment">
                                            <img src="images/CodeGenerator/Galileo.png">
                                        </div>
                                        <div class="sender-info">
                                            <div class="iot_ports_drop" id="sound_port" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-width: 104px; min-height: 107px;background-image: url(images/CodeGenerator/Sound_sensor_BG.png);"></div>
                                        </div>
                                        <div class="sender-info">
                                            <div class="iot_ports_drop" id="temp_port" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-width: 104px; min-height: 107px;background-image: url(images/CodeGenerator/Temperature_sensor_BG.png);"></div>
                                        </div>
                                        <div class="sender-info">
                                            <div class="iot_ports_drop" id="touch_port" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-width: 104px; min-height: 107px;background-image: url(images/CodeGenerator/Touch_sensor_BG.png);"></div>
                                        </div>
                                        <div class="compose-btn pull-left">
                                        </div>
                                    </div>

                                </div>
                                <!-- /CONTENT MAIL -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section("script")
<script>
    function selectLang() {
        var index = document.getElementById("selectType").selectedIndex;
        if(index == 1){
            document.getElementById("data").style.display = "inherit";
        }else{
            document.getElementById("data").style.display = "none";
        }
    }
    
    
    function generateCode() {
        var divs = document.getElementsByClassName("iot_ports_drop");
        var res = '';
        for(var i = 0; i<divs.length; i++){
            if(divs[i].hasChildNodes()){
                child = divs[i].childNodes[0].id;
                res = res+child.substring(child.length-1, child.length);
            }else{
                res = res+0
            }

        }
        //$().redirect('http://172.16.250.18:8000/generatedCode', {'res': res});
        $.get("/generatedCode",
            {
                name : $('#codegenname').val(),
                value : res
            },
            function(data, status){
            });
    }
</script>
@endsection