<?php
require_once __DIR__ . "/helpers.php";
require_once __DIR__ . "/validation.php";
require_once __DIR__ . "/../database/connection.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] !== 'POST') {
    throwError(405, "method is not allowed");
}


$_SESSION['_old'] =$_POST;
$_SESSION['_errors'] =[];


Edit_validate();

$DB = connection();
$passEdit = '';
if(isset($_POST['password']) && !empty($_POST['password'] )){
    $hashedpass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $passEdit = "password = '{$hashedpass}',";
}

$DB->exec("UPDATE students SET 
                first_name = '{$_POST['firstName']}',
                last_name = '{$_POST['lastName']}',
                email = '{$_POST['email']}',
                {$passEdit}
                age = '{$_POST['age']}',
                phone = '{$_POST['phone']}'
                WHERE id = '{$_POST['student_id']}';


");
$_SESSION['_old'] =[];

header("Location: ../index.php")

?>