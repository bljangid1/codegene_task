<?php

require_once '../config/db.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=utf-8');

$json = file_get_contents("php://input");
$data = json_decode($json, true);

$Flag = $data['Flag'] ?? '';

if($Flag == "Submit-Form"){
    $Name = $data["Name"];
    $Email = $data["Email"];
    $Password = $data["Password"];
    // $Password = MD5($Password);
    $Password = password_hash($data["Password"], PASSWORD_DEFAULT);
    $Phone = $data["Phone"];
    
        // Get User IP Address
    // if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    //     $IpAddress = $_SERVER['HTTP_CLIENT_IP'];
    // } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    //     $IpAddress = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    // } else {
    //     $IpAddress = $_SERVER['REMOTE_ADDR'];
    // }


        // Get user IP address (IPv4 or IPv6)
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $IpAddress = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $IpAddress = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    } else {
        $IpAddress = $_SERVER['REMOTE_ADDR']; // Can be IPv4 or IPv6 (::1 locally)
    }

    $select = "SELECT email_id FROM assdt_users WHERE email_id = ?";
    $stmt = $conn->prepare($select);
    $stmt->execute([$Email]);


    $existingUsers = $stmt->fetch(PDO::FETCH_ASSOC);

    $response = [];

    if($existingUsers){
        $response["status"] = "Faiiled";
        $response["message"] = "Email id already exists";
    }
    else{
     $sql = "INSERT INTO assdt_users
            (full_name, email_id, mobile_number, password, created_on, last_login_ip, is_active)
            VALUES (?, ?, ?, ?, NOW(), ?, ?)";

    $stmt = $conn->prepare($sql);
 
     $success = $stmt->execute([
        $Name,
        $Email,
        $Phone,
        $Password,
        $IpAddress,
        'ACTIVE'
    ]);



    if($success){
        $response["status"] = "success";
        $response["message"] = "Registration Successful";
    }
    else{
        $response["status"] = "failed";
        $response["message"] = "Something went wrong";
    }
    }

    echo json_encode($response);
}


else if ($Flag == "Login") {

    $response = [];

    $Email = $data["Email"] ?? '';
    $Password = $data["Password"] ?? '';

    $select = "SELECT * FROM assdt_users WHERE email_id = ? AND is_active = 'ACTIVE' LIMIT 1";

    $stmt = $conn->prepare($select);

    $stmt->execute([$Email]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if($result){
            // Verify Password
            if(password_verify($Password,$data["Password"])){
                $_SESSION["user_id"] = $result["user_id"];
                $_SESSION["username"] = $result["full_name"];

                $response["status"] = "Success";
                $response["message"] = "Login Successfully";
            }
            else{
                $response["status"] = "Failed";
                $response["message"] = "Invalid Password";
            }
        }
        else{
            $response["status"] = "Failed";
            $respons["message"] = "Invalid Email";
        }


    //md5()

    // if ($stmt->execute([$Email, $Password])) {

    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //     if ($result) {

    //         $_SESSION['user_id'] = $result['id'];
    //         $_SESSION['username'] = $result['full_name'];

    //         $response['message'] = "Logged in successfully";
    //         $response['status'] = "success";

    //     } else {

    //         $response['message'] = "Please Check Your Credentials!";
    //         $response['status'] = "failed";
    //     }

    // } else {

    //     $response['message'] = "Database query failed";
    //     $response['status'] = "failed";
    // }

    echo json_encode($response);
}


// else if ($Flag == "show-date-wise") {

//     $toDate = $data["ToDate"] ?? '';
//     $fromDate = $data["FromDate"] ?? '';

//     $response = [];

//     $query = "SELECT * 
//               FROM assdt_service_consumption_table
//               WHERE DATE(req_dt) BETWEEN ? AND ? LIMIT 10000";

//     $stmt = $conn->prepare($query);

//     if ($stmt->execute([$fromDate, $toDate])) {

//         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//         if ($result) {

//             $response['message'] = "Data Fetched";
//             $response['status'] = "success";
//             $response['data'] = $result;

//         } else {

//             $response['message'] = "No Data Found";
//             $response['status'] = "failed";
//             $response['data'] = [];
//         }

//     } else {

//         $response['message'] = "Query Failed";
//         $response['status'] = "failed";
//     }

//     echo json_encode($response);
// }

else if ($Flag == "show-date-wise") {

    $request = $data;

    $start = $request['start'] ?? 0;
    $length = $request['length'] ?? 25;

    $fromDate = $request['FromDate'] ?? '';
    $toDate = $request['ToDate'] ?? '';

    $where = "";

    $params = [];

    if (!empty($fromDate) && !empty($toDate)) {

        $where = " WHERE DATE(req_dt) BETWEEN ? AND ? ";
        $params[] = $fromDate;
        $params[] = $toDate;
    }

    $query = "
        SELECT *
        FROM assdt_service_consumption_table
        $where
        ORDER BY id DESC
        LIMIT $start, $length
    ";

    $stmt = $conn->prepare($query);
    $stmt->execute($params);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Total Records
    $totalQuery = "SELECT COUNT(*) as total FROM assdt_service_consumption_table $where ";

    $totalStmt = $conn->prepare($totalQuery);
    $totalStmt->execute($params);

    $totalData = $totalStmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode([
        "draw" => intval($request['draw']),
        "recordsTotal" => intval($totalData['total']),
        "recordsFiltered" => intval($totalData['total']),
        "data" => $result
    ]);
}
?>