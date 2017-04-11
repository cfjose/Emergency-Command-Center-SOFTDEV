<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $lastname = ($this->session->userdata['logged_in']['lastname']);
    $firstname = ($this->session->userdata['logged_in']['firstname']);
} else {
    header("location:" . base_url() . "index.php/login");
}
?><!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Emergency Command Center | Home</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo base_url(); ?>/charts/code/highcharts.js"></script>

    <!-- FusionCharts JavaScript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>fusioncharts/js/fusioncharts.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>fusioncharts/js/themes/fusioncharts.theme.fint.js"></script>

    <style>
        #map{
            height:400px;
        }
    </style>
</head>
<body>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Emergency Command Center</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $firstname . " " . $lastname; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="<?php echo base_url(); ?>index.php/main"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/charts"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/tables"><i class="fa fa-fw fa-table"></i> Tables</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/agency"><i class="fa fa-fw fa-university"></i> Agency</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/signup"><i class="fa fa-user-plus"></i> Create Account</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <!--<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <strong>CODE RED</strong>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </li>
                    </ol>
                </div>
            </div>-->
            <!-- /.row -->

            <?php
                // For 'DEAD AND MISSING' tile
                $query = $this->chartsData->totalCasualties();

                $dead = 0; $missing = 0; $injured = 0; $totalCasualties = 0; $affectedPerson = 0;

                foreach($query->result_array() as $row){
                    $dead += $row['dead'];
                    $missing += $row['missing'];
                    $injured += $row['injured'];
                }

                $totalCasualties = $dead + $missing + $injured;

                // For 'CAMP POPULATION' tile
                $query = $this->chartsData->getAffectedPopulation();

                foreach($query->result_array() as $affPopulation){
                    $affectedPerson += $affPopulation['aff_persons'];
                }


            ?>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cutlery fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>Food Delivered</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shield fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>Police Deployed</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-home fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $affectedPerson; ?></div>
                                    <div>Camp Population</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-question-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $totalCasualties; ?></div>
                                    <div>Dead & Missing</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Map</h3>
                        </div>
                        <div id="map"></div>
                        <?php
                            $link = mysqli_connect('localhost', 'root', '', 'camp-coor-mgmt-db');
                            $query = mysqli_query($link, "SELECT lat, lng FROM markers_camp") or die(mysqli_error($link));

                            $query_evac = mysqli_query($link, "SELECT lat, lng FROM markers_evac") or die(mysqli_error($link));
                        ?>
                        <script>
                            function initMap() {

                                var map = new google.maps.Map(document.getElementById('map'), {
                                    zoom: 6,
                                    center: {lat: 12.879721, lng: 121.774017},
                                });

                                // Create an array of alphabetical characters used to label the markers.
                                var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

                                // Add some markers to the map.
                                // Note: The code uses the JavaScript Array.prototype.map() method to
                                // create an array of markers based on a given "locations" array.
                                // The map() method here has nothing to do with the Google Maps API.
                                var markers = locations.map(function(location, i) {
                                    return new google.maps.Marker({
                                        position: location,
                                        label: labels[i % labels.length]
                                    });
                                });

                                // Add a marker clusterer to manage the markers.
                                var markerCluster = new MarkerClusterer(map, markers,
                                    {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

                                if (navigator.geolocation) {
                                    navigator.geolocation.getCurrentPosition(function(position) {
                                        var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                                        var mark = new google.maps.Marker({
                                            position: pos,
                                            map: map,
                                            text: "You are here"
                                        });

                                        mark.setMap(map);
                                    }, function() {
                                        handleLocationError(true, infoWindow, map.getCenter());
                                    });
                                } else {
                                    // Browser doesn't support Geolocation
                                    handleLocationError(false, infoWindow, map.getCenter());
                                }
                            }

                            var locations = [
                                <?php
                                    while($row=mysqli_fetch_assoc($query)){
                                        echo "{lat:" . $row['lat'] . ", lng:" . $row['lng'] . "},";
                                    }

                                    while($row=mysqli_fetch_assoc($query_evac)){
                                        echo "{lat:" . $row['lat'] . ", lng:" . $row['lng'] . "},";
                                    }
                                ?>
                            ]

                            var heatMapData = [
                                new google.maps.LatLng({lat:12.879721,lat:121.774017}),
                            ]

                            var heatmap = new google.maps.visualization.HeatmapLayer({
                                data: heatMapData,
                            });
                        </script>
                        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
                        </script>
                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtseegxTIuFftw6PIOEDoHAWz4r61w-r8&libraries=visualization&callback=initMap">
                        </script>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Casualties</h3>
                        </div>
                        <div id="totalCasualties"></div>
                        <?php
                            $dead = 0;
                            $missing = 0;
                            $injured = 0;

                            $casualty_type = array("Dead", "Missing", "Injured");

                            $query = $this->chartsData->totalCasualties();

                            foreach($query->result_array() as $row){
                                $dead += $row['dead'];
                                $missing += $row['missing'];
                                $injured += $row['injured'];
                            }
                        ?>
                        <script>
                            FusionCharts.ready(function(){
                                var casualtyChart = new FusionCharts({
                                    "type": "pie2d",
                                    "renderAt": "totalCasualties",
                                    "width": "500",
                                    "height": "400",
                                    "dataFormat": "json",
                                    "dataSource": {
                                        "chart": {
                                            "caption": "Total Number of Casualties",
                                            "subCaption": "(National)",
                                            "theme": "fint"
                                        },
                                        "data": [
                                            <?php
                                                $count = 0;

                                                while($count < count($casualty_type)){
                                                    $value = ($count == 0 ? $dead : ($count == 1 ? $missing : ($count == 2 ? $injured : "")));
                                                    echo '{"label": "' . $casualty_type[$count] . '", "value": ' . $value . '},';
                                                    $count++;
                                                }
                                            ?>
                                        ]
                                    }
                                });

                                casualtyChart.render();
                            })
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo base_url(); ?>js/plugins/morris/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>js/plugins/morris/morris.min.js"></script>
<script src="<?php echo base_url(); ?>js/plugins/morris/morris-data.js"></script>
</body>
</html>
