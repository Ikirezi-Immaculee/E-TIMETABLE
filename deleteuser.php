<?php
include 'conf.php';
?>
<?php
if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
    $query=mysqli_query($conn,"delete from user where user_id=$user_id;");
}
header("location:user.php");
?>