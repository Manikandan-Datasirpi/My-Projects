<!DOCTYPE html>
<html>
<head>
	<title>Date Info</title>
</head>
<body>
    <header style="text-align: center;"
    ><img src="images/eca.png"/ height="120px" width="200px">
    <h1>Einstein College of Arts and Science</h1>
    </header>
<?php
$conn = new mysqli("localhost","root","","library");
if($conn->connect_errno)
{
	echo $conn->connect_error;
	die();
}
if(isset($_POST['Info']))
{
$stdregno=$_POST['regno'];
$sql="SELECT * FROM bookissued WHERE regno='$stdregno'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
?>
<table align="center">
    <tr bgcolor="#008000"><td>Student Name</td><td>Registration Number</td><td>Department</td><td>Book Title</td><td>Book Id</td><td>Date Issued</td></tr>
    <?php
    while($row=mysqli_fetch_assoc($result))
    {
?>    
     <tr>
        <td><?=$row['sname']?></td>
        <td><?=$row['regno']?></td>
        <td><?=$row['dept']?></td>
        <td><?=$row['bktitle']?></td>
        <td><?=$row['id']?></td>
        <td><?=$row['dateissued']?></td>
     </tr>
     <?php
    }
    ?>
</table>
<?php
}
else
{
    ?>
    <h1 align="center">You Not Issued any Books!</h1>
<?php
    $alert="<script>alert('You Not Issued any Books');</script>";
    echo $alert;
}
}
?>
</body>
</html>   