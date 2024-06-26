<?php
include_once 'db_connect.php';
include_once 'psl-config.php';

$error_msg = "";

if(isset($_POST['username'],$_POST['email'],$_POST['p'])){
    $username =filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email =filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email =filter_var($email, FILTER_VALIDATE_EMAIL);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error_msg.='<p class="error">O endereço de email digitado não é válido</p>';
    }
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if(strlen($password) !=128){
        //A senha com hash deve ter 128 caracteres.
        //Caso contário, algo muito estranho está acontecendo
        $error_msg.='<p class="error">invalid password configuration.</p>'; 
    }
    //O nome de usuário e a validade da senha foram conferidas no lado do cliente.
    //Nâo deve haver problemas nesse passo já que ninguém ganha
    //violando essas regras.
    //
    $prep_stmt="SELECT id FROM members WHERE email = ?LIMIT 1";
    $stmt=$mysql->prepare($prep_stmt);

    if($stmt){
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows==1){
            //Um usuário com esse email já existe 
            $error_msg.='<p class="error">A user with this email address already exists.</p>';
        }
    }else{
        $error_msg.='<p class="error">Database error</p>';
    }
    //LISTA DE TAREFAS:
    //Precisamos bolar soluções para quando o usuário não tem
    //direto a se registrar, verificado que tipo de usuário está tentando
    //realizar a operação.

    if(empty($error_msg)){
        //Crie um salt aleatório
        $random_salt=hash('sha512',uniqid(openssl_random_pseudo_byte(16),true));

        //Crie uma senha com salt
        $password = hash('sha512',$password . $random_salt);

        //Inserir o novo usuário no banco de dados
        if($insert_stmt = $mysqli->prepare("INSERT INTO members(username, email, password, salt) VALUE(?,?,?,?)")){
            $insert_stmt->bind_param('ssss',$username,$email,$password,$random_salt);
            //Execute a tarefa pré-estabelecida.
            if(!$insert_stmt->execute()){
                header('Location:../error.php?err=Registration failure:INSERT');
            }
        }
        header('Location:./register_sucess.php');
    }
}