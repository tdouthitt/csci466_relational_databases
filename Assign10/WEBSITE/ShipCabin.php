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
echo "<center>";
echo "<h1>";
echo "MAKE YOUR CHOICES";
echo "</h1>";
echo "</center>";
echo "<br>";
echo "<br>";

echo "<form action=book.php method=post>";
echo "<input type=\"hidden\" value=\"".$_POST['DEPARTURE_PORT']."\" name=\"DEPARTURE_PORT\" />";
echo "<input type=\"hidden\" value=\"".$_POST['DEPARTURE_DATE']."\" name=\"DEPARTURE_DATE\" />";
echo "<input type=\"hidden\" value=\"".$_POST['PORT_NAME']."\" name=\"PORT_NAME\" />";
echo "<input type=\"hidden\" value=\"".$_POST['COUNTRY']."\" name=\"COUNTRY\" />";
echo "<hr/>";
echo "<p>";
echo "Select a Ship: ";
echo "</p>";
echo "<select name=\"SHIP_NAME\" id=\"SHIP_NAME\" />";
echo "<option value=\"NAUTILUS\">";
echo "NAUTILUS";
echo "</option>";
echo "<option value=\"BLACK PEARL\">";
echo "BLACK PEARL";
echo "</option>";
echo "<option value=\"PEQUOD\">";
echo "PEQUOD";
echo "</option>";
echo "<option value=\"ENTERPRISE\">";
echo "ENTERPRISE";
echo "</option>";
echo "<option value=\"SS GUPPY\">";
echo "SS-GUPPY";
echo "</option>";
echo "</select>";
echo "<br>";
echo "<hr/>";
echo "<br>";
echo "<p>";
echo "Select a cabin-type: ";
echo "</p>";
echo "<select name=\"CABIN_TYPE\" id=\"CABIN_TYPE\" />";
echo "<option value=\"INTERIOR\">";
echo "INTERIOR";
echo "</option>";
echo "<option value=\"OUTSIDE\">";
echo "OUTSIDE";
echo "</option>";
echo "<option value=\"BALCONY\">";
echo "BALCONY";
echo "</option>";
echo "<option value=\"SUITES\">";
echo "SUITES";
echo "</option>";
echo "<option value=\"DELUXE\">";
echo "DELUXE";
echo "</option>";
echo "</select>";
echo "<br>";
echo "<hr/>";
echo "<br>";
echo "<input type=\"submit\" value=\"CONTINUE\" />";
echo "<input type=\"reset\" value=\"CLEAR\" name=\"submit\" />";
echo "<input type=\"button\" value=\"HOME\" name=\"home\" onclick=\"location.href='main.html'\"/>";
echo "<br>";
echo "</form>";




mysql_close($conn);



?>