<?php
include 'conf.php';
?>
<?php
if(isset($_POST['save_course'])){
$c_name=$_POST['course_name'];
$c_details=$_POST['course_details'];
$query=mysqli_query($conn,"insert into courses VALUES('','$c_name','$c_details');");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-TIMETABLE/COURSE</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="head">
        <h1>ELECTRONIC TIMETABLE</h1>
      </div>
      <div class="nav">
          <ul>
        <li ><a href="user.php">USER</a></li>
       <li id="act"> <a href="course.php">COURSE</a></li>
<li> <a href="period.php">PERIOD</a></li>
      <li>  <a href="class.php">CLASSROOM</a></li>
        <li><a href="timetable.php">TIMETABLE</a></li>
      </ul>
      </div>
    <form action="" method="POST">
    <FIeldset>
      <legend>
        ADD COURSE
      </legend>
      <div class="reg_course">
        <label for="">Course Name</label>
        <input type="text" name="course_name">
        <br>
        <label for="">Course Details</label>
        <input type="text" name="course_details">
        <br>
        <input type="submit" value="SAVE" name="save_course">
      </div>
      <div class="view_course">
        <table>
            <tr>
                <th>Course_id</th>
                <th>Course_name</th>
                <th>Details</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        <?php
        $all=mysqli_query($conn,"select * from courses");
        while ($row=mysqli_fetch_assoc($all)) {
           ?>
           <tr>
            <td><?php echo $row['course_id']?></td>
            <td><?php echo $row['course_name']?></td>
            <td><?php echo $row['details']?></td>
           <td>
            <?php
             echo " <a href='editcourse.php?course_id=$row[course_id]'>Edit</a>" ;
            ?>
           </td>
           <td>
            <?php
             echo " <a href='deletecourse.php?course_id=$row[course_id]'>Delete</a>" ;
            ?>
           </td>
           </tr>
         <?php  
        }
        ?>
        </table>
      </div>
    </FIeldset>
    </form>
    <div class="foot">
        WMHS &copy 2024 ,all right reserved
    </div>
</body>
</html>