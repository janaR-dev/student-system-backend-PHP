<?php
require_once __DIR__."/../BACK/get_student.php";

$page = 1;
if(isset($_GET['page']) && $_GET['page']> 1){
$page = $_GET['page'];
}

$students = getStudent("", $page);

$container = "";

foreach($students as $student){
    $shortenedPass = substr($student['password'], 0, 15);
    $container .= "
    <tr data-student-id='{$student['id']}'>
                            <th>{$student['id']}</th>
                            <td>{$student['first_name']}</td>
                            <td>{$student['last_name']}</td>
                            <td>{$student['email']}</td>
                            <td>{$shortenedPass}...</td>
                            <td>{$student['age']}</td>
                            <td>{$student['phone']}</td>
                            <td>
                                 <a href='editStudentPage.php?student_id={$student['id']}' class='btn btn-info text-light me-2' >Edit</a>
                                <button class='btn btn-danger' onclick='delete_student({$student['id']})' >Delete</button>
                            </td>
                        </tr>
    
    
    ";
}
echo $container;
?>