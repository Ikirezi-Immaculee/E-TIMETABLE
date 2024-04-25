<?php
include 'conf.php';
?>
<?php
if(isset($_GET['timetable_id'])){
    $t_id=$_GET['timetable_id'];
    $query=mysqli_query($conn,"delete from timetable where timetable_id=$t_id;");
}
header("location:timetable.php");
?>