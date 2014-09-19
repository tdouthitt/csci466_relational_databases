<?php

$hostname = "students";
$username = "cs566103";
$password = "JAwDGP7LR";
$db = "cs566103";



//$CUSTOMER_NAME=$_POST['CustName'];

//connect to the database
$conn = mysql_connect($hostname,$username,$password);
if (!$conn) 
{
die("Could not connect: " . mysql_error());
}
//select the database
$db_selected = mysql_select_db($db, $conn);


if (!$db_selected) 
{
die ("Could not use: " . $db . mysql_error());
}

$sql = "SELECT * FROM CUSTOMER WHERE CUSTOMER_NAME LIKE '%$_POST[CustName]%'";

//execute the SQL statement
$result = mysql_query($sql, $conn);
if (!$result)
{
die( "Could not execute sql:" . mysql_error());
}

$row = mysql_fetch_array($result);

//DISPLAY

echo "<BODY bgcolor=\"#324dca\" text=\"#39e5e5\">";
echo "<form action=update.php method=post>";
echo "Customer Name ";
echo "<input type=\"text\" value=\"".$row['CUSTOMER_NAME']."\" name=\"CUST_NAME\" />";
echo "<br>";
echo "Street ";
echo "<input type=\"text\" value=\"".$row['STREET']."\" name=\"STREET\" />";
echo "<br>";
echo "City ";
echo "<input type=\"text\" value=\"".$row['CITY']."\" name=\"CITY\" />";
echo "  State ";
echo "<input type=\"text\" value=\"".$row['STATE']."\" name=\"STATE\" />";
echo "<br>";
echo "Zip-Code ";
echo "<input type=\"text\" value=\"".$row['ZIP']."\" name=\"ZIP\" />";
echo "<br>";
echo "Phone Number ";
echo "<input type=\"text\" value=\"".$row['PHONE_NUM']."\" name=\"PHONE_NUM\" />";
echo "<br>";
echo "Email Address ";
echo "<input type=\"text\" value=\"".$row['EMAIL']."\" name=\"EMAIL\" />";
echo "<br>";
echo "<input type=\"submit\" value=\"UPDATE\" name=\"submit\" />";
echo "<input type=\"reset\" value=\"CLEAR\" name=\"submit\" />";
echo "<input type=\"button\" value=\"HOME\" name=\"home\" onclick=\"location.href='main.html'\"/>";
echo "<br>";
echo "</form>";


echo $row["CUSTOMER_NAME"];
echo "<br>";
echo $row["STREET"];
echo "<br>";
echo $row["CITY"];
echo "<br>";
echo $row["STATE"];
echo "<br>";
echo $row["ZIP"];
echo "<br>";
echo $row["PHONE_NUM"];
echo "<br>";
echo $row["EMAIL"];



mysql_close($conn);



?>