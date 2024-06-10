<?php
$error=filter_input(INPUT_GET,'err',$filter=FILTER_SANITIZE_STRING);

if(!$error){
    $error='Oops! an Unknown error happened.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Secure:Error</title>
    <link rel="stylesheet" href="style/main.css">
</head>
<body>
    <h1>There was a problem</h1>
    <p class="error"><?php echo $error; ?></p>
</body>
</html>
