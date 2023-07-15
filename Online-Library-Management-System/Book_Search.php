<!DOCTYPE html>
<html>
<head>
	<title>Books List</title>
</head>
<body>
	<header style="text-align: center;">
        <img src="images/eca.png"/ height="120px" width="200px">
        <h1>Einstein College of Arts and Science</h1></header>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn->connect_errno)
{
	echo($conn->connect_error);
}
if(isset($_POST['Search']))
{
$query="SELECT * FROM books";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
{
?>
<table align="center" style="font-size: 25px;">
	<tr bgcolor="#008000"><td>Book Id</td><td>Title</td><td>Author Name</td><td>Cost</td><td>Quantity</td></tr>
	<?php
	while($row=mysqli_fetch_assoc($result))
	{
?>    
     <tr>
     	<td><?=$row['BookId']?></td>
     	<td><?=$row['Title']?></td>
     	<td><?=$row['AuthorName']?></td>
     	<td><?=$row['Cost']?></td>
     	<td><?=$row['Quantity']?></td>
     </tr>
     <?php
    }
    ?>
</table>
<?php
}
}
?>
</body>
</html>