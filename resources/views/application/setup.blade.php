@extends("index")
@section("head")
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="style.min.css" rel="stylesheet" type="text/css">

@endsection

@section("body")
    <div class="x_panel">
        <div class="x_title">
            <h2>Create application <small>Create a new application</small></h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">

            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route("application_create") }}">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Data Type</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control" name="datatype">
                            @foreach($datatypes as $datatype)
                                <option value="{{ $datatype->_id }}">{{ $datatype->data_type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection

@section("script")

@endsection