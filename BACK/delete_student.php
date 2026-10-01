<?php
require_once __DIR__."/helpers.php";
require_once __DIR__."/../database/connection.php";
require_once __DIR__."/get_student.php";
header("Content-Type: application/json; charset-UTF-8");


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    throw_API_error(405, "Method is not allowed");
}


if(!isset($_POST['student_id'])){
    throw_API_error(422, "unprocessable Entity");
}

try {
    $DB = connection();

    $DB->exec("DELETE FROM students WHERE id ='{$_POST['student_id']}'
;");
    echo json_encode([
        "status" => "success",
        "message" => "Student deleted successfully"
    ]);
    exit;

} catch (PDOException $e) {
    throw_API_error(500, "Database error: " . $e->getMessage());
}





?>