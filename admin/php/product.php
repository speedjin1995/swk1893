<?php
require_once "db_connect.php";

session_start();
$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
$path = '../../portfolio/';

if(isset($_POST['productName'], $_POST['productNameCh'], $_POST['engDesc'], $_POST['chineseDesc'])){
	$productName = filter_input(INPUT_POST, 'productName', FILTER_SANITIZE_STRING);
	$productNameCh = filter_input(INPUT_POST, 'productNameCh', FILTER_SANITIZE_STRING);
	$engDesc = $_POST['engDesc'];
    $chineseDesc = $_POST['chineseDesc'];
	$userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
    $path = "product/";
    $filePath = "";
    $uploadOk = 0;

    if(isset($_FILES["image-upload"]) && $_FILES["image-upload"]["error"] == 0){
        $filename = $_FILES["image-upload"]["name"];
        $filetype = $_FILES["image-upload"]["type"];
        $filesize = $_FILES["image-upload"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)){
            echo '<script type="text/javascript">alert("Please select a valid file format.");';
            echo 'location.href = "../index.php";</script>';
        }
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize){
            echo '<script type="text/javascript">alert("File size is larger than the allowed limit.");';
            echo 'location.href = "../index.php";</script>';
        }
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            $temp = explode(".", $_FILES["image-upload"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);

            // Check whether file exists before uploading it
            if(file_exists($path.$newfilename)){
                echo '<script type="text/javascript">alert("'.$newfilename.' is already exists.");';
                echo 'location.href = "../index.php";</script>';
            } 
            else{
                if (move_uploaded_file($_FILES["image-upload"]["tmp_name"], $path.$newfilename)) {
                    $filePath = $path.$newfilename;
                    $uploadOk = 1;
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

    if($_POST['id'] != null && $_POST['id'] != ''){
        if($uploadOk == 1){
            if ($update_stmt = $db->prepare("UPDATE product SET product_name=?, product_name_ch=?, product_desc=?, product_desc_ch=?, product_photo=? WHERE id=?")) {
                $update_stmt->bind_param('ssssss', $productName, $productNameCh, $engDesc, $chineseDesc, $filePath, $_POST['id']);
                
                // Execute the prepared query.
                if (! $update_stmt->execute()) {
                    echo '<script type="text/javascript">alert("Somethings wrong");';
                    echo 'location.href = "../index.php";</script>';  
                }
                else{
                    echo '<script type="text/javascript">alert("Updated successfully");';
                    echo 'location.href = "../index.php";</script>';   
                }
            }
        }
        else{
            if ($update_stmt = $db->prepare("UPDATE product SET product_name=?, product_name_ch=?, product_desc=?, product_desc_ch=? WHERE id=?")) {
                $update_stmt->bind_param('sssss', $productName, $productNameCh, $engDesc, $chineseDesc, $_POST['id']);
                
                // Execute the prepared query.
                if (! $update_stmt->execute()) {
                    echo '<script type="text/javascript">alert("Somethings wrong");';
                    echo 'location.href = "../index.php";</script>';  
                }
                else{
                    echo '<script type="text/javascript">alert("Updated successfully");';
                    echo 'location.href = "../index.php";</script>';   
                }
            }
        }
    }
    else{
        if($uploadOk == 1){
            if ($insert_stmt = $db->prepare("INSERT INTO product (product_name, product_name_ch	, product_desc, product_desc_ch, product_photo) VALUES (?, ?, ?, ?, ?)")) {
                $insert_stmt->bind_param('sssss', $productName, $productNameCh, $engDesc, $chineseDesc, $filePath);
                
                // Execute the prepared query.
                if (! $insert_stmt->execute()) {
                    echo '<script type="text/javascript">alert("Somethings wrong");';
                    echo 'location.href = "../index.php";</script>';  
                }
                else{
                    echo '<script type="text/javascript">alert("Added successfully");';
                    echo 'location.href = "../index.php";</script>';   
                }
            }
        }
        else{
            if ($insert_stmt = $db->prepare("INSERT INTO product (product_name, product_name_ch	, product_desc, product_desc_ch) VALUES (?, ?, ?, ?)")) {
                $insert_stmt->bind_param('ssss', $productName, $productNameCh, $engDesc, $chineseDesc);
                
                // Execute the prepared query.
                if (! $insert_stmt->execute()) {
                    echo '<script type="text/javascript">alert("Somethings wrong");';
                    echo 'location.href = "../index.php";</script>';  
                }
                else{
                    echo '<script type="text/javascript">alert("Added successfully");';
                    echo 'location.href = "../index.php";</script>';   
                }
            }
        }
    }
}
else{
    echo '<script type="text/javascript">alert("Missing Attributes");';
    echo 'window.location.href = "../index.php";</script>';
}
?>