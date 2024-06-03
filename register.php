<?php
include_once 'includes/register.inc.php';
include_once 'includes/register.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Login: Registration Form</title>
    <script type="text/JavaScript" src="js/sha512.js"></script>
    <script type="text/JavaScript" scr="js/forms.js"></script>
    <link rel="stylesheet" href="styles/main.css"/>
</head>
<body>
    <!-- Registration form to be output if the POST variable are not set or if the registration script caused an error. -->
    <h1>Register with us</h1>
    <?php
    if (!empty($error_msg)){
        echo $error_msg;
    }
    ?>
    <ul>
        <li>Os nome de úsuario devem conter apenas dígitos, letras maiúsculas e minúsculas e underlines ("_")
        <li>Emails devem seguir um formato válido para email.
        <li>As senhas devem ter no mínimo 6 caracteres.
        <li>As senhas devem conter
        <ul>
            <li>Pelo menos uma letra maiúscula (A..Z)</li>
            <li>Pelo menos uma letra minúscula (a..z)</li>
            <li>Pelo menos um número (0..9)</li>
        </ul>
        <li>Sua senha deve conferir exatamente</li>
        </ul>
        <form action="<?php echo esc_url($_SEVER['PHP_SELF']);?>">
            method="post"
            name="registration_form">
        Username: <input type='text'
            name='username'
            id='username'/><br>
            Email:<input type="text" name="email" id="email"/><br>
            Password: <input type="password"
                name="password"
                id="password"/><br>
            Confirm password: <input type="password"
                name="confirmpwd"
                id="confirmpwd"/><br>
            <input type="button"
            value="Register"
            onclick="return regformhash(this.form,
                this.form.username,
                this.form.email,
                this.form.password,
                this.form.confirmpwd);"/>
        </form>
        <p>Return to the <a href="index.php">Login page</a>.</p>
</body>
</html>

