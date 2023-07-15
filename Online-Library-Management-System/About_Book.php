<!DOCTYPE html>
<html>
<head>
	<title>About Book</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";
$con = mysqli_connect($servername,$username,$password,$dbname);
if($con->connect_errno)
{
	echo($con->connect_error);
}
else
{

}
if(isset($_POST['Search']))
{
ob_start();
require("fpdf/fpdf.php");
$Pdf=new FPDF('P','pt','A4');
$BookId=$_POST['bookid'];
$sql="SELECT * FROM books WHERE BookId='$BookId'";
$res=$con->query($sql);
$Pdf->AddPage();
$Pdf->SetFont("Arial","B","20");
$Pdf->Cell(0,0,"Einsten Colllege of Arts and Science",0,1,'C');
$Pdf->SetFont("Arial","B","15");
$Pdf->Cell(0,50,"Seethaparpanallur, Tirunelveli-627008.",0,0,'C');
$Pdf->Image('logo1.jpeg',235.0,80.0);
while ($row=$res->fetch_object())
 {
 	$Book_ID=$row->BookId;
 	$Book_Title=$row->Title;
 	$Autho_Name=$row->AuthorName;
 	$Cost=$row->Cost;
 	$Quantity=$row->Quantity;
	$Pdf->Ln();
}
$Pdf->Cell(250,35,"Book ID:",1,0,'L');
$Pdf->Cell(280,35,"$Book_ID",1,1,'L');
$Pdf->Cell(250,35,"Book Title:",1,0,'L');
$Pdf->Cell(280,35,"$Book_Title",1,1,'L');
$Pdf->Cell(250,35,"Author Name:",1,0,'L');
$Pdf->Cell(280,35,"$Autho_Name",1,1,'L');
$Pdf->Cell(250,35,"Cost:",1,0,'L');
$Pdf->Cell(280,35,"$Cost",1,1,'L');
$Pdf->Cell(250,35,"Quantity:",1,0,'L');
$Pdf->Cell(280,35,"$Quantity",1,1,'L');
$Pdf->SetFont("Arial","I","15");
$Pdf->Cell(520,100,"'Education is not the learning of facts but the training of the mind to think.'",0,0,'C');
$Pdf->Output('I');
ob_end_flush();
}
?>
</body>
</html>