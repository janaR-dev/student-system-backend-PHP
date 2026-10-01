<?php
require_once __DIR__ . "/helpers.php";
require_once __DIR__ . "/../database/connection.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] !== 'GET') {
    throwError(405, "method is not allowed");
}

if (!isset($_GET['student_id'])) {
    throwError(422, "unprocessable Entity");
}




    $DB = connection();

    $stmt = $DB->query("SELECT 
                        id,
                        first_name AS firstName,
                        last_name AS lastName,
                        email,
                        age,
                        phone
                        FROM students WHERE id = '{$_GET['student_id']}' ;");
    
    $result = $stmt->fetch();

    if (empty($result)) {
        throwError(422, "invalid ID");
    }

    $_SESSION['_old'] =  $result;

