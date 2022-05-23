<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EU</title>
    <link href="../css/comments.css" rel="stylesheet" type="text/css">
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
    <div class="center_canvas_php">
        <h1>Comment</h1>
        <hr >
        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. 
            It has roots in a piece of classical Latin literature from 45 BC, 
            making it over 2000 years old. Richard McClintock, a Latin professor 
            at Hampden-Sydney College in Virginia, looked up one of the more 
            obscure Latin words, consectetur, from a Lorem Ipsum passage, and 
            going through the cites of the word in classical literature, 
            discovered the undoubtable source.
        </p>
    </div>
    <div class="form">
        <form class="comment" onsubmit = "return validateComment();" method="POST" action="commentsForm.php" id="commentForm">
            <label class="username">User Name<br>
                <input type="text" class="username_input" name="username">
            </label><br>
            <label class="message">Message<br>
                <textarea class="message_input" name="message"></textarea><br>
            </label>
            <p class="error">Introduceti comentariu!</p>
            <input type="submit" class="subBtn" value ="Trimite">
        </form>
    </div>
    <div class="comments">
        <?php
        $existing_file = file_get_contents("json/comments.json");
        $array_content = json_decode($existing_file);
        $max = count($array_content);
        for ($row = $max-1; $row > -1; $row--){
            echo '
            <div class="comm">
                <h2 class="cName">'.$array_content[$row][0].' : </h2>
                <p class="cMessage">'.$array_content[$row][1].'</p>
            </div>
            ';
        }
        ?>
    </div>

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
<script src="/scripts/validate.js"></script>
<script src="/scripts/jquery.js"></script>
<script src="/scripts/ajax.js"></script>
</body>
</html>



