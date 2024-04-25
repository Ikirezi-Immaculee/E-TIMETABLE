<?php
include 'conf.php';
?>
<?php
if(isset($_GET['period_id'])){
    $p_id=$_GET['period_id'];
    $query=mysqli_query($conn,"delete from period where period_id=$p_id;");
}
header("location:period.php");
?>