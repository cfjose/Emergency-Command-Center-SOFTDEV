<html>
    <head>
        <title>Create your new Account - Restaurant Locator System</title>
        <link rel="stylesheet" type="text/css" href="http://localhost/restaurant_locator_system/css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="main">
            <div id="signup">
                <h2>Registration Form</h2><hr/><br/>
                <form action="" method="POST">
                    <h3>Personal Information</h3><hr/>
                    <input type="text" name="lastname" placeholder="Last Name" required="required"/><br/><br/>
                    <input type="text" name="firstname" placeholder="First Name" required="required"/><br/><br/>

                    <h3>Contact Information</h3><hr/>
                    <input type="email" name="email" placeholder="e.g. jsdelacruz@example.com" required="required"/><br/><br/>
                    <input type="text" name="mobile-num" placeholder="Mobile Number"/><br/><br/>

                    <h3>Login Credentials</h3><hr/>
                    <input type="text" name="username" placeholder="Username" required="required"/><br/><br/>
                    <input type="password" name="password" placeholder="**********" required="required"/><br/><br/>

                    <input type="submit" name="btn_submit" value="SUBMIT"/><br/><br/>

                    <h4 id="footer">Already have an account?</h4>
                    <center><a href="<?php echo base_url(); ?>index.php/login" id="footer"><b>Login</b></a></center>

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
                            redirect('login');
                        }
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>