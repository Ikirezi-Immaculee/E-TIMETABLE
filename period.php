<?php
include 'conf.php';
?>
<?php
if(isset($_POST['save_course'])){
$p_date=$_POST['period_date'];
$p_start=$_POST['period_start'];
$p_end=$_POST['period_end'];
$details=$_POST['details'];
$query=mysqli_query($conn,"insert into period VALUES('','$p_date','$p_start','$p_end','$details');");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-TIMETABLE/PERIOD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="head">
        <h1>ELECTRONIC TIMETABLE</h1>
      </div>
      <div class="nav">
          <ul>
        <li><a href="user.php">USER</a></li>
       <li> <a href="course.php">COURSE</a></li>
<li id="act"> <a href="period.php">PERIOD</a></li>
      <li>  <a href="class.php">CLASSROOM</a></li>
        <li><a href="timetable.php">TIMETABLE</a></li>
      </ul>
      </div>
    <form action="" method="POST">
    <FIeldset>
      <legend>
        ADD PERIOD
      </legend>
      <div class="reg_course">
        <label for="">Period Date</label>
        <input type="date" name="period_date">
        <br>
        <label for="">Period Start</label>
        <input type="text" name="period_start">
        <br>
        <label for="">Period End</label>
        <input type="text" name="period_end">
        <br>
        <label for="">Details</label>
        <input type="text" name="details">
        <br>
        <input type="submit" value="SAVE" name="save_course">
      </div>
      <div class="view_course">
        <table>
            <tr>
                <th>Period_id</th>
                <th>Period_date</th>
                <th>Period_start</th>
                <th>Period_end</th>
                <th>Details</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        <?php
        $all=mysqli_query($conn,"select * from period");
        while ($row=mysqli_fetch_assoc($all)) {
           ?>
           <tr>
            <td><?php echo $row['period_id']?></td>
            <td><?php echo $row['period_date']?></td>
            <td><?php echo $row['period_start']?></td>
            <td><?php echo $row['period_end']?></td>
            <td><?php echo $row['details']?></td>
           <td>
            <?php
             echo " <a href='editperiod.php?period_id=$row[period_id]'>Edit</a>" ;
            ?>
           </td>
           <td>
            <?php
             echo " <a href='deleteperiod.php?period_id=$row[period_id]'>Delete</a>" ;
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