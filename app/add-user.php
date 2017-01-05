<?php
require_once('includes/config.php');
if(isset($_POST['submit'])){
    extract($_POST);
    if($username == ''){
        $error[]='please enter the username';
    }
    if($password==''){
        $error[]='please enter the password';
    }
    
    if($name==''){
        $error[]='please enter your name';
    }
    if($email==''){
        $error[]='please enter your email';
    }
    if(!isset($error)){
        
        $hashedpassword = $user->password_hash($password,PASSWORD_BCRYPT);
        try{
            $stmt = $db->prepare('INSERT INTO user (name,username,password,email) VALUES (:name,:username,:password,:email)');
            $stmt->execute(array(
                ':name'=>$name,
                ':username'=>$username,
                ':password'=>$hashedpassword,
                ':email'=>$email
            ));
            header('Location: index.php');
            exit;
        }catch(PDOException $e){
            echo 'error :( ';
        }
    }
}
if(isset($error)){
    foreach($error as $error){
        echo $error;
    }
}

?>