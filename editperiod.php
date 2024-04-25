<?php
include 'conf.php';
$p_id = $_GET['period_id'];
if(isset($_POST['save_course'])) {
    $p_date=$_POST['period_date'];
    $p_start=$_POST['period_start'];
    $p_end=$_POST['period_end'];
    $details=$_POST['details'];
    $edit = mysqli_query($conn, "UPDATE period SET period_date='$p_date',period_start='$p_start',period_end='$p_end',details='$details' WHERE period_id='$p_id'");
    header("location:period.php");
}
$dis=mysqli_query($conn,"SELECT * FROM period WHERE period_id='$p_id' ");
while($data=mysqli_fetch_array($dis)){
    $p_date=$data[1];
    $p_start=$data[2];
    $p_end=$data[3];
    $details=$data[4];
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
      <input type="hidden" name="id" value="<?php echo $p_id; ?>">
      <div class="reg_course">
        <label for="">Period Date</label>
        <input type="text" name="period_date" value="<?php echo $p_date; ?>">
        <br>
        <label for="">Period Start</label>
        <input type="text" name="period_start" value="<?php echo $p_start; ?>">
        <br>
        <label for="">Period End</label>
        <input type="text" name="period_end" value="<?php echo $p_end; ?>">
        <br>
        <label for="">Details</label>
        <input type="text" name="details" value="<?php echo $details; ?>">
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
</body>
</html>
