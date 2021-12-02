<?php
require_once "db_connect.php";

session_start();

if(isset($_POST['engTitle'], $_POST['chTitle'])){
	$title_en = filter_input(INPUT_POST, 'engTitle', FILTER_SANITIZE_STRING);
	$title_ch = filter_input(INPUT_POST, 'chTitle', FILTER_SANITIZE_STRING);
	$engBlog = $_POST['engBlog'];
	$chineseBlog = $_POST['chineseBlog'];
	$uploadOk = 0;
	$filePath = "";
	
	if($_FILES['fileToUpload']['size'] != 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        
        if($check !== false) {
            $uploadOk = 1;
        } 
        else {
            echo '<script type="text/javascript">alert("File is not an image.");';
            echo 'location.href = "../index.php";</script>';
        }
        
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo '<script type="text/javascript">alert("Sorry, your file is too large.");';
            echo 'location.href = "../index.php";</script>';
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo '<script type="text/javascript">alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");';
            echo 'location.href = "../index.php";</script>';
        }
        
        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$newfilename)) {
            $filePath = $target_dir.$newfilename;
            $uploadOk = 1;
        } 
        else {
            echo '<script type="text/javascript">alert("Sorry, there was an error uploading your file.");';
            echo 'location.href = "../index.php";</script>';
        }
    }

    if($_POST['blogId'] != null && $_POST['blogId'] != ''){
        if($uploadOk == 1){
            if ($update_stmt = $db->prepare("UPDATE blog SET title_en=?, title_ch=?, en=?, ch=?, image=? WHERE id=?")) {
                $update_stmt->bind_param('ssssss', $title_en, $title_ch, $engBlog, $chineseBlog, $filePath, $_POST['blogId']);
                
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
            if ($update_stmt = $db->prepare("UPDATE blog SET title_en=?, title_ch=?, en=?, ch=? WHERE id=?")) {
                $update_stmt->bind_param('sssss', $title_en, $title_ch, $engBlog, $chineseBlog, $_POST['blogId']);
                
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
            if ($insert_stmt = $db->prepare("INSERT INTO blog (title_en, title_ch, en, ch, image) VALUES (?, ?, ?, ?)")) {
                $insert_stmt->bind_param('sssss', $title_en, $title_ch, $engBlog, $chineseBlog, $filePath);
                
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
            if ($insert_stmt = $db->prepare("INSERT INTO blog (title_en, title_ch, en, ch) VALUES (?, ?, ?, ?)")) {
                $insert_stmt->bind_param('ssss', $title_en, $title_ch, $engBlog, $chineseBlog);
                
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