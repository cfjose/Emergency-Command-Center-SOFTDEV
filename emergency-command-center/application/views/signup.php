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
                <li>
                    <a href="<?php echo base_url(); ?>index.php/charts"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/tables"><i class="fa fa-fw fa-table"></i> Tables</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/agency"><i class="fa fa-fw fa-university"></i> Agency</a>
                </li>
                <li class="active">
                    <a href="<?php echo base_url(); ?>index.php/signup"><i class="fa fa-user-plus"></i> Create Account</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
        <div id="page-wrapper">

            <div class="container-fluid">
                <!--<h2>Create User Account</h2><hr/><br/>-->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Create User Account
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="main">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user-plus"></i> Create Account
                            </li>
                        </ol>
                    </div>
                </div>

                <form action="" method="POST">
                    <h3>Personal Information</h3><hr/>
                    <input type="text" name="lastname" placeholder="Last Name" required="required"class="form-control"/><br/><br/>
                    <input type="text" name="firstname" placeholder="First Name" required="required" class="form-control"/><br/><br/>

                    <h3>Contact Information</h3><hr/>
                    <input type="email" name="email" placeholder="e.g. jsdelacruz@example.com" required="required" class="form-control"/><br/><br/>
                    <input type="text" name="mobile-num" placeholder="Mobile Number" class="form-control"/><br/><br/>

                    <h3>Login Credentials</h3><hr/>
                    <input type="text" name="username" placeholder="Username" required="required" class="form-control"/><br/><br/>
                    <input type="password" name="password" placeholder="**********" required="required" class="form-control"/><br/><br/>

                    <input type="submit" name="btn_submit" value="SUBMIT" class="btn btn-success"/><br/><br/>

                    <?php
                    $this->load->library('form_validation');

                    if(isset($_POST['btn_submit'])){
                        $data = array('lastname' => $_POST['lastname'],
                            'firstname' => $_POST['firstname'],
                            'email' => $_POST['email'],
                            'mobile_num' => $_POST['mobile-num'],
                            'username' => $_POST['username'],
                            'password' => MD5($_POST['password']));

                        $this->user->signup($data);
                        redirect('main');
                    }
                    ?>
                </form>
            </div>

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
