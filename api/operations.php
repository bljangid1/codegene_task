<?php
session_start();
require_once '../config/db.php';

header('Access-Control-Allow-Origin: *'); // allowed Websites
header('Access-Control-Allow-Methods: GET, POST');
header('Content-Type: application/json; charset=utf-8');
$json = file_get_contents("php://input");
$data = json_decode($json, true);
$Flag = $data['Flag'] ?? '';

if ($Flag == "Login") {

    $response = [];

    $Email  = $data["Email"];
    $Password = $data["Password"];

    $select = "SELECT * FROM assdt_users WHERE email_id=? AND password=MD5(?) AND is_active='ACTIVE' LIMIT 1";

    $stmt = $conn->prepare($select);
$stmt->bind_param("ss",$Email,$Password);

    if ($stmt->execute()) {

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {

            $selectData = $result->fetch_assoc();


                $_SESSION['user_id']           = $selectData['id'];
                $_SESSION['username']     = $selectData['full_name'];

                $response['message'] = "Logged in successfully";
                $response['status']  = "success";


        } else {
            $response['message'] = "Please Check Your Credentials!";
            $response['status']  = "failed";
        }

    } else {
        $response['message'] = "Fail " . $conn->error;
        $response['status']  = "failed";
    }

    echo json_encode($response);
}

?>