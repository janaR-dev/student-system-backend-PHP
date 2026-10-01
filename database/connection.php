<?php


// function connection(): PDO
// {
//     $DSN = 'mysql:host=localhost;dbname=register';
//     $username = 'root';
//     $Passwoed = '';
//     try {
//         $DB = new PDO($DSN, $username, $Passwoed);
//         $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         $DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//     } catch (PDOException $e) {
//         echo "DATA CONNECTION FAILD:{$e->getMessage()}";

//         exit;
//     };
//     return $DB;
// }



function connection(): PDO
{
   
    $host     = 'fdb1029.awardspace.net';
    $dbname   = '4793718_studentsystemphp';
    $username = '4793718_studentsystemphp'; 
    $password = '12332112mM-';

    $DSN = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";

    try {
        $DB = new PDO($DSN, $username, $password, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
        return $DB;
    } catch (PDOException $e) {
        echo "DATABASE CONNECTION FAILED: " . $e->getMessage();
        exit;
    }
}