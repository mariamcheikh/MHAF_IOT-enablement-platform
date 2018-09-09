@extends("index")
@section("head")
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .draggable {
            position: absolute;
            z-index: 9;
            background-color: #f1f1f1;
            text-align: center;
            border: 1px solid #d3d3d3;
            width: 150px;
            display:block;
            overflow:auto;
        }

        .draggable_header {
            padding: 10px;
            cursor: move;
            z-index: 10;
            background-color: #2196F3;
            color: #fff;
        }

        #draggable_area {
            border:1px solid black;
            position: inherit;
        }
    </style>

    <script src="js/connections/jquery.connections.js"></script>
    <script>

        setInterval(function()
        {
            var connections = $('.draggable');
            connections.connections('update')
        }, 16);
    </script>
@endsection

@section("body")

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content" style="height: 100px">

                <div class="x_title">
                    <h2>Create new block</h2>
                    <div class="clearfix"></div>
                </div>

                Choose type:
                <select id="block_type">
                    <option value="condition">Condition</option>
                    <option value="action">Action</option>
                </select>

                <button type="submit" class="btn btn-success" onclick="generateBlock()">Create</button>
                <button type="submit" class="btn btn-success" onclick="generateCode('{{$application->_id}}')">Generate</button>

            </div>
        </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content" id="block_content" style="height: 400px">

            </div>
        </div>
    </div>

@endsection

@section("script")
    <script>
        var blocks = 0;
        var connectionElem = null;

        // Find all draggables
        var elements = document.getElementsByClassName("draggable");
        // Allow them to be dragged
        for (var i = 0; i < elements.length; i++) {
            dragElement(elements[i]);
        }

        function dragElement(element)
        {
            var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
            // Find the header
            var header = element.getElementsByClassName("draggable_header");
            // Set on mouse click event
            header[0].onmousedown = dragMouseDown;

            function dragMouseDown(e) {
                e = e || window.event;
                // get the mouse cursor position at startup:
                pos3 = e.clientX;
                pos4 = e.clientY;
                document.onmouseup = closeDragElement;
                // call a function whenever the cursor moves:
                document.onmousemove = elementDrag;
            }

            function elementDrag(e) {
                e = e || window.event;
                // calculate the new cursor position:
                pos1 = pos3 - e.clientX;
                pos2 = pos4 - e.clientY;
                pos3 = e.clientX;
                pos4 = e.clientY;
                // set the element's new position:
                element.style.top = (element.offsetTop - pos2) + "px";
                element.style.left = (element.offsetLeft - pos1) + "px";
            }

            function closeDragElement() {
                /* stop moving when mouse button is released:*/
                document.onmouseup = null;
                document.onmousemove = null;
            }
        }

        function generateBlock()
        {
            var block_type = document.getElementById("block_type");
            createBlock(block_type.selectedIndex);
        }

        function createBlock(type)
        {
            var block_content = document.getElementById("block_content");
            var id = "draggable" + blocks;
            if(type == 0) {
                block_content.innerHTML += " <div class=\"draggable\" id=" + id + "> " +
                    "<div class=\"draggable_header\">Condition</div> " +
                    "<div id=\"draggable_body\">" +
                    "<p style=\"margin-top: 10px\"></p>" +
                    "Condition: <br /> " +
                    "<select id=\"condition\"> " +
                    "<option>==</option> " +
                    "<option>!=</option> " +
                    "<option>>=</option> " +
                    "<option><=</option> " +
                    "<option>></option> " +
                    "<option><</option> " +
                    "</select> " +
                    "<br /> " +
                    "<br />" +
                    "Value:<br /> " +
                    "<input type=\"text\" id=\"cond_value\" class=\"form-control col-md-7 col-xs-12\" style=\"width: 140px; height: 22px; margin: 5px\" /> " +
                    "</div> " +
                    "<div style=\"margin-top: 40px; background-color: #2196F3; color: #fff; cursor: move;\" onclick=\"onConnection(" + blocks + ")\">Connect</div> " +
                    "</div>";
            }
            else if(type == 1)
            {
                block_content.innerHTML += " <div class=\"draggable\" id=" + id + "> " +
                    "<div class=\"draggable_header\">Action</div> " +
                    "<div id=\"draggable_body\" >" +
                    "<p style=\"margin-top: 10px\">" +
                    "</p>Action: <br /> " +
                    "<select id=\"action\"> " +
                    "<option>Send mail</option> " +
                    "<option>Send SMS</option> " +
                    "<option>Message</option> " +
                    "</select> " +
                    "<br /> " +
                    "<input type=\"text\" id=\"message\" class=\"form-control col-md-7 col-xs-12\" style=\"width: 140px; height: 22px; margin: 5px\" /> " +
                    "<br />" +
                    "</div> " +
                    "<div style=\"margin-top: 40px; background-color: #2196F3; color: #fff; cursor: move;\" onclick=\"onConnection(" + blocks + ")\">Connect</div> " +
                    "</div>";
            }
            blocks++;
            // Create its line
            /* block_content.innerHTML += "<svg width=\"500\" height=\"500\">" +
             "<line x1=\"50\" y1=\"50\" x2=\"350\" y2=\"350\" stroke=\"black\"/>" +
             "</svg>";*/



            // Find all draggables
            var elements = document.getElementsByClassName("draggable");
            // Allow them to be dragged
            for (var i = 0; i < elements.length; i++) {
                dragElement(elements[i]);
            }
        }

        function generateCode(id)
        {
            // Find all draggables
            var elements = document.getElementsByClassName("draggable");
            var elementsArray = new Array();
            var header = new Object();
            header.id = id;

            elementsArray.push(header);
            // Allow them to be dragged
            for (var i = 0; i < elements.length; i++)
            {
                // Get header
                var name = elements[i].firstElementChild.innerText;
                if(name == "Condition")
                {
                    var condition_index = elements[i].querySelector("#condition").selectedIndex;
                    var condition_value = elements[i].querySelector("#cond_value").value;

                    var json = new Object();
                    json.type = 0;
                    json.condition = condition_index;
                    json.value = condition_value;

                    elementsArray.push(json);
                }
                else
                {
                    var condition_index = elements[i].querySelector("#action").selectedIndex;

                    var json = new Object();
                    json.type = 1;
                    json.action = condition_index;
                    if(condition_index == 2)
                        json.message = elements[i].querySelector("#message").value;

                    elementsArray.push(json);
                }
            }

            var json_text = JSON.stringify(elementsArray);

            alert(json_text);
            var xhr = new XMLHttpRequest();
            var url = "application_finish";
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-type", "application/json");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    alert(xhr.responseText);
                }
            };
            xhr.send(json_text);
        }

        function onConnection(element_id)
        {
            if(connectionElem == null)
                connectionElem = "#draggable" + element_id;
            else
            {
                $(connectionElem).connections({ to: '#draggable' + element_id });
                connectionElem = null;
            }
        }

        @foreach($application->blocks as $block)
            createBlock({{$block["type"]}});
        @endforeach

            for(var i = 0; i < blocks - 1; i++)
                $("#draggable" + i).connections({ to: '#draggable' + (i + 1) });

        </script>
@endsection