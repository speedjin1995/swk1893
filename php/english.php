<?php
session_start();
$_SESSION['language'] = 'en';
echo '<script type="text/javascript">location.href = "../index.php";</script>';  
?>