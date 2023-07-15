<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">	
	<title>ECAS RETURN-BOOK</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="bg">
	<div class="wrapper">
	   <header>
	        <img src="images/eca.png"/ height="120px" width="200px">
	        <h1 align="center">ECAS LIBRARY MANAGEMENT SYSTEM</h1> 
		    <nav>
		         <ul>
			         <li><a href="Date_Info.php">VIEW-DATE-INFO</a></li>
			         <li><a><form method="POST" action="Book_Search.php">
			         	<Button name="Search" type="Submit" style="background-color: transparent; color: #fff; font-size: 16px; border:0px;">BOOK-VIEW</Button></form></a></li>
			         <li><a href="Book_issued.php">BOOK_ISSUED</a></li>
			         <li><a href="Return_Book.php" class="active">RETURN-BOOK</a></li>
			         <li><a href="index.html">LOG-OUT</a></li>
		         </ul>
		    </nav>	
        </header>
        <section>
         <div class="box_2">
		     <u><h1 style="font-size: 25px; line-height: 30px; color:white; text-align:center;">Return-Book</h1></u>
		     <form name="login" method="POST">
		        <table>
		         	<tr>
				        <td>Register No:</td>
				        <td><input type="text" name="regno" placeholder="Reg-name" autocomplete="off"required=""></td>
			        </tr>
			        <tr>
				        <td>Book-Name:</td>
				        <td><input type="text" name="bkname" placeholder="Book-name" autocomplete="off"required=""></td>
			        </tr>
			        <tr>
				        <td>Book Id:</td>
				        <td><input type="text" name="bookid" placeholder="Book Id" autocomplete="off"required=""></td>
			        </tr>
			        <tr>
			         	<td colspan="2"><center><button name="return" type="Submit"  style="background-color: black; color: white";>Return</button></center></td>
			        </tr>
			    </table>
			 </form>
		 </div>
		 </section>
		 <footer>
		 	
		 </footer>
	</div>
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
if(isset($_POST['return']))
{	
$stdregno = $_POST['regno'];
$Book = $_POST['bkname'];
$BookId = $_POST['bookid'];
$query="SELECT * FROM  bookissued WHERE id='$BookId'and regno='$stdregno'";
$sql=mysqli_query($conn,$query);
if(mysqli_num_rows($sql)>0)
{
$sql3="UPDATE books SET Quantity=Quantity + 1 Where BookId='$BookId' ";
$sql4="DELETE FROM bookissued WHERE id='$BookId'and regno='$stdregno' ";
if($conn->query($sql3)&&$conn->query($sql4))
{
    $alert="<script>alert('Book Return Successfully');</script>";
    echo $alert;
}
}
else
{
	$alert="<script>alert('Not You Issued that Book ');</script>";
    echo $alert;
}
}
?>