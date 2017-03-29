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

</head>
<style>
    .timeline {
        position: relative;
        padding: 4px 0 0 0;
        margin-top: 22px;
        list-style: none;
    }

    .timeline > li:nth-child(even) {
        position: relative;
        margin-bottom: 50px;
        height: 180px;
        right: -100px;
    }

    .timeline > li:nth-child(odd) {
        position: relative;
        margin-bottom: 50px;
        height: 180px;
        left: -100px;
    }

    .timeline > li:before,
    .timeline > li:after {
        content: " ";
        display: table;
    }

    .timeline > li:after {
        clear: both;
        min-height: 170px;
    }

    .timeline > li .timeline-panel {
        position: relative;
        float: left;
        width: 41%;
        padding: 0 20px 20px 30px;
        text-align: right;
    }

    .timeline > li .timeline-panel:before {
        right: auto;
        left: -15px;
        border-right-width: 15px;
        border-left-width: 0;
    }

    .timeline > li .timeline-panel:after {
        right: auto;
        left: -14px;
        border-right-width: 14px;
        border-left-width: 0;
    }

    .timeline > li .timeline-image {
        z-index: 100;
        position: absolute;
        left: 50%;
        border: 7px solid #3b5998;
        border-radius: 100%;
        background-color: #3b5998;
        box-shadow: 0 0 5px #4582ec;
        width: 200px;
        height: 200px;
        margin-left: -100px;
    }

    .timeline > li .timeline-image h4 {
        margin-top: 12px;
        font-size: 10px;
        line-height: 14px;
    }

    .timeline > li.timeline-inverted > .timeline-panel {
        float: right;
        padding: 0 30px 20px 20px;
        text-align: left;
    }

    .timeline > li.timeline-inverted > .timeline-panel:before {
        right: auto;
        left: -15px;
        border-right-width: 15px;
        border-left-width: 0;
    }

    .timeline > li.timeline-inverted > .timeline-panel:after {
        right: auto;
        left: -14px;
        border-right-width: 14px;
        border-left-width: 0;
    }

    .timeline > li:last-child {
        margin-bottom: 0;
    }

    .timeline .timeline-heading h4 {
        margin-top: 22px;
        margin-bottom: 4px;
        padding: 0;
        color: #2b542c;
    }

    .timeline .timeline-heading h4.subheading {
        margin: 0;
        padding: 0;
        text-transform: none;
        font-size: 18px;
        color: #333333;
    }

    .timeline .timeline-body > p,
    .timeline .timeline-body > ul {
        margin-bottom: 0;
        color: #808080;
    }

    /*Style for even div.line*/
    .timeline > li:nth-child(odd) .line:before {
        content: "";
        position: absolute;
        top: 60px;
        bottom: 0;
        left: 690px;
        width: 4px;
        height: 340px;
        background-color: #3b5998;
        -ms-transform: rotate(-44deg); /* IE 9 */
        -webkit-transform: rotate(-44deg); /* Safari */
        transform: rotate(-44deg);
        box-shadow: 0 0 5px #4582ec;
    }

    /*Style for odd div.line*/
    .timeline > li:nth-child(even) .line:before {
        content: "";
        position: absolute;
        top: 60px;
        bottom: 0;
        left: 450px;
        width: 4px;
        height: 340px;
        background-color: #3b5998;
        -ms-transform: rotate(44deg); /* IE 9 */
        -webkit-transform: rotate(44deg); /* Safari */
        transform: rotate(44deg);
        box-shadow: 0 0 5px #4582ec;
    }

    /* Medium Devices, .visible-md-* */
    @media (min-width: 992px) and (max-width: 1199px) {
        .timeline > li:nth-child(even) {
            margin-bottom: 0px;
            min-height: 0px;
            right: 0px;
        }

        .timeline > li:nth-child(odd) {
            margin-bottom: 0px;
            min-height: 0px;
            left: 0px;
        }

        .timeline > li:nth-child(even) .timeline-image {
            left: 0;
            margin-left: 0px;
        }

        .timeline > li:nth-child(odd) .timeline-image {
            left: 690px;
            margin-left: 0px;
        }

        .timeline > li:nth-child(even) .timeline-panel {
            width: 76%;
            padding: 0 0 20px 0px;
            text-align: left;
        }

        .timeline > li:nth-child(odd) .timeline-panel {
            width: 70%;
            padding: 0 0 20px 0px;
            text-align: right;
        }

        .timeline > li .line {
            display: none;
        }
    }

    /* Small Devices, Tablets */
    @media (min-width: 768px) and (max-width: 991px) {
        .timeline > li:nth-child(even) {
            margin-bottom: 0px;
            min-height: 0px;
            right: 0px;
        }

        .timeline > li:nth-child(odd) {
            margin-bottom: 0px;
            min-height: 0px;
            left: 0px;
        }

        .timeline > li:nth-child(even) .timeline-image {
            left: 0;
            margin-left: 0px;
        }

        .timeline > li:nth-child(odd) .timeline-image {
            left: 520px;
            margin-left: 0px;
        }

        .timeline > li:nth-child(even) .timeline-panel {
            width: 70%;
            padding: 0 0 20px 0px;
            text-align: left;
        }

        .timeline > li:nth-child(odd) .timeline-panel {
            width: 70%;
            padding: 0 0 20px 0px;
            text-align: right;
        }

        .timeline > li .line {
            display: none;
        }
    }

    /* Custom, iPhone Retina */
    @media only screen and (max-width: 767px) {
        .timeline > li:nth-child(even) {
            margin-bottom: 0px;
            min-height: 0px;
            right: 0px;
        }

        .timeline > li:nth-child(odd) {
            margin-bottom: 0px;
            min-height: 0px;
            left: 0px;
        }

        .timeline > li .timeline-image {
            position: static;
            width: 150px;
            height: 150px;
            margin-bottom: 0px;
        }

        .timeline > li:nth-child(even) .timeline-image {
            left: 0;
            margin-left: 0;
        }

        .timeline > li:nth-child(odd) .timeline-image {
            float: right;
            left: 0px;
            margin-left: 0;
        }

        .timeline > li:nth-child(even) .timeline-panel {
            width: 100%;
            padding: 0 0 20px 14px;
        }

        .timeline > li:nth-child(odd) .timeline-panel {
            width: 100%;
            padding: 0 14px 20px 0px;
        }

        .timeline > li .line {
            display: none;
        }
    }
</style>

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
                        class="fa fa-user"></i><?php echo $firstname . " " . $lastname; ?><b class="caret"></b></a>
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
                <li>
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
                <li class="active">
                    <a href="<?php echo base_url(); ?>index.php/agency"><i class="fa fa-fw fa-university"></i>
                        Agency</a>
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
                        Agency
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="main">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-fw fa-university"></i> Agency
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <!-- AGENCY -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center">GOVERNMENT AGENCIES</h2>
                    <p>
                    </p>
                    <br>
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" style="background-color: #00a651"  src="<?php echo base_url(); ?>res/camp.png"
                                     width="100%">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading" style="margin-left: 25%">
                                    <h4>CAMP COORDINATION AND CAMP MANAGEMENT</h4>
                                    <h5 class="subheading">DEPARTMENT OF SOCIAL WELFARE AND DEVELOPMENT</h5>
                                </div>
                                <div class="c">
                                    <p class="text-muted" style="margin-left: 25%">
                                        MEMBER AGENCIES: DFA, OCD, DILG, DOH, MMDA, REACT, NBI, PRC, PNP, BFP, DPWH,
                                        DFA, PCG, IFRC, ICRC, UNDAC and Private / Volunteer Groups
                                    </p>
                                </div>
                            </div>
                            <div class="line"></div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" style="background-color: #ac2925" src="<?php echo base_url(); ?>res/ecc.png"
                                     width="100%">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading" style="margin-right: 25%">
                                    <h4>EMERGENCY TELECOM</h4>
                                    <h5 class="subheading">OFFICE OF CIVIL DEFENSE</h5>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted " style="margin-right: 25%">
                                        MEMBER AGENCIES: DILG, DSWD, DOH, NTC, AFP, BFP, PCG, PNP, PRC and Private /
                                        Volunteer Groups
                                    </p>
                                </div>
                            </div>
                            <div class="line"></div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" style="background-color: #5a0099" src="<?php echo base_url(); ?>res/food.png"
                                     width="100%">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading" style="margin-left: 25%">
                                    <h4>FOOD & NON-FOOD ITEMS</h4>
                                    <h5 class="subheading">DEPARTMENT OF SOCIAL WELFARE AND DEVELOPMENT</h5>
                                </div>
                                <div class="c">
                                    <p class="text-muted" style="margin-left: 25%">
                                        MEMBER AGENCIES: DepEd, DPWH, DA, DILG, DOH-HEMS, OCD, PRC, NFA, AFP, PNP, NHA,
                                        BFP, WFP, World Vision, IOM, FAO, ADRA, and other organizations acknowledged by
                                        NDRRMC
                                    </p>
                                </div>
                            </div>
                            <div class="line"></div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" style="background-color: black " src="<?php echo base_url(); ?>res/law.png"
                                     width="100%">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading" style="margin-right: 25%">
                                    <h4>LAW AND ORDER</h4>
                                    <h5 class="subheading">PHILIPPINE NATIONAL POLICE</h5>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted " style="margin-right: 25%">
                                        MEMBER AGENCIES: AFP,DFA, OCD, DILG, DOH, MMDA, REACT, NBI, PRC, PNP, BFP, DPWH,
                                        PCG, IFRC, ICRC, UNDAC and Private / Volunteer Groups
                                    </p>
                                </div>
                            </div>
                            <div class="line"></div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" style="background-color: #d58512" src="<?php echo base_url(); ?>res/logistics.png"
                                     width="100%">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading" style="margin-left: 25%">
                                    <h4>LOGISTICS</h4>
                                    <h5 class="subheading">OFFICE OF CIVIL DEFENSE</h5>
                                </div>
                                <div class="c">
                                    <p class="text-muted" style="margin-left: 25%">
                                        MEMBER AGENCIES: DFA, DPWH, AFP, DOTC, DILG, DSWD, BFP, PCG, PPA, PNP, CAAP,
                                        MIAA, WFP and Private / Volunteers Groups
                                    </p>
                                </div>
                            </div>
                            <div class="line"></div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" style="background-color: #009900 " src="<?php echo base_url(); ?>res/dead.png"
                                     width="100%">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading" style="margin-right: 25%">
                                    <h4>MANAGEMENT OF THE DEAD AND THE MISSING</h4>
                                    <h5 class="subheading">DEPARTMENT OF INTERIOR AND LOCAL GOVERNMENT</h5>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted " style="margin-right: 25%">
                                        MEMBER AGENCIES: OCD, DSWD, DILG, DOH, MMDA, NBI, PRC, PNP, BFP, AFP, DPWH, DFA,
                                        PCG, MGB, IFRC, ICRC, and Private / Volunteer Groups
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /AGENCY -->

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
