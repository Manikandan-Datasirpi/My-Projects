<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">	
	<title>ECAS ADD_BOOKS</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="wrapper">
	   <header>
	        <img src="images/eca.png"/ height="120px" width="200px">
	        <h1 align="center">ECAS LIBRARY MANAGEMENT SYSTEM</h1> 
		    <nav>
		         <ul>
			         <li><a href="Add_Books.php" class="active">ADD-BOOKS</a></li>
			         <li><a><form method="POST" action="Student_list.php">
			         	<Button name="Search" type="Submit" style="background-color: transparent; color: #fff; font-size: 16px; border:0px;" >STUDENTS-LIST</Button></form></a></li>
			         <li><a><form method="POST" action="Book_Search.php">
			         	<Button name="Search" type="Submit" style="background-color: transparent; color: #fff; font-size: 16px; border:0px;">BOOK-VIEW</Button></form></a></li>
			         <li><a href="Book_Update.php">BOOK-UPDATE</a></li>
			         <li><a href="index.html">LOG-OUT</a></li>
		         </ul>
		    </nav>	
        </header>
        <section>
            <div class="box_1">
		       <u><h1 style="font-size: 25px; line-height: 30px; color:white; text-align:center;">Add Books</h1></u>
		       <form name="login" action="Add_Books.php" method="POST">
		         <table class="center">
			       <tr>
				       <td>Book-id</td>
				       <td><input type="text" name="bookid" placeholder="Book-id" autocomplete="off"required=""></td>
			       </tr>
			       <tr>
			           <td>Title</td>
				       <td><input type="text" name="title" placeholder="title" autocomplete="off" required=""></td>
			       </tr>
			       <tr>
				       <td>Author Name</td>
				       <td><input type="text" name="Authorname" placeholder="Authorname" autocomplete="off" required=""></td>
			       </tr>
			       <tr>
			           <td>Cost</td>
				       <td><input type="text" name="cost" placeholder="cost" autocomplete="off" required=""></td>
			       </tr>
			       <tr>
				       <td>Quantity</td>
				       <td><input type="text" name="quantity" placeholder="Quantity" autocomplete="off"required=""></td>
			       </tr>
			       <tr>
				       <td colspan="2"><center><button name="Add" type="Submit" style="background-color: black; color: white";>Add</button></center></td>
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
$table="CREATE TABLE IF NOT EXISTS books (BookId int(25),Title varchar(50),AuthorName varchar(50),Cost int(5),Quantity int(3))";
mysqli_query($conn,$table);
if(isset($_POST['Add']))
{

$BookId=$_POST['bookid'];
$Title=$_POST['title'];
$Authorname=$_POST['Authorname'];
$Cost=$_POST['cost'];
$Quantity=$_POST['quantity'];

$query1=mysqli_query($conn,"SELECT * FROM books where BookId='$BookId'");   
if(mysqli_num_rows($query1)>0)
{
  $alert="<script>alert('Book already added');</script>";
  echo $alert; 
}
else
{
$sql="INSERT INTO books(BookId,Title,AuthorName,Cost,Quantity) Values('$BookId','$Title','$Authorname','$Cost','$Quantity')";
if($conn->query($sql))
{
	$alert="<script>alert('Book added Successfully');</script>";
         echo $alert;
}
else
{
	$alert="<script>alert('Not Added');</script>";
         echo $alert;
}
}
}
?>