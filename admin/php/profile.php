<?php
require_once "db_connect.php";

session_start();
$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
$path = '../../portfolio/';
$maxsize = 5 * 1024 * 1024;

if(isset($_POST['username'], $_POST['name'], $_POST['engDescription'], $_POST['chineseDescription'], $_POST['phone'], $_POST['email'], $_POST['address'])){
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $engDescription = filter_input(INPUT_POST, 'engDescription', FILTER_SANITIZE_STRING);
	$chineseDescription = filter_input(INPUT_POST, 'chineseDescription', FILTER_SANITIZE_STRING);
	$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $path = $path.$username;
    $profileFilePath = "";
    $backgroundFilePath = "";

    // Check Directory Exixt
    if (!file_exists($path)) {
        mkdir($path);
    }

    if(isset($_FILES["background-image"]) && $_FILES["background-image"]["error"] == 0){
        $filename = $_FILES["background-image"]["name"];
        $filetype = $_FILES["background-image"]["type"];
        $filesize = $_FILES["background-image"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)){
            echo '<script type="text/javascript">alert("Please select a valid file format.");';
            echo 'location.href = "../index.php";</script>';
        }
    
        // Verify file size - 5MB maximum
        if($filesize > $maxsize){
            echo '<script type="text/javascript">alert("File size is larger than the allowed limit.");';
            echo 'location.href = "../index.php";</script>';
        }
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            $temp = explode(".", $_FILES["background-image"]["name"]);
            $newfilename = 'background.jpg';

            // Check whether file exists before uploading it
            if(file_exists($path.'/'.$newfilename)){
                echo '<script type="text/javascript">alert("'.$newfilename.' is already exists.");';
                echo 'location.href = "../index.php";</script>';
            } 
            else{
                if (move_uploaded_file($_FILES["background-image"]["tmp_name"], $path.'/'.$newfilename)) {
                    //$backgroundFilePath = $path.'/'.$newfilename;
                } 
                else {
                    echo '<script type="text/javascript">alert("Sorry, there was an error uploading your file.");';
                    echo 'location.href = "../index.php";</script>';
                }
            } 
        } 
        else{
            echo '<script type="text/javascript">alert("Sorry, there was an error uploading your file.");';
            echo 'location.href = "../index.php";</script>';
        }
    } 

    if(isset($_FILES["profile-image"]) && $_FILES["profile-image"]["error"] == 0){
        $filename = $_FILES["profile-image"]["name"];
        $filetype = $_FILES["profile-image"]["type"];
        $filesize = $_FILES["profile-image"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)){
            echo '<script type="text/javascript">alert("Please select a valid file format.");';
            echo 'location.href = "../index.php";</script>';
        }
    
        // Verify file size - 5MB maximum
        if($filesize > $maxsize){
            echo '<script type="text/javascript">alert("File size is larger than the allowed limit.");';
            echo 'location.href = "../index.php";</script>';
        }
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            $temp = explode(".", $_FILES["profile-image"]["name"]);
            $newfilename = 'profile.jpg';

            // Check whether file exists before uploading it
            if(file_exists($path.'/'.$newfilename)){
                echo '<script type="text/javascript">alert("'.$newfilename.' is already exists.");';
                echo 'location.href = "../index.php";</script>';
            } 
            else{
                if (move_uploaded_file($_FILES["profile-image"]["tmp_name"], $path.'/'.$newfilename)) {
                    //$profileFilePath = $path.'/'.$newfilename;
                } 
                else {
                    echo '<script type="text/javascript">alert("Sorry, there was an error uploading your file.");';
                    echo 'location.href = "../index.php";</script>';
                }
            } 
        } 
        else{
            echo '<script type="text/javascript">alert("Sorry, there was an error uploading your file.");';
            echo 'location.href = "../index.php";</script>';
        }
    } 

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script type="text/javascript">alert("Please enter a valid email address");';
        echo 'location.href = "../shops.php";</script>';  
    }
    else{
        $socialMedia = Array();

        if($_POST['facebook']!=null && $_POST['facebook']!=''){
            $socialMedia['facebook'] = $_POST['facebook'];
        }

        if($_POST['instagram'] && $_POST['instagram']!=''){
            $socialMedia['instagram'] = $_POST['instagram'];
        }

        if($_POST['twitter'] && $_POST['twitter']!=''){
            $socialMedia['twitter'] = $_POST['twitter'];
        }

        if($_POST['youtube'] && $_POST['youtube']!=''){
            $socialMedia['youtube'] = $_POST['youtube'];
        }

        if($_POST['wechat'] && $_POST['wechat']!=''){
            $socialMedia['wechat'] = $_POST['wechat'];
        }

        if($_POST['id'] != null && $_POST['id'] != ''){
            if ($update_stmt = $db->prepare("UPDATE user SET user_name=?, user_email=?, name=?, phone_number=?, address=?, chinese_description=?, english_description=?, social_media=? WHERE id=?")) {
                $update_stmt->bind_param('sssssssss', $username, $email, $name, $phone, $address, $chineseDescription, $engDescription, json_encode($socialMedia), $_POST['id']);
                
                // Execute the prepared query.
                if (! $update_stmt->execute()) {
                    echo '<script type="text/javascript">alert("Somethings wrong");';
                    echo 'location.href = "../profile.php";</script>';  
                }
                else{
                    echo '<script type="text/javascript">alert("Updated successfully");';
                    echo 'location.href = "../profile.php";</script>';   
                }
            }
        }
    }
}
else{
    echo '<script type="text/javascript">alert("Missing Attributes");';
    echo 'window.location.href = "../profile.php";</script>';
}
?>