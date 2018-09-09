@extends("index")
@section("head")
    <link rel="stylesheet" href="highlight/styles/default.css">
    <script src="highlight/highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
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

                            <div class="col-sm-3 mail_view">
                                @foreach($code_gens as $code_gen)
                                <div class="mail_list">
                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  action="/generator" method="post">
                                        {{ csrf_field() }}
                                    <div class="right">
                                        <div class="iot_ports" id="lcd_port" ondrop="drop(event)" ondragover="allowDrop(event)">
                                            <button type="submit" class="btn btn-default btn-lg" onclick="generateCode({{$code_gen['code_gen']}})" style="width: 100%;text-align: left">{{$code_gen['name']}}</button>

                                        </div>
                                    </div>
                                    </form>
                                </div>
                                @endforeach


                            </div>
                            <!-- /MAIL LIST -->
                            <a href="#" id="downloadLink">Download the inner html</a>

                            <!-- CONTENT MAIL -->
                            <div class="col-sm-9 mail_view">
                                <div class="inbox-body">
                                    <pre ><code id="code">{{$code}}</code></pre>
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
        function downloadInnerHtml(filename, elId, mimeType) {
            var elHtml = document.getElementById(elId).innerHTML;
            var link = document.createElement('a');
            mimeType = mimeType || 'text/plain';

            link.setAttribute('download', filename);
            link.setAttribute('href', 'data:' + mimeType  +  ';charset=utf-8,' + encodeURIComponent(elHtml));
            link.click();
        }

        var fileName =  'tags.ino';
        $('#downloadLink').click(function(){
            downloadInnerHtml(fileName, 'code','text/html');
        });
        function generateCode(code_gen) {
            //$().redirect('http://172.16.250.18:8000/generatedCode', {'res': res});
            $.get("/showGeneratedCode",
                {
                    value : code_gen
                },
                function(data, status){
                });
        }
    </script>
@endsection