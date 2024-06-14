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
    <table class="table-bordered table-striped">
        <tr>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Address</td>
            <td>Contact</td>
            <td width="70px">Delete</td>
            <td widht="70px">EDIT</td>
        </tr>
<?php
while($row=$result->fetch_assoc()){
    echo"<tr>";
    echo"td".$row['firstname']."</td>";
    echo"td".$row['lastname']."</td>";
    echo"td".$row['address']."</td>";
    echo"td".$row['contact']."</td>";
    echo"<td><input type='submit' name='delete' value='delete' class='btn btn-danger'></td>";
    echo"<td><a href='edit.php?id=".$row['user_id']."'class=info>Edit</a></td>";
    echo"</tr>";
    echo"</form>";//added
}
?>
</table>
<?php
}
else
{
    echo"<br><br>No Record Found";
}
?>
</div>
<?php
require_once 'footer.php';