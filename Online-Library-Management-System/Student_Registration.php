<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">	
	<title>ECAS STUDENT_REGISTRATION</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body id="bg">
	<div class="wrapper">
	   <header>
	        <img src="images/eca.png"/ height="120px" width="200px">
	        <h1 align="center">ECAS LIBRARY MANAGEMENT SYSTEM</h1> 
	   </header>
	   <section>
           <div class="box_3">
		          <u><h1 style="font-size: 25px; line-height: 30px; color:white; text-align:center;">Student-Registration</h1></u>
		          <form  method="POST">
		             <table class="center">
			              <tr>
		                   <td>Student-name</td>
		                   <td><input type="text" name="sname" placeholder="Student-name" autocomplete="off" required=""></td>
			              </tr>
			              <tr>
				               <td>Register No</td>
				               <td><input type="text" name="regno" placeholder="Regno" autocomplete="off"required=""></td>
			              </tr>
			              <tr>
				               <td>Department</td>
				               <td>
				               	  <select name="dept">
                                        <option value="Bsc.Computer Science">B.SC CS</option>
                                        <option value="BA.Tamil">B.A Tam</option>
                                        <option value="BA.English">B.A Eng</option>
                                        <option value="Bsc.Physics">B.SC Phy</option>
                                        <option value="Bsc.Chemistry">B.SC Chem</option>
                                        <option value="BBA">BBA</option>
                                        <option value="B.Com">B.Com</option>
                                        <option value="B.Com CS">B.Com CS</option>
				                  </select>
				               </td>
			              </tr>
			               <tr>
				               <td>Contact</td>
				               <td><input type="text" name="contact" placeholder="Contact-No" autocomplete="off" required=""></td>
			              </tr>
			              <tr>
				                <td colspan="2"><center><input type="Submit" name="submit" value="sign-up" /></center></td>
			              </tr>	
			              
		             </table>
		         </form>
		    </div>
       </section>
       <footer> 	
       </footer>
    </div>  
</body>
</html>  

<?php
$conn = new mysqli("localhost","root","","library");
if($conn->connect_errno)
{
	echo $conn->connect_error;
	die();
}
$table="CREATE TABLE IF NOT EXISTS registration (sname varchar(25),regno varchar(30),dept varchar(20),contact varchar(10))";
mysqli_query($conn,$table);
if(isset($_POST['submit']))
{	
$stdname = $_POST['sname'];
$stdregno = $_POST['regno'];
$stddept = $_POST['dept'];
$stdcontact = $_POST['contact'];
$query1=mysqli_query($conn,"SELECT * FROM registration where regno='$stdregno'"); 
if(mysqli_num_rows($query1)>0)
{
$alert="<script>alert('Your account is already taken');</script>";
echo $alert;
}
else
{
    if($stdname!=""&&$stdregno!=""&&$stddept!=""&&$stdcontact!="")
    {
      $sql="INSERT INTO  registration(sname,regno,dept,contact) VALUES ('$stdname','$stdregno','$stddept','$stdcontact')";
      if($conn->query($sql))
     {
     	 $alert="<script>alert('Signup Successfully');</script>";
         echo $alert;
     	header("Location:Student_Login.php");
     }
 }
}
}
?>