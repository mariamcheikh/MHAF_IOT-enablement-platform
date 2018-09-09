@extends("index")
@section("head")
    <title>MHAF IOT | Devices</title>

    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">

    <link href="js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

    <script src="js/jquery.min.js"></script>

@endsection

@section("body")
    <script src="js/connections/jquery.connections.js"></script>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Devices <small>List of created devices</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a href="{{ route('devices_add') }}"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Identifier</th>
                        <th>Name</th>
                        <th>Nodes</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($applications as $application)
                        <tr>
                            <td>{{ $application->id }}</td>
                            <td>{{ $application->name }}</td>
                            <td>5</td>
                            <td>
                                <a href="{{URL::to('/application_edit?id='.$application->id)}}">Edit</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section("script")
    <!-- Datatables-->
    <script src="js/datatables/jquery.dataTables.min.js"></script>
    <script src="js/datatables/dataTables.bootstrap.js"></script>
    <script src="js/datatables/dataTables.buttons.min.js"></script>
    <script src="js/datatables/buttons.bootstrap.min.js"></script>
    <script src="js/datatables/jszip.min.js"></script>
    <script src="js/datatables/pdfmake.min.js"></script>
    <script src="js/datatables/vfs_fonts.js"></script>
    <script src="js/datatables/buttons.html5.min.js"></script>
    <script src="js/datatables/buttons.print.min.js"></script>
    <script src="js/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="js/datatables/dataTables.keyTable.min.js"></script>
    <script src="js/datatables/dataTables.responsive.min.js"></script>
    <script src="js/datatables/responsive.bootstrap.min.js"></script>
    <script src="js/datatables/dataTables.scroller.min.js"></script>


    <!-- pace -->
    <script src="js/pace/pace.min.js"></script>
    <script>
        var handleDataTableButtons = function() {
                "use strict";
                0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                    dom: "Bfrtip",
                    buttons: [{
                        extend: "copy",
                        className: "btn-sm"
                    }, {
                        extend: "csv",
                        className: "btn-sm"
                    }, {
                        extend: "excel",
                        className: "btn-sm"
                    }, {
                        extend: "pdf",
                        className: "btn-sm"
                    }, {
                        extend: "print",
                        className: "btn-sm"
                    }],
                    responsive: !0
                })
            },
            TableManageButtons = function() {
                "use strict";
                return {
                    init: function() {
                        handleDataTableButtons()
                    }
                }
            }();
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
                keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable({
                ajax: "js/datatables/json/scroller-demo.json",
                deferRender: true,
                scrollY: 380,
                scrollCollapse: true,
                scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
                fixedHeader: true
            });
        });
        TableManageButtons.init();
    </script>
@endsection