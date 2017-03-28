<html>
    <head>
        <title>Login to your Account - Emergency Command Center</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
        <style>
            body{
                background-image: url("<?php echo base_url(); ?>res/red.png");
            }
        </style>
    </head>
    <body>
        <div id="main">
            <div id="login">
                <center><img src="<?php echo base_url(); ?>res/ndrrmc.png"/></center>
                <h2>Emergency Command Center Dashboard</h2><hr/><br/>
                <form action="<?php echo base_url(); ?>index.php/login/authenticate" method="POST">
                    <h3>Login to your Account</h3><hr/>
                    <input type="text" name="username" placeholder="Username" required="required"/><br/><br/>
                    <input type="password" name="password" placeholder="**********" required="required"/><br/><br/>
                    <input type="submit" name="btn_login" value="Log In"/><br/>
                </form>
            </div>
        </div>
    </body>
</html>