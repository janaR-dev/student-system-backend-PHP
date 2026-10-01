<?php
function pr(mixed $data, bool $die = false){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    if($die){
        exit;
    }
}

function throwError(int $code, string $message){
    http_response_code($code);
    echo $message;
    exit;
}

function throw_API_error(int $code, string $message){
    http_response_code($code);
    echo json_encode([
        "status" => $code,
        "message" => $message
    ]);
    exit;
}

function back(){
    $path = $_SERVER['HTTP_REFERER'];
    header("Location: {$path}");
    exit;
}

?>