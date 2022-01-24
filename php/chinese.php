<?php
session_start();
$_SESSION['language'] = 'ch';
echo '<script type="text/javascript">location.href = "../index.php";</script>';  
?>