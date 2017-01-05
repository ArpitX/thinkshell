<?php

//include config
require_once('includes/config.php');
if($user->is_logged_in()){ header('Location: index.php'); }
?>
    <!doctype html>
    <html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>thinkShell</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/bootstrap-gridsystem-only.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/jquery-ui.css">
        <style>
            html {
                background-color: #0a0a0a;
            }
            
            .error {
                position: absolute;
                z-index: 1000;
                color: red;
            }
            
            button:focus {
                outline: none;
                box-shadow: none !important;
            }
            
            .btn {
                padding: 12px 22px !important;
                transition: all 0.3s;
            }
            
            .btn:hover {
                background-color: white;
                color: grey;
                box-shadow: none;
            }
            
            html {
                height: 100%;
            }
            
            body {
                height: 100%;
            }
            
            #index {
                height: 100%;
            }
            
            #login-page {
                height: 100%;
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                width: 100%;
                -webkit-box-align: center;
                -webkit-align-items: center;
                -ms-flex-align: center;
                align-items: center;
            }
            
            #login-page .container-fluid {
                width: 100%;
                height: 100%;
                background-color: rgba(16,0,23,0.3);
                z-index: 10000;
                
            }
            
            #login-page .container-fluid .row {
                height: 100%;
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                width: 100%;
                margin-left: 0px;
                -webkit-box-align: center;
                -webkit-align-items: center;
                -ms-flex-align: center;
                align-items: center;
            }
            
            @media (max-width:992px) {
                #login-page .container-fluid {}
                #login-page .container-fluid .row {
                    height: 100%;
                    display: block;
                    width: 100%;
                    padding-top: 30px;
                }
                #index hr {
                    width: 80%;
                }
            }
        </style>
    </head>

    <body>
        <?php

	//process login form if submitted
	if(isset($_POST['submit'])){

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		if($user->login($username,$password)){ 
            $_SESSION['username'] = $username;    
			//logged in return to index page
			header('Location: index.php');
			exit;
		

		} else {
			$message =" 
            <script>
                window.alert('Wrong username or password');
                </script>";
		}

	}//end if submit

	if(isset($message)){ echo $message; }
	?>
            <div id="index">
                <div id="login-page"> <img id="background-img-index" src="img/wallpapers/<?php echo(rand(1,9));?>.jpg" alt="">
                    <div class="container-fluid">
                        <div class="row">
                            <div id="thinkShell" class="col-xs-12 col-md-6 text-center">
                                <h1>ThinkShell</h1> </div>
                            <div class="col-xs-12 col-md-6 text-center " id="login-register-form">
                                <button type="" id="login-button" class="btn">Login</button>
                                <form id="login-form" class="" method="post">
                                    <input type="text" id="form-email" class="form-control" name="username" placeholder="Username">
                                    <input type="password" id="form-password" name="password" class="form-control" placeholder="Password">
                                    <input type="submit" name="submit" value="Login" class="btn form-control"> </form>
                                <hr>
                                <button id="register-button" class="btn">Register</button>
                                <form id="signup-form" method="post" action="add-user.php">
                                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                                    <input name="username" type="text" class="form-control" placeholder="username" required>
                                    <input name="password" type="password" class="form-control" placeholder="Password" required>
                                    <input name="email" type="email" class="form-control" placeholder="Email" required>
                                    <input name="submit" type="submit" class="btn form-control"> </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="js/jquery-3.0.0.min.js"></script>
        <script src="js/jquery-ui.js"></script>
            <script src="js/main.js"></script>
        
    </body>

    </html>