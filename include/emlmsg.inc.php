<?php
if(isset($_POST['emlmsg'])){
    $reml = $_POST['reml'];
    if(empty($reml)){
        header("location: ../emlmsg.php?error=empty");
        exit();
    }else if(!filter_var($reml,FILTER_VALIDATE_EMAIL)){
        header("location: ../emlmsg.php?error=wrong");
        exit();
    }else{
        require "dbconn.php";
        $rsql = "SELECT * FROM user WHERE EMAIL=? LIMIT 1";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$rsql)){
            header("location: ../emlmsg.php?error=s");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt , "s" ,$reml);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result = mysqli_stmt_num_rows($stmt);
            if($result < 1){
            header("location: ../emlmsg.php?error=notuser");
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            exit();
            }else{
                $rsql = "INSERT INTO user (checkpass) VALUE (?);";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$rsql)){
                    header("location: ../emlmsg.php?error=s2");
                    exit();
                }else{
                    //generate verification code
                    //send email
                    $num = 1000;
                    mysqli_stmt_bind_param($stmt , "s" ,$num);
                    mysqli_stmt_execute($stmt);
                    header("location: ../res.php?email=$reml");
                }
            }
        }
    }
}else{
    header("location: ../emlmsg.php?error=h");
    exit();
}