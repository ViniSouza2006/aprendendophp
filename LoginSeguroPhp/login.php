<?php
    include_once'includes/db_connect.php';
    include_once'includes/functions.php';

    sec_session_start();

    if(login_check($mysqli)==true){
        $logged='in';
    }else{
        $logged='out';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/main.css"/>
    <script type="text/JavaScript" scr="js/sha512.js"></script>
    <script type="text/JavaScript" scr="jsforms.js"></script>
</head>
<body>
    <?php
    if(isset($_GET['error'])){
        echo'<p class="error">Error ao fazer o login!</p>';
    }
    ?>
    <form action="includes/process_login.php" method="post" name="login_form">
        <label for="">Email:</label>
        <input type="text" name="email">
        <label for="">Password</label>
        <input type="password" name="password" id="password">
        <input type="button" value="Login" onclick="formhash(this.form, this.form.password);">
        <input type="button" 
        value="Login" 
        onclick="formhash(this.form, this.form.password);">

    </form>
    <p>If you don't have a login, please <a href="register.php">Register</a></p>
    <p>If you are done, please <a href="includes/logout.php">Log Out</a>.</p>
    <p>You are currently Logged <?php echo $logged ?>.</p>
</body>
</html>