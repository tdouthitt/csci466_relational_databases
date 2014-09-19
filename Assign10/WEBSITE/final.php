<?php

$hostname = "students";
$username = "cs566103";
$password = "JAwDGP7LR";
$db = "cs566103";


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


//DISPLAY

echo "<BODY bgcolor=\"#324dca\" text=\"#39e5e5\">";
echo "<center>";
echo "<h1>";
echo "PLEASE REVIEW THIS INFORMATION";
echo "</h1>";
echo "</center>";
echo "<br>";
echo "<br>";
echo "<form action=finalUpdate.php method=post>";

//INPUT HIDDEN VALUES FOR CARRY-OVER TO NEXT PHP

echo "<input type=\"hidden\" value=\"".$_POST['DEPARTURE_PORT']."\" name=\"DEPARTURE_PORT\" />";
echo "<input type=\"hidden\" value=\"".$_POST['DEPARTURE_DATE']."\" name=\"DEPARTURE_DATE\" />";
echo "<input type=\"hidden\" value=\"".$_POST['PORT_NAME']."\" name=\"PORT_NAME\" />";
echo "<input type=\"hidden\" value=\"".$_POST['COUNTRY']."\" name=\"COUNTRY\" />";
echo "<input type=\"hidden\" value=\"".$_POST['SHIP_NAME']."\" name=\"SHIP_NAME\" />";
echo "<input type=\"hidden\" value=\"".$_POST['CABIN_TYPE']."\" name=\"CABIN_TYPE\" />";

//HIDDEN BILLING INFO
echo "<input type=\"hidden\" value=\"".$_POST['SHIP_COST']."\" name=\"SHIP_COST\" />";
echo "<input type=\"hidden\" value=\"".$_POST['CABIN_COST']."\" name=\"CABIN_COST\" />";
echo "<input type=\"hidden\" value=\"".$_POST['DATE_COST']."\" name=\"DATE_COST\" />";
echo "<input type=\"hidden\" value=\"".$_POST['TOTAL_COST']."\" name=\"TOTAL_COST\" />";

echo "<input type=\"hidden\" value=\"".$_POST['CABIN_ID']."\" name=\"CABIN_ID\" />";
echo "<input type=\"hidden\" value=\"".$_POST['SHIP_ID']."\" name=\"SHIP_ID\" />";
echo "<input type=\"hidden\" value=\"".$_POST['PORT_ID']."\" name=\"PORT_ID\" />";

//NEW CUSTOMER INFO
echo "CUSTOMER INFORMATION";
echo "<br>";
echo "<br>";
echo "Customer Name ";
echo "<input type=\"text\" value=\"".$_POST['CUST_NAME']."\" name=\"CUST_NAME\" />";
echo "<br>";

echo "Street ";
echo "<input type=\"text\" value=\"".$_POST['STREET']."\" name=\"STREET\" />";
echo "<br>";

echo "City ";
echo "<input type=\"text\" value=\"".$_POST['CITY']."\" name=\"CITY\" />";


echo "<br>";
echo "  State ";
echo "<input type=\"text\" value=\"".$_POST['STATE']."\" name=\"STATE\" />";
echo "<br>";

echo "Zip-Code ";
echo "<input type=\"text\" value=\"".$_POST['ZIP']."\" name=\"ZIP\" />";
echo "<br>";

echo "Phone Number ";
echo "<input type=\"text\" value=\"".$_POST['PHONE_NUM']."\" name=\"PHONE_NUM\" />";
echo "<br>";

echo "Email Address ";
echo "<input type=\"text\" value=\"".$_POST['EMAIL']."\" name=\"EMAIL\" />";
echo "<br>";
echo "<br>";
echo "<br>";

//NEW BILLING INFO
echo "<hr/>";
echo "BILLING INFORMATION";
echo "<br>";
echo "<br>";
echo "CC#: ";
echo "<input type=\"text\" value=\"".$_POST['CC_NUM']."\" name=\"CC_NUM\" />";
echo "<br>";

echo "TYPE: ";
echo "<input type=\"text\" value=\"".$_POST['CC_TYPE']."\" name=\"CC_TYPE\" />";
echo "<br>";

echo "CC Expiration: ";
echo "<input type=\"text\" value=\"".$_POST['MONTH']."\" name=\"MONTH\" />";
echo "<br>";
echo "<input type=\"text\" value=\"".$_POST['YEAR']."\" name=\"YEAR\" />";
echo "<br>";

echo "<hr/>";
echo "SELECTED INFORMATION";
echo "<br>";
echo "<br>";
echo "DEPARTURE PORT: ";
echo $_POST["DEPARTURE_PORT"];
echo "<br>";
echo "DEPARATURE DATE: ";
echo $_POST["DEPARTURE_DATE"];
echo "<br>";
echo "PORT NAME: ";
echo $_POST["PORT_NAME"];
echo "<br>";
echo "COUNTRY: ";
echo $_POST["COUNTRY"];
echo "<br>";
echo "SHIP: ";
echo $_POST["SHIP_NAME"];
echo "<br>";
echo "CABIN-TYPE: ";
echo $_POST["CABIN_TYPE"];
echo "<br>";

echo "<hr/>";
echo "<br>";
echo "<br>";
echo "BILLING BREAKDOWN";
echo "<br>";
echo "<br>";
echo "SHIP COST: $";
echo $_POST["SHIP_COST"];
echo "<br>";
echo "CABIN COST: $";
echo $_POST["CABIN_COST"];
echo "<br>";
echo "SEASONAL COST: $";
echo $_POST["DATE_COST"];
echo "<br>";
echo "<hr/>";
echo "<br>";
echo "TOTAL PRICE: $";
echo $_POST["TOTAL_COST"];
echo "<hr/>";

//BUTTON OPTIONS

echo "<input type=\"submit\" value=\"CONFIRM\" name=\"submit\" />";
echo "<input type=\"reset\" value=\"CLEAR\" name=\"submit\" />";
echo "<input type=\"button\" value=\"HOME\" name=\"home\" onclick=\"location.href='main.html'\"/>";
echo "<br>";
echo "</form>";



mysql_close($conn);



?>