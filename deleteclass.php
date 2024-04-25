<?php
include 'conf.php';
?>
<?php
if(isset($_GET['class_id'])){
    $class_id=$_GET['class_id'];
    $query=mysqli_query($conn,"delete from classroom where class_id=$class_id;");
}
header("location:class.php");
?>