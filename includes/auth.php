<?php

require_once '../config/db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.html");
    exit;
}

?>