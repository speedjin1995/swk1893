<?php
require_once "db_connect.php";

session_start();

if(isset($_POST['messageId'])){
	$id = filter_input(INPUT_POST, 'messageId', FILTER_SANITIZE_STRING);

    if ($update_stmt = $db->prepare("SELECT * FROM user WHERE id=?")) {
        $update_stmt->bind_param('s', $id);
        
        // Execute the prepared query.
        if (! $update_stmt->execute()) {
            echo json_encode(
                array(
                    "status" => "failed",
                    "message" => "Something went wrong"
                )); 
        }
        else{
            $result = $update_stmt->get_result();
            $message = array();
            
            while ($row = $result->fetch_assoc()) {
                $message['id'] = $row['id'];
                $message['user_name'] = $row['user_name'];
                $message['user_email'] = $row['user_email'];
                $message['password'] = "password";
                $message['name'] = $row['name'];
                $message['phone_number'] = $row['phone_number'];
                $message['address'] = $row['address'];
                $message['social_media'] = $row['social_media'];
                $message['chinese_description'] = $row['chinese_description'];
                $message['english_description'] = $row['english_description'];
                $message['user_role'] = $row['user_role'];
            }
            
            echo json_encode(
                array(
                    "status" => "success",
                    "message" => $message
                ));   
        }
    }
}
else{
    echo json_encode(
        array(
            "status" => "failed",
            "message" => "Missing Attribute"
            )); 
}
?>