<?php
include 'conf.php';
?>
<?php
if(isset($_POST['save_course'])){
$class_id=$_POST['class_id'];
$course_id=$_POST['course_id'];
$period_id=$_POST['period_id'];
$user_id=$_POST['user_id'];
// $query=mysqli_query($conn,"insert into timetable VALUES('','$class_id','$course_id','$period_id','$user_id');");
// $query=mysqli_query($conn,"CREATE VIEW timetable1 AS
// SELECT $class_id,$course_id,$period_id,$user_id
// FROM classroom,courses,period,user");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-TIMETABLE/TIMETABLE</title>
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
      <li>  <a href="class.php">CLASSROOM</a></li>
        <li id="act"><a href="timetable.php">TIMETABLE</a></li>
      </ul>
      </div>
    <form action="" method="POST">
    <FIeldset>
      <legend>
        VIEW TIMETABLE
      </legend>
      <!-- <div class="reg_course">
        <label for="">Class_id</label>
        <input type="text" name="class_id">
        <br>
        <label for="">Course_id</label>
        <input type="text" name="course_id">
        <br>
        <label for="">Period_id</label>
        <input type="text" name="period_id">
        <br>
        <label for="">User_id</label>
        <input type="text" name="user_id">
        <br>
        <input type="submit" value="SAVE" name="save_course">
      </div> -->
      <div class="view_course">
        <table>
            <tr>
                <th>Timetable_id</th>
                <th>User Name</th>
                <th>Course Name</th>
                <th>Period_date</th>
                <th>Period_start</th>
                <th>Period_end</th>
                <th>Status</th>
            </tr>
        <?php
        $query="select courses.course_name,period.period_date,period.period_start,period.period_end,classroom.class_name,user.name,user.status FROM courses,period,classroom,user";
        $all=mysqli_query($conn,$query);
        $id = 1;
        while ($row=$all->fetch_assoc() ){
           ?>
           <tr>
            <td><?php echo $id++;?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['course_name']?></td>
            <td><?php echo $row['period_date']?></td>
            <td><?php echo $row['period_start']?></td>
            <td><?php echo $row['period_end']?></td>
            <td><?php echo $row['status']?></td>
            <!-- <td><a href="edit.php?course_id=<?php $row[timetable_id]; ?>">edit</a></td> -->
            <td><a href="delete.php">delete</a></td>

           <td>
            <?php
            //  echo " <a href='edittimetable.php?timetable_id=$row[timetable_id]'>Edit</a>" ;
            ?>
           </td>
           <td>
            <?php
            //  echo " <a href='deletetimetable.php?time=$row[timetable_id]'>Delete</a>" ;
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