<?php
include 'conf.php';
?>
<?php
if(isset($_GET['course_id'])){
    $c_id=$_GET['course_id'];
    $query=mysqli_query($conn,"delete from courses where course_id=$c_id;");
}
header("location:course.php");
?>