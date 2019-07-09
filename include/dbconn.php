<?php
$server = "localhost";
$dbunm  = "root";
$dbname = "training";
$dbpwd  = "";
$conn   = mysqli_connect($server,$dbunm,$dbpwd,$dbname);
if(!$conn){
    header("location: ../index.php?error=cs");
    exit();
}
