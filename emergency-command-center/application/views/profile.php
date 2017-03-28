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
    <title>Profile Setting</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://localhost/restaurant_locator_system/css/template.css" type="text/css" media="all">
	        <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://localhost/restaurant_locator_system/css/calendar.css" type="text/css" media="all">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://localhost/restaurant_locator_system/js/user.js"></script>
    <style type="text/css">
body {
  background: 	#ff9999
}

/* Profile container */
.profile {
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #fff;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 50%;
  height: 50%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}

.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 460px;
}
h2{
font-size: 30px;
margin-left:25px;
padding-bottom: 10px;

}

input[type="text"], input[type="password"], .input-append .add-on{
  height:30px;
}

    </style>
</head>
<body>
<div class="container">
<!-- Profile Setting: Left Side -->
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<div class="profile-userpic">
					<img src="http://localhost/restaurant_locator_system/res/images/user.png" class="img-responsive" alt="">
				</div>
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
                        <?php echo $firstname . " " . $lastname . "<br/><br/>";?>
						<button type="button" class="btn btn-success btn-sm">Upload Picture</button>
					</div>
							
				</div>

				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Profile </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Profile Settings </a>
						</li>

				</div>
				<!-- END MENU -->
			</div>
		</div>
		<!-- Profile Setting: Right Side -->
		<div class="col-md-9">
            <div class="profile-content">
                <div class="row">
                    <h2> Profile Setting </h2>
                        <form class="form-horizontal" method="post">
                            <fieldset>
                            <!-- Edit user info -->
                                <div class="control-group">
                                    <label class="control-label">Username</label>
                                    <div class="controls">
                                    <form action=user.php method="get">
                                        <input id="username" name="uname" type="text" placeholder="Username"
                                        class="input-xlarge">
                                        </form>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                                    <div class="control-group">
                                        <label class="control-label">Email Address</label>
                                        <div class="controls">
                                        <form action=email.php method="get">
                                            <input id="email" name="eaddress" type="text" placeholder="e.g. user@example.com"
                                            class="input-xlarge">
                                            </form>
                                            <p class="help-block"></p>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Password</label>
                                    <div class="controls">
                                    <form action=password.php method="get">
                                        <input id="password" name="passwd" type="password" placeholder="**********"
                                        class="input-xlarge">
                                        </form>
                                        <p class="help-block"></p>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">First Name</label>
                                    <div class="controls">
                                    <form action=fname.php method="get">
                                        <input id="first-name" name="first-name" type="text" placeholder="First Name"
                                        class="input-xlarge">
                                        </form>
                                        <p class="help-block"></p>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Last Name</label>
                                    <div class="controls">
                                    <form action=lname.php method="get">
                                        <input id="last-name" name="last-name" type="text" placeholder="Last Name"
                                        class="input-xlarge">
                                        </form>
                                        <p class="help-block"></p>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="selectbasic">Gender</label>
                                <div class="controls">
                                <select id="selectbasic" name="selectbasic" class="input-xlarge">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                    </div>
                                </div><br/>

                                <div class="control-group">
                                    <label class="control-label">Date of Birth</label>
                                    <div class="controls">
                                        <div data-date-format="dd-mm-yyyy" data-date="12-02-2012" id="dp3" class="input-append date">
                                            <form action=date.php method="get">
                                            <input type="text" readonly="" value="12-02-2012" size="16" class="span2" name="bdate">
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">City</label>
                                    <div class="controls">
                                        <select id="country" name="city" class="input-xlarge">
                                            <?php
                                                $link = mysqli_connect("localhost", "root", "", "rls_db");
                                                $queryCity = "SELECT location FROM branch ORDER BY location ASC";
                                                $resultCity = mysqli_query($link, $queryCity);

                                                while($city = mysqli_fetch_assoc($resultCity)){
                                                  echo "<option value='".$city['location']."'>" . $city['location'] . " City </option>";
                                                }
                                             ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label"></label>
                                    <div class="controls">
                                        <button class="btn btn-primary" name="btn_save"> Save Changes </button>
                                        <button class="btn btn-danger" onclick="window.location='<?php echo base_url(); ?>index.php/main'"> Cancel </button>
                                        <p class="help-block"></p>
                                    </div>
                            </fieldset>
                        </form>

                        <?php
                        if(isset($_POST['btn_save'])){
                            $username = $_POST['uname'];
                            $email = $_POST['eaddress'];
                            $password = $_POST['passwd'];
                            $first = $_POST['first-name'];
                            $last = $_POST['last-name'];
                            $gender = $_POST['selectbasic'];
                            $bday = $_POST['bdate'];
                            $city = $_POST['city'];

                            $queryUpdate = "UPDATE user SET `lastname` = COALESCE(lastname, $last),
                                                             `firstname` = COALESCE(firstname, $first),
                                                             `location` = COALESCE(location, $city),
                                                             `email` = COALESCE(email, $email),
                                                             `username` = COALESCE(username, $username),
                                                             `password` = COALESCE(MD5(password, $password))";

                            @mysqli_query($link, $queryUpdate);

                            redirect('userprofile');
                        }
                        ?>
                    </div>
	            </div>
            </div>
    </body>
</html>
