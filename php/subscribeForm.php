<?php
$username =  "";
$email = "";
$country = "";
$information = "";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    function formatData($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        return $data;
    }

    $username = formatData($_POST['username']);
    $country = formatData($_POST['country']);
    $information = formatData($_POST['info']);
    $email = formatData($_POST['email']);
    if (strlen($email) > 0){
        if (strlen($username) > 0){
            $file = file_get_contents("json/subscribe.json");
            $array_data = json_decode($file);
            $my_data = array($username, $email, $country, $information);
            $array_data[] = $my_data;
            $generate_file = json_encode($array_data, JSON_PRETTY_PRINT);
            file_put_contents("json/subscribe.json", $generate_file);
            echo "
        <script>
            window.location.href = 'subscribe.php';
        </script>
        ";
        }
    }
}
