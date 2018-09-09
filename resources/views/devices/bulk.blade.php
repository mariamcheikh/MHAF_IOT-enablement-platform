@extends("index")
@section("head")
    <title>MHAF IOT |Bulk Device Upload</title>

    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>

@endsection

@section("body")
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h3>MHAF IOT <big> Bulk Device Upload</big></h3>
            <div class="x_panel">
                <div class="form-group">
               <div class="col-md-9 col-sm-9 col-xs-12">
                   <textarea  class="form-control" readonly="readonly" rows="10" placeholder="CSV file format
Please make sure to follow the below format when building the CSV file:
name,longitude,latitude,description,templates_id,status,last_time
where:  name : the name of the device defines the type of algorithm you want to choose for the activity monitoring (optional).
        longitude : the longitude of your device.
        latitude : the longitude of your device.
        description : description of the device or its function
        templates_id : The ID of the Template that has to be created in advance ( Be carefull !!! )
        status: True or False
        last_time: last time connected
"></textarea>
                   <br>
                   <div class="col-md-12 col-sm-12 col-xs-12">
                       <div class="x_panel">
                           <div class="x_title">
                               <h2>Upload CSV file</h2>
                               <ul class="nav navbar-right panel_toolbox">
                                   <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                   </li>
                                   <li class="dropdown">
                                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                       <ul class="dropdown-menu" role="menu">
                                           <li><a href="#">Settings 1</a>
                                           </li>
                                           <li><a href="#">Settings 2</a>
                                           </li>
                                       </ul>
                                   </li>
                                   <li><a class="close-link"><i class="fa fa-close"></i></a>
                                   </li>
                               </ul>
                               <div class="clearfix"></div>
                           </div>
                           <div class="x_content">

                               <p>Drag multiple files to the box below for multi upload or click to select files</p>
                               <form action="{{ URL::to('/UploadCSV') }}" class="dropzone" style="border: 3px solid #e5e5e5; height: 300px; "></form>
                           </div>
                           <div class="form-group">

                                   <button type="submit" class="btn btn-primary">Cancel</button>
                               <a  href="UploadCSV"><button class="btn btn-success" type="submit">Submit </button> </a>

                               </div>
                           </div>
                       </div>
                   </div>
        </div>
    </div>
    </div>
        </div>
@endsection
@section("script")

                <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
                <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
                <!-- icheck -->
                <script src="js/icheck/icheck.min.js"></script>

                <script src="js/custom.js"></script>
                <!-- dropzone -->
                <script src="js/dropzone/dropzone.js"></script>
                <!-- pace -->
                <script src="js/pace/pace.min.js"></script>

                <script src="//code.jquery.com/jquery.min.js"></script>
                @include('flashy::message')
@endsection