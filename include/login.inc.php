<?php
if(isset($_POST['login'])){
    $ueml = $_POST['uemail'];
    if(empty($ueml)||empty($_POST['upwd'])){
        header("location: ../index.php?error=emptyfields");
        exit();
    }else{
        require "dbconn.php";
        $query = "SELECT * FROM user where EMAIL =? LIMIT 1";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query)){
            header("locaion: ../index.php?error=serror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt , "s" , $ueml);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($info = mysqli_fetch_assoc($result)){
                $cpwd = password_verify($_POST['upwd'],$info['PASSWORD']);
           
            if($cpwd == false || $cpwd != true){
                header("location: ../index.php?error=wrongpass");
                exit();
            }else if($cpwd == true){
                session_start();
                $_SESSION['id']         = $info['ID'];
                $_SESSION['username']   = $info['username'];
                $_SESSION['email']      =$info['EMAIL'];
                header("location: ../index.php?login=success");
                exit();
            }else{
                header("location: ../index.php?error=wrongpass");
                exit();
                } 
            }
            else{
                header("location: ../index.php?error=emailnotfound");
                exit();
            }
            
        }
    }
}else{
    header("location: ../index.php");
    exit();
}