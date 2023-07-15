<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">	
	<title>ECAS STUDENT_LOGIN</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<div class="bg">
<body>
	<div class="wrapper">
	   <header>
	        <img src="images/eca.png"/ height="120px" width="200px">
	        <h1 align="center">ECAS LIBRARY MANAGEMENT SYSTEM</h1> 
	   </header>
       <section>
           <div class="box_3">
		          <u><h1 style="font-size: 25px; line-height: 30px; color:white; text-align:center;">Student-Login</h1></u>
		          <form name="login" method="POST"> 
		             <table>
			              <tr>
		                   <td>Student-name</td>
		                   <td><input type="text" name="sname" placeholder="Student-name" autocomplete="off" required=""></td>
			              </tr>
			              <tr>
				               <td>Register No</td>
				               <td><input type="text" name="regno" placeholder="Regno" autocomplete="off"required=""></td>
			              </tr>
	                      <tr>
	                      	 <td colspan="2"><center><button name="login" style="color: black;">Login</button></center></td>
			              </tr>	
			              <tr>
				                <td colspan="2">New Member?...<a href="Student_Registration.php">Sign up</a></td>
			              </tr>
		             </table>
		           </form>
           </div>
       </section>
       <footer> 	
       </footer>
    </div>  
</body>
</div>
</html>  
<?php
$conn = new mysqli("localhost","root","","library");
if($conn->connect_errno)
{
	echo $conn->connect_error;
	die();
}
if(isset($_POST['login']))
{
$stdname = $_POST['sname'];
$stdregno = $_POST['regno'];
$sql=mysqli_query($conn,"SELECT * FROM registration WHERE sname ='$stdname' and regno ='$stdregno'");
if(mysqli_num_rows($sql)>0)
{
	 $alert="<script>alert('Login Successfully');</script>";
         echo $alert;
         header("Location:Date_Info.php");
}
else
{
	 $alert="<script>alert('Please Register Your Account or Regno Miss Matched');</script>";
         echo $alert;
}
}
?>    