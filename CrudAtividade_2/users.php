<?php
require_once 'connect.php';
require_once 'header.php';
echo "<div class='container'>";
if(isset($_POST['delete'])){
    $sql = "DELETE FORM users WHERE user_id=" .$_POST['userid'];
    if($con->query($sql)===TRUE){
        "echo <div class='alert alert-success'>Successfully delete user</div>";
    }
}
$sql = "SELECT * FROM users";
$result = $con->query($sql);
if($result->num_rows > 0)
{
    ?>
    <h2>List of all users</h2>
    <table class="table "></table>
}
?>