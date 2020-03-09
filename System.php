<html>
<head>
<title></title>
</head>
<body>
<style>

input[type=text], select {
  width: 50%;
  height: 3%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 2px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit]:hover {
  background-color: cornflowerblue;
}
div{
padding-: 10px;
width : 350px;
text-align: right;
color: white;
font-size: 20px;
}
.label{
  padding: 8px;
  font-family: Arial;
}
body {
  background-image: url('bg.jpg');
}
</style>

<?php

error_reporting(0);

$name=$_POST["ename"];
$id=$_POST["eid"];
$pos=$_POST["epos"];
$sal=$_POST["esal"];
$tax=$_POST["etax"];
$rent=$_POST["erent"];
$duc=(int)$tax+(int)$rent;
$Total=(int)$sal-(int)$duc;

if (isset($_POST["Clear"]))
{

$name="";
$id="";
$pos="";
$sal="";
$tax="";
$rent="";
$duc="";
$Total="";
}

if(isset($_REQUEST['Save']))
{
$servername = "localhost";
$username = "root";
$password = "";
$db="Payroll";

$conn = new mysqli($servername, $username, $password,$db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Payroll (EmpName,EmpID,Position,Salary,Tax,Apartment_Rent,Total_Duduction,Gross_Salary)
VALUES ('$name','$id','$pos','$sal','$tax','$rent','$duc','$Total')";

if ($conn->query($sql) === TRUE) {
    
  	$s="Data Saved successfully";
} else {
    $ss="not saved";
}

$conn->close();
}


?>

<form method="Post" action="">


<br>
<h1 style="color:white";>Simple Payroll System</h1>
<br>
<div>
<label>Employee Name:</label>
<input type="text" name="ename" required="" value="<?php echo $name; ?>"></div>
<br>
<div>
Employee ID:<input type="text" name="eid" required="" value="<?php echo $id; ?>"> </div>
<br>
<div>
Position:<input type="text" name="epos" required="" value="<?php echo $pos; ?>"></div>
<br>
<div>
Salary:<input type="text" name="esal" required="" value="<?php echo $sal; ?>"></div>
<br>
<div>
Tax:<input type="text" name="etax" required="" value="<?php echo $tax; ?>"></div>
<br>
<div>
Apartment Rent:<input type="text" name="erent" required="" value="<?php echo $rent; ?>"></div>
<br>
<div>
<b><label>Total Duduction: <?php echo $duc; ?></label></b></div>
<br>
<div>

<b><label>Gross Salary: <?php echo $Total; ?></label></b></div>
<br><div>

<input type="submit" name="Compute" value="Compute" style="border-radius: 12px; padding: 10px 16px;">
<input type="submit" name="Save" value="Save" style="border-radius: 12px; padding: 10px 16px;">
<input type="submit" name="Clear" value="Clear" style="border-radius: 12px; padding: 10px 16px; "> </div>
<div>
<label><?php echo $s ?></label>
<label><?php echo $ss ?></label>
</div>
</form>
<form method="Post" action="Admin1.php">
<div>
<input type="submit" name="Admin"  value="Admin" style="border-radius: 12px; padding: 10px 16px; "></div>
</form>
</body>
</html>