<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">	
	<title>ECAS BOOK_UPDATE</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="wrapper">
	   <header>
	        <img src="images/eca.png"/ height="120px" width="200px">
	        <h1 align="center">ECAS LIBRARY MANAGEMENT SYSTEM</h1> 
		    <nav>
		         <ul>
			         <li><a href="Add_Books.php">ADD-BOOKS</a></li>
			         <li><a><form method="POST" action="Book_Search.php">
			         	<Button name="Search" type="Submit">BOOK-VIEW</Button></form></a></li>
			         <li><a href="Book_Update.php" class="active">BOOK-UPDATE</a></li>
			         <li><a href="index.html">LOG-OUT</a></li>
		         </ul>
		    </nav>	
        </header>
        <section>
         <div class="box_2">
		     <u><h1 style="font-size: 25px; line-height: 30px; color:white; text-align:center;">Book Update</h1></u>
		     <form name="login" action="Book_Update.php" method="POST">
		        <table class="center">
		         	<tr>
				        <td>Book-id</td>
				        <td><input type="text" name="bookid" placeholder="Book-id" autocomplete="off"required=""></td>
			        </tr>
			        <tr>
			         	<td colspan="2"><center><button  type="Submit" name="Submit" style="background-color: black; color: white";>Remove</button></center></td>
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
if(isset($_POST['Submit']))
{	
  $BookId = $_POST['bookid'];
  $sql1=mysqli_query($conn,"SELECT * FROM books where BookId='$BookId'");
if(mysqli_num_rows($sql1)>0)
{
  $sql2="DELETE FROM  books WHERE BookId='$BookId'";
  if(mysqli_query($conn,$sql2))
    {
	    $alert="<script>alert('Book Remove Successfully');</script>";
        echo $alert;
    }
}
else
{
		$alert="<script>alert('Book not Found');</script>";
        echo $alert;
}

}
?>