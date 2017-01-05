<?php //include config
require_once('includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

if(isset($_GET['delpost'])){ 

	$stmt = $db->prepare('DELETE FROM posts WHERE postID = :postID') ;
	$stmt->execute(array(':postID' => $_GET['delpost']));

	header('Location: posts.php?action=deleted');
	exit;
}

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
        <link rel="stylesheet" href="css/post-cont.css">
        <link rel="stylesheet" href="css/jquery-ui.css">
        <script language="JavaScript" type="text/javascript">
  function delpost(id)
  {
	  if (confirm("Are you sure you want to delete this post"))
	  {
	  	window.location.href = 'posts.php?delpost=' + id;
	  }
  }
  </script>
        <style>
            html{
                
            }
            
        </style>
    </head>
    <body>
        
        <?php
        $username = $_SESSION['username'];
        try{
            $stmt = $db->prepare('select userID from user where username = :username');
            $stmt->execute(array(':username' => $username));
			$row = $stmt->fetch();
			$idUser = $row['userID'];
        } catch(PDOException $e){
            echo 'damn it!';
        }
        
        
        ?>
        
        <div id="shell">
            <header>
                <div id="dropdown-header-menu" >
                    <div id="dropdown-back-img">
                    	<img src="img/wallpapers/4.jpg">
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
                <div class="posts">
                <div class="container-fluid">
                    <div class="row">
                        
                        <?php
                        try{
                            $stmt = $db->prepare('SELECT postID, postCont, postDate FROM posts WHERE idUser = :idUser ORDER BY postID DESC');
                            $stmt->execute(array(':idUser' => $idUser));
			                while($row = $stmt->fetch()){
                                
                                $months = array("January","February","March","April","May","June","July","August","September","October","November","December");
                                $ds = $row['postDate'];
                                $arr = explode(" ",$ds);
                                
                                $dsa = explode("-",$arr[0]);
                                //print_r ($dsa);
                                $ds = $dsa[2].' '.$months[$dsa[1]-1].' '.$dsa[0].'<br>'.$arr[1];
                                
                                echo '<div class="mce-content-body paper preview-box col-xs-12 col-sm-10 col-md-8 col-sm-push-1 col-md-push-2" style="">';
                                echo '<div class="col-xs-12 col-sm-10 col-sm-push-1">';
                                echo '<div class="datetime"><p> '.$ds.'</p></div>';
                                echo $row['postCont'];
                                
                                ?>
                                <div class="edit-delete-post">
                                
                                <a id="cancel-btn" class="svg-btn pull-right" href="javascript:delpost('<?php echo $row['postID'];?>')"><svg fill="#231f20" version="1.1" id="Group_1_copy_1_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
	 y="0px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
<path d="M5.9,13h4.3c0.5,0,0.9-0.4,1-0.9L12,5.5H4l0.9,6.6C5,12.6,5.4,13,5.9,13z M11,3c0-0.6-0.4-1-1-1H6C5.4,2,5,2.4,5,3L3,4v1h1
	h1h1h1h2h1h1h1h1V4L11,3z M9.5,4h-3C6.2,4,6,3.8,6,3.5S6.2,3,6.5,3h3C9.8,3,10,3.2,10,3.5S9.8,4,9.5,4z"/>
</svg></a>
                                    <a id="save-btn" class="svg-btn pull-right" href="edit-post.php?id=<?php echo $row['postID']; ?>"><svg fill="#231f20" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
<g>
	<path d="M12.6,6.9l0.5-0.5c0.8-0.8,0.8-2,0-2.8l-0.7-0.7c-0.8-0.8-2-0.8-2.8,0L9.1,3.4L12.6,6.9z"/>
	<polygon points="8.4,4.1 2,10.5 2,14 5.5,14 11.9,7.6 	"/>
</g>
</svg></a>
                                </div>
                                <?php
                                echo '</div>';
                                echo '</div>';   
                            }
                        }catch(PDOException $e){
                            echo 'error!';
                        }
                        ?>
                        
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
