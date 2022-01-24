<?php
require_once "db_connect.php";

session_start();
$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
$path = '../../portfolio/';
$maxsize = 5 * 1024 * 1024;

if(isset($_POST['username'], $_POST['password'], $_POST['name'], $_POST['email'], $_POST['roleCode'])){
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $roleCode = filter_input(INPUT_POST, 'roleCode', FILTER_SANITIZE_STRING);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script type="text/javascript">alert("Please enter a valid email address");';
        echo 'location.href = "../shops.php";</script>';  
    }
    else{
        if($_POST['id'] != null && $_POST['id'] != ''){
            if ($update_stmt = $db->prepare("UPDATE user SET user_name=?, user_email=?, name=?, user_role=? WHERE id=?")) {
                $update_stmt->bind_param('sssss', $username, $email, $name, $roleCode, $_POST['id']);
                
                // Execute the prepared query.
                if (! $update_stmt->execute()) {
                    echo '<script type="text/javascript">alert("Somethings wrong");';
                    echo 'location.href = "../usermanagement.php";</script>';  
                }
                else{
                    echo '<script type="text/javascript">alert("Updated successfully");';
                    echo 'location.href = "../usermanagement.php";</script>';   
                }
            }
        }
        else{
            $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
            $password = hash('sha512', $password . $random_salt);

            if ($insert_stmt = $db->prepare("INSERT INTO user (user_name, user_email, user_password, password_salt, name, user_role) VALUES (?, ?, ?, ?, ?, ?)")) {
                $insert_stmt->bind_param('ssssss', $username, $email, $password, $random_salt, $name, $roleCode);
                
                // Execute the prepared query.
                if (! $insert_stmt->execute()) {
                    echo '<script type="text/javascript">alert("Somethings wrong");';
                    echo 'location.href = "../usermanagement.php";</script>';  
                }
                else{
                    echo '<script type="text/javascript">alert("Added successfully");';
                    echo 'location.href = "../usermanagement.php";</script>';   
                }
            }
        }
    }
}
else{
    echo '<script type="text/javascript">alert("Missing Attributes");';
    echo 'window.location.href = "../usermanagement.php";</script>';
}
?>