<?php
include 'conf.php';
$c_id = $_GET['course_id'];
if(isset($_POST['save_course'])) {
    
    $c_name = $_POST['course_name'];
    $c_details = $_POST['details'];

    $edit = mysqli_query($conn, "UPDATE courses SET course_name='$c_name', details='$c_details' WHERE course_id='$c_id'");
    header("location:course.php");
}
$dis=mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$c_id ' ");
while($data=mysqli_fetch_array($dis)){
  $c_name=$data[1];
  $c_details=$data[2];
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
    <fieldset>
        <legend>ADD COURSE</legend>
        <input type="hidden" name="id" value="<?php echo $c_id; ?>">
        <div class="reg_course">
            <label for="">Course Name</label>
            <input type="text" name="course_name" value="<?php echo $c_name; ?>">
            <br>
            <label for="">Course Details</label>
            <input type="text" name="details" value="<?php echo $c_details; ?>">
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
                $all=mysqli_query($conn,"SELECT * FROM courses");
                while ($row=mysqli_fetch_assoc($all)) {
                    ?>
                    <tr>
                        <td><?php echo $row['course_id']?></td>
                        <td><?php echo $row['course_name']?></td>
                        <td><?php echo $row['details']?></td>
                        <td>
                            <?php echo "<a href='editcourse.php?course_id=$row[course_id]'>Edit</a>"; ?>
                        </td>
                        <td>
                            <?php echo "<a href='deletecourse.php?course_id=$row[course_id]'>Delete</a>"; ?>
                        </td>
                    </tr>
                <?php  
                }
                ?>
            </table>
        </div>
    </fieldset>
    </form>
</body>
</html>
