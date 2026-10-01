<?php


function connection(): PDO
{
    $DSN = 'mysql:host=localhost;dbname=register';
    $username = 'root';
    $Passwoed = '';
    try {
        $DB = new PDO($DSN, $username, $Passwoed);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "DATA CONNECTION FAILD:{$e->getMessage()}";

        exit;
    };
    return $DB;
}
