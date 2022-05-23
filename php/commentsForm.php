<?php
$username =  "";
$message = "";

function formatData($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripcslashes($data);
    return $data;
}

$username = formatData($_POST['username']);
$message = formatData($_POST['message']);
if (strlen($message) > 0){
    if (strlen($username) < 1){
        $username = 'Anonym';
    }
    $file = file_get_contents("json/comments.json");
    $array_data = json_decode($file);
    $my_data = array($username, $message);
    $array_data[] = $my_data;
    $generate_file = json_encode($array_data, JSON_PRETTY_PRINT);
    file_put_contents("json/comments.json", $generate_file);
    echo true;
}
else{
    echo false;
}
