<?php
date_default_timezone_set('Asia/Kuala_Lumpur');
$db = mysqli_connect("localhost", "root", "", "u782565293_durianduke");

if(mysqli_connect_errno()){
    echo 'Database connection failed with following errors: ' . mysqli_connect_error();
    die();
}
?>