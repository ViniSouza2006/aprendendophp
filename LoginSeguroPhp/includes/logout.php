<?php
include_once 'include/functions.php';
sec_session_start();
$_SESSION = array();
//obtém os parâmetros da sessão
$params = session_get_cookie_params();
//deleta o cookie em uso
setcookie(session_name(),"",time()-42000,
$params["path"],
$params["domain"],
$params["secure"],
$params["httponly"]);

//Déstroi a sessão
session_destroy();
header('Location:../index.php');
?>