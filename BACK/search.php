<?php
require_once __DIR__."/get_student.php";
require_once __DIR__."/helpers.php";
header("Content-Type: application/json; charset=UTF-8");
if($_SERVER["REQUEST_METHOD"] !== 'POST')
{
    throw_API_error(405, "method is not allowed");

}
if(!isset($_POST['search'])){
    throw_API_error(422, "unprocessable Entity");
}
$students = getStudent($_POST['search'], 1);

echo json_encode($students);
exit;

?>