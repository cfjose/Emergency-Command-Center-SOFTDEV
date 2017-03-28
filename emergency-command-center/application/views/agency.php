<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                        class="fa fa-user"></i> <?php echo $username; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/logout"><i class="fa fa-fw fa-power-off"></i> Log
                            Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="<?php echo base_url(); ?>index.php/main"><i class="fa fa-fw fa-dashboard"></i>
                        Dashboard</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/charts"><i class="fa fa-fw fa-bar-chart-o"></i>
                        Charts</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/tables"><i class="fa fa-fw fa-table"></i> Tables</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/agency"><i class="fa fa-fw fa-university"></i>
                        Agency</a>
                </li>
                <li>
                    <a href=""><i class="fa fa-user-plus"></i> Create Account</a>
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
                        Agency
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-bar-chart-o"></i> Agency
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <!-- Camp Coordination -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Camp Coordination and Camp Management</h2>
                    <p class="lead">Mission: To provide assistance and augment all requirements for the management and evacuation
                        of families affected by disasters</p>

                </div>
            </div>
            <!-- /.row -->


            <!-- Emergency Telecom-->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Emergency Telecom</h2>
                </div>
            </div>

            <!-- Food & Non-Food Items-->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Food & Non-Food Items</h2>
                </div>
            </div>


            <!-- Law and Order-->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Law and Order</h2>
                </div>
            </div>


            <!-- Logistics-->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Logistics</h2>
                </div>
            </div>

            <!-- Management of the Dead and the Missing-->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Management of the Dead and the Missing</h2>
                </div>
            </div>

            <!-- Logistics-->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Logistics</h2>
                </div>
            </div>

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
