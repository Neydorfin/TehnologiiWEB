<?php
$fName = "";
$sName = "";
$email = "";
$phone = "";
$message = "";

function formatData($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripcslashes($data);
    return $data;
}
$fName = formatData($_POST['fName']);
$sName = formatData($_POST['sName']);
$email = formatData($_POST['email']);
$phone = formatData($_POST['phone']);
$message = formatData($_POST['message']);
if (strlen($message) < 1) {
    $message = " ";
}
if (strlen($fName) > 0){
    if (strlen($sName) > 0){
        if (strlen($email) > 0){
            if (strlen($phone) > 0){

                $file = file_get_contents("json/contacts.json");
                $array_data = json_decode($file);
                $my_data = array($fName, $sName, $email, $phone, $message);
                $array_data[] = $my_data;
                $generate_file = json_encode($array_data, JSON_PRETTY_PRINT);
                file_put_contents("json/contacts.json", $generate_file);
                echo true;
            }
        }
    }
}
else{
    echo false;
}


