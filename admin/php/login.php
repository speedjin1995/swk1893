<?php
require_once 'db_connect.php';

session_start();

$username=$_POST['email'];
$password=$_POST['password'];

$stmt = $db->prepare("SELECT * from user where user_email= ? LIMIT 1");
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if($row = $result->fetch_assoc()){
    if($row['user_role'] == 'PRIADMIN' || $row['user_role'] == 'EDITOR'){
		$password = hash('sha512', $password . $row['password_salt']);

		if($password == $row['user_password']){
			$_SESSION['userID']=$row['id'];
			$_SESSION['userRole']=$row['user_role'];
			$_SESSION['userName']=$row['user_name'];
			$stmt->close();
			$db->close();
			echo '<script type="text/javascript">';
			echo 'window.location.href = "../index.php";</script>';
		}
		else{
			echo '<script type="text/javascript">alert("Login unsuccessful, password or email is not matched");';
			echo 'window.location.href = "../login.html";</script>';
		}
	}
	else{
		echo '<script type="text/javascript">alert("Only Admin of The Website Can Login");';
		echo 'window.location.href = "../login.html";</script>';
	}
}
else {
    echo '<script type="text/javascript">alert("Login unsuccessful, password or email is not matched");';
    echo 'window.location.href = "../login.html";</script>';
}
?>
