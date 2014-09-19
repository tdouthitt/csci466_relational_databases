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

$sql = "INSERT INTO CUSTOMER
             VALUES
             (null, '$_POST[CUST_NAME]', '$_POST[STREET]', '$_POST[CITY]', '$_POST[STATE]', '$_POST[ZIP]', '$_POST[PHONE_NUM]', '$_POST[EMAIL]')";

//execute the SQL statement
$result = mysql_query($sql, $conn);
if (!$result)
{
die( "Could not execute sql:0" . mysql_error());
}
//EXTRACT NEW CUSTOMER_ID FROM INSERTED VALUES
$sql_CUST = "SELECT * FROM CUSTOMER WHERE CUSTOMER_NAME LIKE '%$_POST[CUST_NAME]%'";

//execute the SQL statement
$result_CUST = mysql_query($sql_CUST, $conn);
if (!$result_CUST)
{
die( "Could not execute sql:1" . mysql_error());
}

$row = mysql_fetch_array($result_CUST);

//INSERT NEW CUST_ID INTO CREDIT AND BOOKING
$sql_CRED = "INSERT INTO CREDIT
             VALUES
             ('$_POST[CC_NUM]', '$_POST[CC_TYPE]', '$_POST[YEAR].\"-\".$_POST[MONTH].\"-\".\"01\"', '$row[CUSTOMER_ID]')";



$result_CRED = mysql_query($sql_CRED);
if (!$result_CRED)
{
die( "Could not execute sql:2" . mysql_error());
}

$sql_BOOK = "INSERT INTO BOOKING
             VALUES
             (null, '$row[CUSTOMER_ID]', '$_POST[DEPARTURE_DATE]', '$_POST[CABIN_ID]', '$_POST[SHIP_ID]')";

$result_BOOK = mysql_query($sql_BOOK);
if (!$result_BOOK)
{
die( "Could not execute sql:3" . mysql_error());
}





//DISPLAY

echo "<BODY bgcolor=\"#324dca\" text=\"#39e5e5\">";
echo "<center>";
echo "<h1>";
echo "RECEIPT OF PURCHASE";
echo "</h1>";
echo "</center>";
echo "<br>";
echo "<br>";

//NEW CUSTOMER INFO
echo "CUSTOMER INFORMATION";
echo "<br>";
echo "<br>";
echo "Customer Name ";
echo $_POST["CUST_NAME"];
echo "<br>";

echo "Street ";
echo $_POST["STREET"];
echo "<br>";

echo "City ";
echo $_POST["CITY"];


echo "<br>";
echo "  State ";
echo $_POST["STATE"];
echo "<br>";

echo "Zip-Code ";
echo $_POST["ZIP"];
echo "<br>";

echo "Phone Number ";
echo $_POST["PHONE_NUM"];
echo "<br>";

echo "Email Address ";
echo $_POST["EMAIL"];
echo "<br>";
echo "<br>";
echo "<br>";

//NEW BILLING INFO
echo "<hr/>";
echo "BILLING INFORMATION";
echo "<br>";
echo "<br>";
echo "CC#: ";
echo $_POST["CC_NUM"];
echo "<br>";

echo "TYPE: ";
echo $_POST["CC_TYPE"];
echo "<br>";

echo "CC Expiration: ";
echo $_POST['MONTH'];
echo "/";
echo $_POST['YEAR'];
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


echo "<form>";
echo "<input type=\"button\" value=\"HOME\" name=\"home\" onclick=\"location.href='main.html'\"/>";
echo "</form>";



mysql_close($conn);



?>