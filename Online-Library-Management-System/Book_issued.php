<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">	
	<title>ECAS STUD_BOOK_SEARCH</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<div class="bg">
<body>
	<div class="wrapper">
	   <header>
	        <img src="images/eca.png"/ height="120px" width="200px">
	        <h1 align="center">ECAS LIBRARY MANAGEMENT SYSTEM</h1> 
		    <nav>
		         <ul>
			         <li><a href="Date_Info.php">VIEW-DATE-INFO</a></li>
			         <li><a><form method="POST" action="Book_Search.php">
			         	<Button name="Search" type="Submit"style="background-color: transparent; color: #fff; font-size: 16px; border:0px;">BOOK-VIEW</Button></form></a></li>
			         <li><a href="Book_issed.php" class="active">BOOK_ISSUED</a></li>
			         <li><a href="Return_Book.php">RETURN-BOOK</a></li>
			         <li><a href="index.html">LOG-OUT</a></li>
		         </ul>
		    </nav>	
        </header>
        <section>
        <div class="box_3">
		          <u><h1 style="font-size: 25px; line-height: 30px; color:white; text-align:center;">Student-Book-Issued</h1></u>
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
				               <td>Book Title</td>
				               <td><input type="text" name="Book_Title" placeholder="Book Title" autocomplete="off" required=""></td>
			              </tr>
			                <tr>
				               <td>Book Id
				               <td><input type="text" name="bookid" placeholder="Book Id" autocomplete="off" required=""></td>
			              </tr>
			               <tr>
				               <td>Date of Issued</td>
				               <td><input type="date" name="Date_issued" placeholder="Date Issued" autocomplete="off" required=""></td>
			              </tr>
			              <tr>
				                <td colspan="2"><center><input type="Submit" style="background-color:black; color:white " name="submit" value="Add" /></center></td>
			              </tr>	
			              
		             </table>
		         </form>
		    </div>	
        </section>
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
$table="CREATE TABLE IF NOT EXISTS bookissued(sname varchar(30),regno varchar(25),dept varchar(20),bktitle varchar(50),id varchar(10),dateissued DATE)";
mysqli_query($conn,$table);
if(isset($_POST['submit']))
{	
$stdname = $_POST['sname'];
$stdregno = $_POST['regno'];
$stddept = $_POST['dept'];
$Book = $_POST['Book_Title'];
$BookId = $_POST['bookid'];
$Date = $_POST['Date_issued'];
$sql1="SELECT * FROM registration Where regno = '$stdregno'";
$check=mysqli_query($conn,$sql1);
if(mysqli_num_rows($check)>0)
{
$query="SELECT * FROM books Where Quantity > '0' and BookId='$BookId'";
$sql2=mysqli_query($conn,$query);
if(mysqli_num_rows($sql2)>0)
{
$sql="SELECT * FROM bookissued Where regno= '$stdregno'and id='$BookId'";
$sql3=mysqli_query($conn,$sql);
if(mysqli_num_rows($sql3)>0)
{

    $alert="<script>alert('You already Issued that Book');</script>";
    echo $alert;
}
else
{
$sql4="UPDATE books SET Quantity=Quantity-1 Where BookId='$BookId'";
$sql5="INSERT INTO  bookissued(sname,regno,dept,bktitle,id,dateissued) VALUES ('$stdname','$stdregno','$stddept','$Book','$BookId','$Date')";
if($conn->query($sql4)&&$conn->query($sql5))
{
    $alert="<script>alert('Book Issued Successfully');</script>";
    echo $alert;
}
}
}
    else
{
	$alert="<script>alert('Book Not Available');</script>";
    echo $alert;
}
}
else
{
$alert="<script>alert('Please Register your account');</script>";
    echo $alert;
}
}

?>