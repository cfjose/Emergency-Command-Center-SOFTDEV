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
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Emergency Command Center</title>

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

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $firstname . " " . $lastname; ?><b class="caret"></b></a>
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
                <li>
                    <a href="<?php echo base_url(); ?>index.php/main"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="active">
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
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Charts
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="main">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> Charts
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Flot Charts -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Data Statistics</h2>
                    </div>
                </div>
                <!-- /.row -->

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
                <!-- /.row -->
                <div id="missingPerRegion"></div>
                <?php
                    $query = $this->chartsData->casualtiesPerRegion();
                    $region_name = array();
                    $missing_num = array();

                    foreach($query->result_array() as $row){
                        $regionQuery = $this->chartsData->getRegions($row['affected-population_region_id']);

                        foreach($regionQuery->result_array() as $region){
                            $region_name[] = $region['name'];
                        }

                        $missing_num[] = $row['missing'];
                        $dead_num[] = $row['dead'];
                        $injured_num[] = $row['injured'];

                    }
                ?>
                <script>
                    FusionCharts.ready(function(){
                        var missingChart = new FusionCharts({
                            "type": "column2d",
                            "renderAt": "missingPerRegion",
                            "width": "500",
                            "height": "400",
                            "dataFormat": "json",
                            "dataSource": {
                                "chart": {
                                    "caption": "Number of Missing Persons",
                                    "subCaption": "(Regional)",
                                    "xAxisName": "Region",
                                    "yAxisName": "Number of Missing",
                                    "theme": "fint"
                                },
                                "data": [
                                    <?php
                                        $count = 0;

                                        while($count < count($region_name) && $count < count($missing_num)){
                                            echo '{"label": "' . $region_name[$count] . '", "value": "' . $missing_num[$count] . '"},';
                                            $count++;
                                        }
                                    ?>
                                ]
                            }
                        });

                        missingChart.render();
                    })
                </script>

                <div id="deadPerRegion"></div>

                <script>
                    FusionCharts.ready(function(){
                        var deadChart = new FusionCharts({
                            "type": "line",
                            "renderAt": "deadPerRegion",
                            "width": "500",
                            "height": "400",
                            "dataFormat": "json",
                            "dataSource": {
                                "chart": {
                                    "caption": "Number of Dead Persons",
                                    "subCaption": "(Regional)",
                                    "xAxisName": "Region",
                                    "yAxisName": "Number of Dead",
                                    "theme": "fint"
                                },
                                "data": [
                                    <?php
                                        $count = 0;

                                        while($count < count($region_name) && $count < count($dead_num)){
                                            echo '{"label": "' . $region_name[$count] . '", "value": "' . $dead_num[$count] . '"},';
                                            $count++;
                                        }
                                    ?>
                                ]
                            }
                        });

                        deadChart.render();
                    })
                </script>

                <div id="injuredPerRegion"></div>

                <script>
                    FusionCharts.ready(function(){
                        var injuredChart = new FusionCharts({
                            "type": "bar2d",
                            "renderAt": "injuredPerRegion",
                            "width": "500",
                            "height": "400",
                            "dataFormat": "json",
                            "dataSource": {
                                "chart": {
                                    "caption": "Number of Injured Persons",
                                    "subCaption": "(Regional)",
                                    "xAxisName": "Region",
                                    "yAxisName": "Number of Injured",
                                    "theme": "fint"
                                },
                                "data": [
                                    <?php
                                        $count = 0;

                                        while($count < count($region_name) && $count < count($injured_num)){
                                            echo '{"label": "' . $region_name[$count] . '", "value": "' . $injured_num[$count] . '"},';
                                            $count++;
                                        }
                                    ?>
                                ]
                            }
                        });

                        injuredChart.render();
                    })
                </script>

                <div id="affProvPerRegion"></div>
                <?php
                    $query = $this->chartsData->getAffectedPopulation();

                    $regName = array();
                    $prov_num = array();
                    $brgy_num = array();

                    foreach($query->result_array() as $row){
                        $region = $this->chartsData->getRegions($row['region_id']);

                        foreach($region->result_array() as $regions){
                            $regName[] = $regions['name'];
                        }

                        $prov_num[] = $row['aff_province'];
                        $brgy_num[] = $row['aff_barangay'];
                        $person_num[] = $row['aff_persons'];
                        $family_num[] = $row['aff_family'];
                    }
                ?>
                <script>
                    FusionCharts.ready(function(){
                        var affProvChart = new FusionCharts({
                            "type": "column2d",
                            "renderAt": "affProvPerRegion",
                            "width": "500",
                            "height": "400",
                            "dataFormat": "json",
                            "dataSource": {
                                "chart": {
                                    "caption": "Number of Affected Provinces",
                                    "subCaption": "(Regional)",
                                    "xAxisName": "Region",
                                    "yAxisName": "Number of Affected Provinces",
                                    "theme": "fint"
                                },
                                "data": [
                                    <?php
                                    $count = 0;

                                    while($count < count($regName) && $count < count($prov_num)){
                                        echo '{"label": "' . $regName[$count] . '", "value": "' . $prov_num[$count] . '"},';
                                        $count++;
                                    }
                                    ?>
                                ]
                            }
                        });

                        affProvChart.render();
                    })
                </script>

                <div id="affBrgyPerRegion"></div>

                <script>
                    FusionCharts.ready(function(){
                        var affBrgyChart = new FusionCharts({
                            "type": "bar2d",
                            "renderAt": "affBrgyPerRegion",
                            "width": "500",
                            "height": "400",
                            "dataFormat": "json",
                            "dataSource": {
                                "chart": {
                                    "caption": "Number of Affected Barangays",
                                    "subCaption": "(Regional)",
                                    "xAxisName": "Region",
                                    "yAxisName": "Number of Affected Barangays",
                                    "theme": "fint"
                                },
                                "data": [
                                    <?php
                                    $count = 0;

                                    while($count < count($regName) && $count < count($brgy_num)){
                                        echo '{"label": "' . $regName[$count] . '", "value": "' . $brgy_num[$count] . '"},';
                                        $count++;
                                    }
                                    ?>
                                ]
                            }
                        });

                        affBrgyChart.render();
                    })
                </script>

                <div id="affPersonPerRegion"></div>

                <script>
                    FusionCharts.ready(function(){
                        var affPersonChart = new FusionCharts({
                            "type": "line",
                            "renderAt": "affPersonPerRegion",
                            "width": "500",
                            "height": "400",
                            "dataFormat": "json",
                            "dataSource": {
                                "chart": {
                                    "caption": "Number of Affected Persons",
                                    "subCaption": "(Regional)",
                                    "xAxisName": "Region",
                                    "yAxisName": "Number of Affected Persons",
                                    "theme": "fint"
                                },
                                "data": [
                                    <?php
                                    $count = 0;

                                    while($count < count($regName) && $count < count($person_num)){
                                        echo '{"label": "' . $regName[$count] . '", "value": "' . $person_num[$count] . '"},';
                                        $count++;
                                    }
                                    ?>
                                ]
                            }
                        });

                        affPersonChart.render();
                    })
                </script>

                <div id="affFamilyPerRegion"></div>
                <script>
                    FusionCharts.ready(function(){
                        var affFamilyChart = new FusionCharts({
                            "type": "doughnut2d",
                            "renderAt": "affFamilyPerRegion",
                            "width": "500",
                            "height": "400",
                            "dataFormat": "json",
                            "dataSource": {
                                "chart": {
                                    "caption": "Number of Affected Families",
                                    "subCaption": "(Regional)",
                                    "xAxisName": "Region",
                                    "yAxisName": "Number of Affected Families",
                                    "theme": "fint"
                                },
                                "data": [
                                    <?php
                                    $count = 0;

                                    while($count < count($regName) && $count < count($family_num)){
                                        echo '{"label": "' . $regName[$count] . '", "value": "' . $family_num[$count] . '"},';
                                        $count++;
                                    }
                                    ?>
                                ]
                            }
                        });

                        affFamilyChart.render();
                    })
                </script>

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


</body>

</html>
