<!DOCTYPE html>
<html>
<head>
	     <title>ECAS_ADMIN_LOGIN</title>
	     <link rel="stylesheet" type="text/css" href="styles.css">
	     <meta charset="utf-8">
	     <meta name="viewport" content="width=device-width, initial-scale=1">
	     <script type="text/javascript">
		function fun1()
		{
		var x=document.getElementById("ck");
                if(x.type==="password")
		{
                  x.type="text";
		}
                else
                {
                   x.type="password"
                }
        }  
	</script>
</head>
<body>
    <div class="wrapper">
        <header>
      	         <img src="images/eca.png"/ height="120px" width="200px">
	           	 <h1 align="center" style="color: white;">ECAS LIBRARY MANAGEMENT SYSTEM</h1>
        </header>
        <section>
           <div class="box">
		          <u><h1 style="font-size: 25px; line-height: 30px; color:white; text-align:center;">Admin-Login</h1></u>
		          <form name=Admin method="POST">
		             <table class="center">
			              <tr>
		                   <td>Admin-name</td>
		                   <td><input type="text" name="admin" placeholder="Admin-name" autocomplete="off" required></td>
			              </tr>
			              <tr>
				               <td>Password</td>
				               <td><input type="Password" name="Pass" id="ck"placeholder="Password" autocomplete="off" required></td>
			              </tr>
			              <tr>
			              	<td colspan="2">Show Password&nbsp&nbsp&nbsp<input type="checkbox" name="pass" onclick="fun1()"></td>
			              </tr>
			              <tr>
				               <td colspan="2"><center><button type="Submit" name="login"style="color: black;">Login</button></center></td>
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
$table="CREATE TABLE IF NOT EXISTS admin(Username varchar(30),Password varchar(25))";
mysqli_query($conn,$table);
if(isset($_POST['login']))
{
    $Username=$_POST['admin'];
     $Password=$_POST['Pass'];
	$query2=mysqli_query($conn,"SELECT * FROM admin where Username='$Username'");
	$query1=mysqli_query($conn,"SELECT * FROM admin where Password='$Password'");
    if ((mysqli_num_rows($query2)>0)&&(mysqli_num_rows($query1)>0))
    {
        header("Location:Add_Books.php");
    } else 
    {
     	$alert="<script>alert('Admin Name or Password not exist');</script>";
         echo $alert;
    }
}
?>