<html>
    <head>
        <title>Login to your Account - Emergency Command Center</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="main">
            <div id="login">
                <h2>Sign In</h2><hr/><br/>
                <form action="<?php echo base_url(); ?>index.php/login/authenticate" method="POST">
                    <h3>Login to your Account</h3><hr/>
                    <input type="text" name="username" placeholder="Username" required="required"/><br/><br/>
                    <input type="password" name="password" placeholder="**********" required="required"/><br/><br/>
                    <input type="submit" name="btn_login" value="Log In"/><br/>

                    <h4 id="footer">Don't have an Account?</h4>
                    <center><a href="<?php echo base_url(); ?>index.php/signup"><b>Sign Up</b></a></center>
                </form>
            </div>
        </div>
    </body>
</html>