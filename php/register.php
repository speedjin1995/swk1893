<?php
$password = "Aaa111222333";
$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
$password = hash('sha512', $password . $random_salt);

echo 'Salt : '.$random_salt;
echo 'Password : '.$password;
?>