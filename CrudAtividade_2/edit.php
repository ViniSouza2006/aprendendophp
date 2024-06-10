<?php
require_once'connect.php';
require_once'header.php';
?>
<div class="container">
    <?php
        if(isset($_POST['update'])){
            if(empty($_POST['firstname']) || empty($_POST['lastname']) ||
                empty($_POST['address']) || empty($_POST['contact']))
            {
                echo"Please fillout all required fields";
            }else{
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $address = $_POST['address'];
                $contact = $_POST['contact'];
                $sql = "UPDATE users SET firstname='{$firstname}',lastname='{$lastname}',
                address='{$address}',contact='{$contact}' WHERE user_id=".$_POST['userid']
                if($con->query($sql)===TRUE){
                    echo"<div class='alert alert-success'>Successfully updated user</div>";
                    }else{
                        echo "<div class='alert alert=success'>"
                }
            }    
        }