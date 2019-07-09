<?php
if(isset($_POST["signup"])){
    $unm = $_POST["unm"];
    $eml = $_POST["eml"];
    $pwd = $_POST["pwd"];
    $pwdc= $_POST["pwdc"];
    if(empty($unm) || empty($eml) || empty($pwd) || empty($pwdc)){
        header("location: ../signup.php?error=emptyfields");
        exit();
    }else if(!preg_match("/^[a-zA-Z0-9]*$/",$unm) || strlen($unm) < 6 || strlen($unm) > 20){
        header("location: ../signup.php?error=invalidusername");
        exit();
    }else if(!filter_var($eml , FILTER_VALIDATE_EMAIL)){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }else if(strlen($pwd) < 8 /*|| strpos($pwd , "/[a-z]*$/") || strpos($pwd , "/[A-Z]*$/") || strpos($pwd , "/[0-9]*$/")*/){
        header("location: ../signup.php?error=weackpass");
        exit();
    }else if($pwd !== $pwdc){
        header("location: ../signup.php?error=notmatch");
        exit();
    }else{
        require "dbconn.php";
        $sql = "SELECT username , email FROM user WHERE username=? OR email=? LIMIT 1;";
        $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("location: ../signup.php?error=s");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt , "ss" , $unm , $eml);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);
                if($result > 0){
                    header("location: ../signup.php?error=exist");
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    exit();
                }else{
                    $query = "INSERT INTO user (username,email,password) VALUES (?,?,?)";
                    $stmt  = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$query)){
                        header("location: ../signup.php?error=s2");
                        exit();
                        }else{
                            $hashpass = password_hash($pwd,PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt ,"sss",$unm,$eml,$hashpass);
                            mysqli_stmt_execute($stmt);
                             header("location: ../signup.php?signup=success");
                        }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
}
else{
    header("location: ../index.php?error=404notfound");
    exit();
}