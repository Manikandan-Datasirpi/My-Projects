<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">	
	<title>ECAS VIEW_DATE_INFO</title>
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
			         <li><a href="Date_Info.php" class="active">VIEW-DATE-INFO</a></li>
			         <li><a><form method="POST" action="Book_Search.php">
			         	<Button name="Search" type="Submit" style="background-color: transparent; color: #fff; font-size: 16px; border:0px;">BOOK-VIEW</Button></form></a></li>
			         <li><a href="Book_issued.php">BOOK_ISSUED</a></li>
			         <li><a href="Return_Book.php">RETURN-BOOK</a></li>
			         <li><a href="index.html">LOG-OUT</a></li>
		         </ul>
		    </nav>	
        </header>
        <section>
         <div class="box_2">
		     <u><h1 style="font-size: 25px; line-height: 30px; color:white; text-align:center;">Fine Details</h1></u>
		     <form name="login" action="Date.php" method="POST">
		        <table>
		         	<tr>
				        <td>Register No:</td>
				        <td><input type="text" name="regno" placeholder="Reg-name" autocomplete="off"required=""></td>
			        </tr>
			        <tr>
			         	<td colspan="2"><center><button name="Info"  type="Submit" 
			         		style="background-color: black; color: white";>Search</button></center></td>
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