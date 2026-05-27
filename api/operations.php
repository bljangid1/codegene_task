<?php

require_once '../config/db.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=utf-8');

$json = file_get_contents("php://input");
$data = json_decode($json, true);

$Flag = $data['Flag'] ?? '';

if ($Flag == "Login") {

    $response = [];

    $Email = $data["Email"] ?? '';
    $Password = $data["Password"] ?? '';

    $select = "SELECT * FROM assdt_users WHERE email_id = ? AND password = MD5(?) AND is_active = 'ACTIVE' LIMIT 1";

    $stmt = $conn->prepare($select);

    if ($stmt->execute([$Email, $Password])) {

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {

            $_SESSION['user_id'] = $result['id'];
            $_SESSION['username'] = $result['full_name'];

            $response['message'] = "Logged in successfully";
            $response['status'] = "success";

        } else {

            $response['message'] = "Please Check Your Credentials!";
            $response['status'] = "failed";
        }

    } else {

        $response['message'] = "Database query failed";
        $response['status'] = "failed";
    }

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