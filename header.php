<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="view" content="width=device-width, initial-scale=1.0"/>
        <meta name="description" content="log-in system to biggner"/>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="style/fontawesome/css/all.css"/>
        <link rel="stylesheet" href="style/responsive.css"/>
        <link rel="stylesheet" href="style/style.css"/>
    </head>
    <body>
        <div class="wrapp">
            <header class="row">
                <nav class="col-lg-12 col-md-12 col-s-12 col-xs-12">
                    <div class="d-icon col-lg-1 col-md-1 col-s-12 col-xs-12">
                    <a href="index.php"><i class="fas fa-cannabis fa-3x"></i></a>
                    </div>
                    <div class="d-options">
                        <ul>
                            <li class="col-lg-3 col-md-3 col-s-3 col-xs-3"><a href="index.php">Home</a></li>
                            <li class="col-lg-3 col-md-3 col-s-3 col-xs-3"><a href="">contact us</a></li>
                            <li class="col-lg-3 col-md-3 col-s-3 col-xs-3"><a href="" onclick="alert('it\'s a simple project Designed by: Mostafa Abdelrazek')">About us</a></li>
                        </ul>
                    </div>
                
                <?php
                if(isset($_SESSION['id']) && isset($_SESSION['username']))
                echo '
                <div class="col-lg-2 col-md-2  col-s-3 col-xs-3 d-logout">
                    <form action="include/logout.inc.php" method="post">
                        <button name="logout" type="submit">logout</button>
                    </form>
                </div>
                </nav>';
                else{
                    echo '
                    
                    </nav>';
                }
                ?>
            </header>