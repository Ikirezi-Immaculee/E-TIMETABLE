<?php
include 'conf.php';
?>
<?php
if(isset($_POST['save_course'])){
$name=$_POST['name'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$status=$_POST['status'];
$role=$_POST['role'];
$query=mysqli_query($conn,"insert into user VALUES('','$name','$tel','$email','$status','$role');");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-TIMETABLE/USER</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="head">
        <h1>ELECTRONIC TIMETABLE</h1>
      </div>
      <div class="nav">
          <ul>
        <li id="act"><a href="user.php">USER</a></li>
       <li> <a href="course.php">COURSE</a></li>
<li> <a href="period.php">PERIOD</a></li>
      <li>  <a href="class.php">CLASSROOM</a></li>
        <li><a href="timetable.php">TIMETABLE</a></li>
      </ul>
      </div>
  <form action="" method="POST">
    <FIeldset>
      <legend>
        ADD USER
      </legend>
      <div class="reg_course">
        <label for="">Name</label>
        <input type="text" name="name">
        <br>
        <label for="">Telephone</label>
        <input type="number" name="tel">
        <br>
        <label for="">Email</label>
        <input type="text" name="email">
        <br>
        <label for="">Status</label>
        <input type="text" name="status">
        <br>
        <label for="">Role</label>
        <input type="text" name="role">
        <br>
        <input type="submit" value="SAVE" name="save_course">
      </div>
      <div class="view_course">
        <table>
            <tr>
                <th>User_id</th>
                <th>Name</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Status</th>
                <th>Role</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        <?php
        $all=mysqli_query($conn,"select * from user");
        while ($row=mysqli_fetch_assoc($all)) {
           ?>
           <tr>
            <td><?php echo $row['user_id']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['tel']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['status']?></td>
            <td><?php echo $row['role']?></td>
           <td>
            <?php
             echo " <a href='edituser.php?user_id=$row[user_id]'>Edit</a>" ;
            ?>
           </td>
           <td>
            <?php
             echo " <a href='deleteuser.php?user_id=$row[user_id]'>Delete</a>" ;
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