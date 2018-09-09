@extends("index")
@section("head")
@endsection
@section("body")
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                    <h2>Add an AccessControlList <small>  </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i> </a>
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



                <form  data-parsley-validate class="form-horizontal form-label-left" action="{{ URL::to('/insertaccessList') }}"  method="get">
                    <div class="x_content">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="data_type_name"> Application Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="application_name" class="form-control col-md-7 col-xs-12" name="application_name" placeholder="Enter the application Name " required="required" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Unit" class="control-label col-md-3 col-sm-3 col-xs-12">  Application Description</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="application_description"  name="application_description"  class="form-control col-md-7 col-xs-12" placeholder="Enter the application Description "  type="text" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Type" class="control-label col-md-3 col-sm-3 col-xs-12">  Password <span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" placeholder="Enter Password " id="password"  name="password" required="required" type="password" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Device Template List</label>
                            <div class="col-md-6 col-sm-6 col-xs-12" style="padding-right: 0px">
                                <select  class="select2_group form-control"  name="device_template">
                                    @foreach($templates as $t)
                                        <option value="{{$t->_id}}">{{$t->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>




                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Datagroup list</label>
                            <div class="col-md-6 col-sm-6 col-xs-12" style="padding-right: 0px">
                                <select  class="select2_group form-control"  name="Datagroups">
                                    @foreach($datagrps as $g)
                                        <option value="{{$g->_id}}">{{$g->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">DataTypes List</label>
                            <div class="col-md-6 col-sm-6 col-xs-12" style="padding-right: 0px">
                                <select  class="select2_group form-control"  name="datatype">
                                    @foreach($dataTypes as $data)
                                        <option value="{{$data->_id}}"> {{$data->data_type_name}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Devices  List</label>
                            <div class="col-md-6 col-sm-6 col-xs-12" style="padding-right: 0px">
                                <select  class="select2_group form-control"  name="device_name">
                                    @foreach($devices as $g)
                                        <option value="{{$g->_id}}">{{$g->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >ACCESS TYPE <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="accesstype"  class="form-control col-md-7 col-xs-12" placeholder="Access "  name="accesstype" required="required" type="text" >
                                    <option>Select</option>
                                    <option value="Read">Read</option>
                                    <option value="Read,Write">Read,Write</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Cancel</button>
                                <button id="send" type="submit" class="btn btn-success">Add ACL</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- footer content -->
    <footer>
        <div class="copyright-info">
            <p class="pull-right">Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </p>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->


@endsection

@section("script")
    <script src="//code.jquery.com/jquery.min.js"></script>
    @include('flashy::message')
@endsection