<?php 


require_once __DIR__.'/connection.php';


   

try {
    $DB = connection();

    $sql = "CREATE TABLE IF NOT EXISTS students (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(255) NOT NULL,
        last_name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        age INT NOT NULL,
        password VARCHAR(255) NOT NULL,
        phone VARCHAR(255) NOT NULL UNIQUE
    );";

    $DB->exec($sql);
    
} catch (PDOException $e) {
    echo "Error creating table: " . $e->getMessage();
}