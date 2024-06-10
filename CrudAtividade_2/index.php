<?php
Author:samuel
require_once 'header.php';
?>
<div class="container">
    <div class="jumbotron">
    <h1>Basic CRUD in PHP</h1>
    </div>
    </div>
<?php
require_once 'connect.php';
require_once 'header.php';
?>
<div class="container">
    <?php
    if(isset($_POST['addnew'])){
        if(empty($_POST['firstname']) || empty($_POST['contact']) ){
            echo "Please fillout all required fields";
        }else{
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $address = $_POST['address'];
            $contact = $_POST['contact'];
            $sql = "INSERT INTO user(firstname,lastname,address,contact)
            VALUES('$firstname','$lastname','$address','$contact')";
                if($con->query(sql)===TRUE){
                    echo "<div class='alert alert-success'>Successfully added new user</div>";
                }
        }
    }
</div>