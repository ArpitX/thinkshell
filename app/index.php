<?php //include config
require_once('includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
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
            html {}
        </style>
        
        <style>
            /*#save-btn{
                border: none;
                background-color: #16b7df;
                color: white !important;
            }
            
        </style>
    </head>

    <body>
        <?php
        $username = $_SESSION['username'];
        
        try{
            $stmt = $db->prepare('select userID,name from user where username = :username');
            $stmt->execute(array(':username' => $username));
			$row = $stmt->fetch();
			$idUser = $row['userID'];
            $name = $row['name'];
            $_SESSION['name']=$name;
        } catch(PDOException $e){
            echo 'damn it!';
        }
        
        if(isset($_POST['submit'])){
            $_POST = array_map('stripslashes', $_POST);
            extract($_POST);
            if($mce_0 == ''){
                $error[] = 'please write something';
            }
            if(!isset($error)){
            try{
                $stmt = $db->prepare('INSERT INTO posts (idUser,postCont,postDate) VALUES (:idUser, :postCont,:postDate)');
                $stmt->execute(array(
                    ':idUser' => $idUser,
                    ':postCont' => $mce_0,
                    ':postDate' => $postDate
                ));
                
                header('Location: index.php?action=added');
                exit;
            
            } catch(PDOException $e){
                echo $e->getMessage();
            }
            }
        }
        if(isset($error)){
            foreach($error as $error){
                echo '<p class="error" >'.$error.'</p>';
            }
        }
        ?>
            <div id="shell">
                <header>
                    <div id="dropdown-header-menu">
                        <div id="dropdown-back-img"> <img src="img/wallpapers/2.jpg"> </div>
                        <div class="identity">
                        <div id="dropdown-front-img"> <img src="img/3.png" class="" alt=""> </div>
                        <div id="dropdown-name">
                            <p>
                                <?php echo $name; ?>
                            </p>
                        </div>
                        </div>
                        <div id="dropdown-list">
                            <ul>
                                <li><a href="index.php" title="">Home</a></li>
                                <li><a href="posts.php" title="">Previous Entries</a></li>
                                <li><a href="logout.php" title="">Log out</a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="header-menu-toggle"> <span></span> </div>
                </header>
                <div id="page">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="paper col-xs-12 col-sm-10 col-md-8 col-sm-push-1 col-md-push-2" style="">
                                <div class="col-xs-12 col-sm-10 col-sm-push-1">
                                    <div id="page-date" class=" date"></div>
                                    <hr>
                                    <form action='' method='post' onsubmit="return validateForm()">
                                    
                                        <div class="textarea"></div>
                                        
                                        <input name="postDate" class="hidden " id="datetimebox" type="text">
                                        <hr>
                                        
                                        <button id="save-btn" class="svg-btn pull-right" type="submit" name="submit" value="submit"><svg version="1.1" id="Layer_6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
<polygon fill="#231F20" points="13.3,3.3 6.5,10.1 3.7,7.3 2.3,8.7 6.5,12.9 14.7,4.7 "/>
</svg>  </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="js/jquery-3.0.0.min.js"></script>
            <script src="js/jquery-ui.js"></script>
            <script src="js/main.js"></script>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
            tinymce.init({
  selector: 'div.textarea',
  theme: 'inlite',
  plugins: 'image link paste contextmenu textpattern autolink hr pagebreak',
  insert_toolbar: 'quickimage h1 h2 h3 h4 bold italic quicklink hr pagebreak',
  selection_toolbar: 'bold italic | quicklink h1 h2 h3 h4 blockquote hr pagebreak | alignleft aligncenter alignright alignjsutify',
  inline: true,
  paste_data_images: true,
  content_css: [
    'css/post-cont.css'    
  ]
});
        </script>
        <script>
        
            function validateForm(){
                var $savebtn = $('#save-btn');
                var $textarea = $('.textarea');
                if($textarea.text() == ""){
                    alert('Please write something.');
                    return false;
                }
            }
        </script>
    </body>

    </html>