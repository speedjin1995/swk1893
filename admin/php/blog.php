<?php
require_once "db_connect.php";

session_start();
$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");

if(isset($_POST['engTitle'], $_POST['chTitle'])){
	$title_en = filter_input(INPUT_POST, 'engTitle', FILTER_SANITIZE_STRING);
	$title_ch = filter_input(INPUT_POST, 'chTitle', FILTER_SANITIZE_STRING);
	$engBlog = $_POST['engBlog'];
	$chineseBlog = $_POST['chineseBlog'];
	$uploadOk = 0;
	$filePath = "";
    $target_dir = "testimony/";

    if(isset($_FILES["image-upload"]) && $_FILES["image-upload"]["error"] == 0){
        $filename = $_FILES["image-upload"]["name"];
        $filetype = $_FILES["image-upload"]["type"];
        $filesize = $_FILES["image-upload"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)){
            echo '<script type="text/javascript">alert("Please select a valid file format.");';
            echo 'location.href = "../blog.php";</script>';
        }
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize){
            echo '<script type="text/javascript">alert("File size is larger than the allowed limit.");';
            echo 'location.href = "../blog.php";</script>';
        }
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            $temp = explode(".", $_FILES["image-upload"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);

            // Check whether file exists before uploading it
            if(file_exists($target_dir.$newfilename)){
                echo '<script type="text/javascript">alert("'.$newfilename.' is already exists.");';
                echo 'location.href = "../blog.php";</script>';
            } 
            else{
                if (move_uploaded_file($_FILES["image-upload"]["tmp_name"], $target_dir.$newfilename)) {
                    $filePath = $target_dir.$newfilename;
                    $uploadOk = 1;
                } 
                else {
                    echo '<script type="text/javascript">alert("Sorry, there was an error uploading your file.");';
                    echo 'location.href = "../blog.php";</script>';
                }
            } 
        } 
        else{
            echo '<script type="text/javascript">alert("Sorry, there was an error uploading your file.");';
            echo 'location.href = "../blog.php";</script>';
        }
    } 

    if($_POST['blogId'] != null && $_POST['blogId'] != ''){
        if($uploadOk == 1){
            if ($update_stmt = $db->prepare("UPDATE blog SET title_en=?, title_ch=?, en=?, ch=?, img=? WHERE id=?")) {
                $update_stmt->bind_param('ssssss', $title_en, $title_ch, $engBlog, $chineseBlog, $filePath, $_POST['blogId']);
                
                // Execute the prepared query.
                if (! $update_stmt->execute()) {
                    echo '<script type="text/javascript">alert("Somethings wrong");';
                    echo 'location.href = "../blog.php";</script>';  
                }
                else{
                    echo '<script type="text/javascript">alert("Updated successfully");';
                    echo 'location.href = "../blog.php";</script>';   
                }
            }
        }
        else{
            if ($update_stmt = $db->prepare("UPDATE blog SET title_en=?, title_ch=?, en=?, ch=? WHERE id=?")) {
                $update_stmt->bind_param('sssss', $title_en, $title_ch, $engBlog, $chineseBlog, $_POST['blogId']);
                
                // Execute the prepared query.
                if (! $update_stmt->execute()) {
                    echo '<script type="text/javascript">alert("Somethings wrong");';
                    echo 'location.href = "../blog.php";</script>';  
                }
                else{
                    echo '<script type="text/javascript">alert("Updated successfully");';
                    echo 'location.href = "../blog.php";</script>';   
                }
            }
        }
    }
    else{
        if($uploadOk == 1){
            if ($insert_stmt = $db->prepare("INSERT INTO blog (title_en, title_ch, en, ch, img) VALUES (?, ?, ?, ?, ?)")) {
                $insert_stmt->bind_param('sssss', $title_en, $title_ch, $engBlog, $chineseBlog, $filePath);

                // Execute the prepared query.
                if (! $insert_stmt->execute()) {
                    echo '<script type="text/javascript">alert("Somethings wrong");';
                    echo 'location.href = "../blog.php";</script>';  
                }
                else{
                    echo '<script type="text/javascript">alert("Added successfully");';
                    echo 'location.href = "../blog.php";</script>';   
                }
            }
        }
        else{
            if ($insert_stmt = $db->prepare("INSERT INTO blog (title_en, title_ch, en, ch) VALUES (?, ?, ?, ?)")) {
                $insert_stmt->bind_param('ssss', $title_en, $title_ch, $engBlog, $chineseBlog);
                
                // Execute the prepared query.
                if (! $insert_stmt->execute()) {
                    echo '<script type="text/javascript">alert("Somethings wrong");';
                    echo 'location.href = "../blog.php";</script>';  
                }
                else{
                    echo '<script type="text/javascript">alert("Added successfully");';
                    echo 'location.href = "../blog.php";</script>';   
                }
            }
        }
    }
}
else{
    echo '<script type="text/javascript">alert("Missing Attributes");';
    echo 'window.location.href = "../blog.php";</script>';
}
?>