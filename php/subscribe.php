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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EU</title>
    <link href="../css/subscribe.css" rel="stylesheet" type="text/css">
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
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form">
        <label class="formElem">UserName<br>
            <input type="text" class="username_input" name="username">
        </label><br>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $username = formatData($_POST['username']);
            if (strlen($username) < 1){
                echo ' <p class="error">Introduceti numele!</p>';
            }
        }
        ?>
        <label class="formElem">Email<br>
            <input type="text" class="email_input" name="email">
        </label><br>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $email = formatData($_POST['email']);
            if (strlen($email) < 1){
                echo ' <p class="error">Introduceti email!</p>';
            }
        }
        ?>
        <div class="combobox">
            <label class="comboEl">Country:
                <br>
                <select required name="country" class="country">
                    <option value="" hidden>Country</option>
                    <option value="Austria">Austria</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czechia">Czechia</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="Germany">Germany</option>
                    <option value="Greece">Greece</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Italy">Italy</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Malta">Malta</option>
                    <option value="Netherlands">Netherlands</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Romania">Romania</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Spain">Spain</option>
                    <option value="Sweden">Sweden</option>
                </select>
            </label>
            <label class="comboEl">Information:
                <br>
                <select required name="info" class="info">
                    <option value="" hidden>Information</option>
                    <option value="Culture">Culture</option>
                    <option value="History">History</option>
                    <option value="Economy">Economy</option>
                    <option value="Science">Science</option>
                </select>
            </label>
        </div>
        <input type="submit" class="subBtn" value ="Submit">
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


