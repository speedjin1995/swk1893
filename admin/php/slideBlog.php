<?php
require_once "db_connect.php";

session_start();

if(isset($_POST['engTitle'], $_POST['chTitle'])){
	$title_en = filter_input(INPUT_POST, 'engTitle', FILTER_SANITIZE_STRING);
	$title_ch = filter_input(INPUT_POST, 'chTitle', FILTER_SANITIZE_STRING);
	$engBlog = $_POST['engBlog'];
	$chineseBlog = $_POST['chineseBlog'];

    if($_POST['blogId'] != null && $_POST['blogId'] != ''){
            if ($update_stmt = $db->prepare("UPDATE slide_blog SET title_en=?, title_ch=?, desc_en=?, desc_ch=? WHERE id=?")) {
                $update_stmt->bind_param('sssss', $title_en, $title_ch, $engBlog, $chineseBlog, $_POST['blogId']);
                
                // Execute the prepared query.
                if (! $update_stmt->execute()) {
                    echo '<script type="text/javascript">alert("Somethings wrong");';
                    echo 'location.href = "../slideblog.php";</script>';  
                }
                else{
                    echo '<script type="text/javascript">alert("Updated successfully");';
                    echo 'location.href = "../slideblog.php";</script>';   
                }
            }
    }
    else{

        if ($insert_stmt = $db->prepare("INSERT INTO slide_blog (title_en, title_ch, desc_en, desc_ch) VALUES (?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssss', $title_en, $title_ch, $engBlog, $chineseBlog);
            
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                echo '<script type="text/javascript">alert("Somethings wrong");';
                echo 'location.href = "../slideblog.php";</script>';  
            }
            else{
                echo '<script type="text/javascript">alert("Added successfully");';
                echo 'location.href = "../slideblog.php";</script>';   
            }
        }
    }
}
else{
    echo '<script type="text/javascript">alert("Missing Attributes");';
    echo 'window.location.href = "../slideblog.php";</script>';
}
?>