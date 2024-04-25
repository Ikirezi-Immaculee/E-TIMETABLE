<?php
include 'conf.php';
?>
<?php
if(isset($_POST['save_course'])){
$class_name=$_POST['class_name'];
$details=$_POST['details'];
$query=mysqli_query($conn,"insert into classroom VALUES('','$class_name','$details');");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-TIMETABLE/CLASSROOM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="head">
        <h1>ELECTRONIC TIMETABLE</h1>
      </div>
      <div class="nav">
          <ul>
        <li ><a href="user.php">USER</a></li>
       <li> <a href="course.php">COURSE</a></li>
<li> <a href="period.php">PERIOD</a></li>
      <li id="act">  <a href="class.php">CLASSROOM</a></li>
        <li><a href="timetable.php">TIMETABLE</a></li>
      </ul>-
      </div>
    <form action="" method="POST">
    <FIeldset>
      <legend>
        ADD CLASSROOM
      </legend>
      <div class="reg_course">
        <label for="">Class Name</label>
        <input type="text" name="class_name">
        <br>
        <label for="">Details</label>
        <input type="text" name="details">
        <br>
        <input type="submit" value="SAVE" name="save_course">
      </div>
      <div class="view_course">
        <table>
            <tr>
                <th>Class_id</th>
                <th>Class_name</th>
                <th>Details</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        <?php
        $all=mysqli_query($conn,"select * from classroom");
        while ($row=mysqli_fetch_assoc($all)) {
           ?>
           <tr>
            <td><?php echo $row['class_id']?></td>
            <td><?php echo $row['class_name']?></td>
            <td><?php echo $row['details']?></td>
           <td>
            <?php
             echo " <a href='editclass.php?class_id=$row[class_id]'>Edit</a>" ;
            ?>
           </td>
           <td>
            <?php
             echo " <a href='deleteclass.php?class_id=$row[class_id]'>Delete</a>" ;
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
</body>
</html>