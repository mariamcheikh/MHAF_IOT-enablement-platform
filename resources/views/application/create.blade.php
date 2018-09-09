@extends("index")
@section("head")
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section("body")

    <div class="x_panel">
        <div class="x_title">
            <h2>Design application</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            <div id="root">

            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>

@endsection

@section("script")

@endsection