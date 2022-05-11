<?php
$fName = "";
$sName = "";
$email = "";
$phone = "";
$message = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
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
                    echo "
                    <script>
                        window.location.href = 'contacts.php';
                    </script>
                    ";
                }
            }
        }
    }
    if (strlen($message) < 1) {
        $message = " ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EU</title>
    <link href="../css/contact.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../images/Eur.png" type="image/x-icon">

</head>
<body>
<button id="upBtn" onclick="scrollBack()"><img src="/images/buttonUp.png" alt="buttonUp"></button>
<header>
    <a href="../index.html" class="header_logo_text" >
        <img src="../images/EuropeanS.png" alt="European_union_flag" class="header_logo_image">
        European Union
    </a>
    <nav >
        <a href="../html/map.html" class="nav_link">Map</a>
        <a href="../html/country.html" class="nav_link">Country</a>
        <a href="../html/culture.html" class="nav_link">Culture</a>
    </nav>
</header>
<div class="back_canvas_php">
    <form class="card" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Contact Us</h2>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="fName">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Surname</label>
                    <input type="text" name="sName">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Message</label>
                    <textarea class="message_input" name="message"></textarea>
                </div>
            </div>
            <div class="col">
                <input type="submit" value="Submit">
            </div>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST"){
                $fName = formatData($_POST['fName']);
                $phone = formatData($_POST['phone']);
                $email = formatData($_POST['email']);
                $sName = formatData($_POST['sName']);
                $message = formatData($_POST['message']);
                if (strlen($fName) < 1){
                    echo ' <p class="error">Introduceti prenumele!</p>';
                }
                if (strlen($sName) < 1){
                    echo ' <p class="error">Introduceti numele!</p>';
                }
                if (strlen($email) < 1){
                    echo ' <p class="error">Introduceti email!</p>';
                }
                if (strlen($phone) < 1){
                    echo ' <p class="error">Introduceti telefonul!</p>';
                }
                if (strlen($message) < 1){
                    echo ' <p class="error">Introduceti mesajul!</p>';
                }
            }
            ?>
        </div>
    </form>
</div>
<footer class="footer">
    <nav class="nav_footer">
        <a class="a_footer" href="../php/contacts.php">Contacts</a>
        <a class="a_footer" href="../php/subscribe.php">Subscribe</a>
        <a class="a_footer" href="../php/comments.php">Comments</a>
    </nav>
    <p class="p_footer">&#169 Galinschii Ion IA-211</p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21818128.107613463!2d4.113195771301079!3d48.12285598107331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46ed8886cfadda85%3A0x72ef99e6b3fcf079!2z0JXQstGA0L7Qv9Cw!5e0!3m2!1sru!2s!4v1650434562089!5m2!1sru!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</footer>
<script src="/scripts/scrollBack.js"></script>
</body>
</html>


