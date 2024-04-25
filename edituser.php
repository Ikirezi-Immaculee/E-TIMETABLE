<?php
include 'conf.php';
$u_id = $_GET['user_id'];
if(isset($_POST['save_course'])) {
    $name=$_POST['name'];
    $tel=$_POST['tel'];
    $email=$_POST['email'];
    $status=$_POST['status'];
    $role=$_POST['role'];
    $edit = mysqli_query($conn, "UPDATE user SET  name='$name', tel='$tel',email='$email',status='$status',role='$role' WHERE user_id='$u_id'");
    header("location:user.php");
}
$dis=mysqli_query($conn,"SELECT * FROM user WHERE user_id='$u_id ' ");
while($data=mysqli_fetch_array($dis)){
  $name=$data[1];
  $tel=$data[2];
  $email=$data[3];
  $status=$data[4];
  $role=$data[5];

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
      <input type="hidden" name="id" value="<?php echo $u_id; ?>">
        <label for="">Name</label>
        <input type="text" name="name"  value="<?php echo $name ?>">
        <br>
        <label for="">Telephone</label>
        <input type="number" name="tel" value="<?php echo $tel ?>">
        <br>
        <label for="">Email</label>
        <input type="text" name="email" value="<?php echo $email ?>">
        <br>
        <label for="">Status</label>
        <input type="text" name="status" value="<?php echo $status ?>">
        <br>
        <label for="">Role</label>
        <input type="text" name="role" value="<?php echo $role ?>">
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
                $all=mysqli_query($conn,"SELECT * FROM user");
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
    </fieldset>
    </form>
</body>
</html>
