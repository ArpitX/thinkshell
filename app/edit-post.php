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
                                        svg{
                                            width: 40px;
                                            
                                        }
            .svg-btn{
                background-color: transparent;
                border: none;
            }
            #save-btn .svg-btn:hover{
                background-color: lawngreen;
            }
                                    </style>
    </head>
    <body>
        
        <?php 
        if(isset($_POST['submit'])){
            $_POST = array_map('stripslashes',$_POST);
            extract($_POST);
            if($mce_0 == ''){
                $error[] = 'please enter the content';
            }
        
        if(!isset($error)){
            try{
                $stmt = $db->prepare('UPDATE posts SET postCont = :postCont WHERE postID = :postID');
                //$stmt->execute(array(':postCont'=>$postCont,':postID'=>$_GET['id']));
                $stmt->execute(array(':postCont'=>$mce_0,':postID'=>$_GET['id']));
                echo "before header";
                header('Location: posts.php?action=updated');
                echo 'after header';
                exit;
            }catch(PDOException $e){
                echo 'error';
            }
        }
        }
         ?>

        <?php
        
            if(isset($error)){
                foreach($error as $error){
                    echo $error.'<br />';
                }
            }
            try{
                $stmt = $db->prepare('SELECT postID,postCont,postDate FROM posts where postID = :postID');
                $stmt->execute(array(':postID'=>$_GET['id']));
                $row = $stmt->fetch();
                $postID = $row['postID'];
            }catch(PDOException $e){
                echo "error";
            }
            ?>
        <div id="shell">
            <header>
                <div id="dropdown-header-menu" >
                    <div id="dropdown-back-img">
                    	<img src="img/wallpapers/2.jpg">
                    </div>
                     <div class="identity">
                        <div id="dropdown-front-img"> <img src="img/3.png" class="" alt=""> </div>
                        <div id="dropdown-name">
                    	<p><?php echo $_SESSION['name']; ?></p>
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
                <div id="header-menu-toggle">
                    <span></span>
                </div>
            </header>
            
            
            <div id="page">
                <div class="container-fluid">
                    <div class="row">
                        <div class="preview-box col-xs-12 col-sm-10 col-md-8 col-sm-push-1 col-md-push-2" style="background-color:#FFFF7F">
                            <div class="col-xs-12 col-sm-10 col-sm-push-1">
                            	<?php
                                $months = array("January","February","March","April","May","June","July","August","September","October","November","December");
                                $ds = $row['postDate'];
                                $arr = explode(" ",$ds);
                                
                                $dsa = explode("-",$arr[0]);
                                //print_r ($dsa);
                                $ds = $dsa[2].' '.$months[$dsa[1]-1].' '.$dsa[0].'<br>'.$arr[1];
                                echo '<div class="datetime"><p> '.$ds.'</p></div>';
                                ?>
                            	
                                <form action='' method='post' onsubmit="return validateForm()">
                            	<!--<textarea name="postCont" placeholder="write here.."><?php //echo $row['postCont']; ?></textarea> -->
                            	<div class="textarea"><?php echo $row['postCont']; ?></div>
                            	<button id="cancel-btn" class="svg-btn pull-right" onclick="history.back()"><svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
<polygon fill="#231F20" points="12.7,4.7 11.3,3.3 8,6.6 4.7,3.3 3.3,4.7 6.6,8 3.3,11.3 4.7,12.7 8,9.4 11.3,12.7 12.7,11.3 9.4,8 
	"/>
</svg></button>
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
  plugins: 'save image link paste contextmenu textpattern autolink hr pagebreak',
  insert_toolbar: 'quickimage h1 h2 h3 h4 bold italic quicklink hr pagebreak',
  selection_toolbar: 'bold italic | quicklink h1 h2 h3 h4 blockquote hr pagebreak | alignleft aligncenter alignright alignjsutify',
                toolbar:"submit",
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
            function cancel(){
                window.location.assign('localhost');
            }
        </script>
    </body>
</html>
