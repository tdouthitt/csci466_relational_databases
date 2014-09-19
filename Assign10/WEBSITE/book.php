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

$sql = "SELECT CABIN.CABIN_COST, CABIN.CABIN_ID, SHIP.SHIP_ID, SHIP.SHIP_COST, ITINERARY.PORT_ID, ITINERARY.DATE_COST, (CABIN.CABIN_COST + SHIP.SHIP_COST + ITINERARY.DATE_COST) AS TOTAL_COST 
        FROM CABIN, ITINERARY, SHIP 
        WHERE CABIN.CABIN_TYPE='$_POST[CABIN_TYPE]' 
        AND SHIP.SHIP_NAME='$_POST[SHIP_NAME]' 
        AND ITINERARY.DEPARTURE_DATE='$_POST[DEPARTURE_DATE]'";

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
echo "PLEASE ENTER YOUR INFORMATION";
echo "</h1>";
echo "</center>";
echo "<br>";
echo "<br>";

echo "<form action=final.php method=post>";

//INPUT HIDDEN VALUES FOR CARRY-OVER TO NEXT PHP

echo "<input type=\"hidden\" value=\"".$_POST['DEPARTURE_PORT']."\" name=\"DEPARTURE_PORT\" />";
echo "<input type=\"hidden\" value=\"".$_POST['DEPARTURE_DATE']."\" name=\"DEPARTURE_DATE\" />";
echo "<input type=\"hidden\" value=\"".$_POST['PORT_NAME']."\" name=\"PORT_NAME\" />";
echo "<input type=\"hidden\" value=\"".$_POST['COUNTRY']."\" name=\"COUNTRY\" />";
echo "<input type=\"hidden\" value=\"".$_POST['SHIP_NAME']."\" name=\"SHIP_NAME\" />";
echo "<input type=\"hidden\" value=\"".$_POST['CABIN_TYPE']."\" name=\"CABIN_TYPE\" />";

//HIDDEN BILLING INFO
echo "<input type=\"hidden\" value=\"".$row['SHIP_COST']."\" name=\"SHIP_COST\" />";
echo "<input type=\"hidden\" value=\"".$row['CABIN_COST']."\" name=\"CABIN_COST\" />";
echo "<input type=\"hidden\" value=\"".$row['DATE_COST']."\" name=\"DATE_COST\" />";
echo "<input type=\"hidden\" value=\"".$row['TOTAL_COST']."\" name=\"TOTAL_COST\" />";

echo "<input type=\"hidden\" value=\"".$row['CABIN_ID']."\" name=\"CABIN_ID\" />";
echo "<input type=\"hidden\" value=\"".$row['SHIP_ID']."\" name=\"SHIP_ID\" />";
echo "<input type=\"hidden\" value=\"".$row['PORT_ID']."\" name=\"PORT_ID\" />";
//NEW CUSTOMER INFO
echo "CUSTOMER INFORMATION";
echo "<br>";
echo "<br>";
echo "Customer Name ";
echo "<input type=\"text\" value=\"\" name=\"CUST_NAME\" />";
echo "<br>";

echo "Street ";
echo "<input type=\"text\" value=\"\" name=\"STREET\" />";
echo "<br>";

echo "City ";
echo "<input type=\"text\" value=\"\" name=\"CITY\" />";


echo "<br>";
echo "  State ";
echo "<input type=\"text\" value=\"\" name=\"STATE\" />";
echo "<br>";

echo "Zip-Code ";
echo "<input type=\"text\" value=\"\" name=\"ZIP\" />";
echo "<br>";

echo "Phone Number ";
echo "<input type=\"text\" value=\"\" name=\"PHONE_NUM\" />";
echo "<br>";

echo "Email Address ";
echo "<input type=\"text\" value=\"\" name=\"EMAIL\" />";
echo "<br>";
echo "<br>";
echo "<br>";

//NEW BILLING INFO
echo "<hr/>";
echo "BILLING INFORMATION";
echo "<br>";
echo "<br>";
echo "CC#: ";
echo "<input type=\"text\" value=\"\" name=\"CC_NUM\" />";
echo "<br>";

echo "TYPE: ";
echo "<select name=\"CC_TYPE\" id=\"CC_TYPE\" />";
echo "<option value=\"MASTERCARD\">";
echo "MASTERCARD";
echo "</option>";
echo "<option value=\"VISA\">";
echo "VISA";
echo "</option>";
echo "<option value=\"AMERICAN EXPRESS\">";
echo "AMERICAN EXPRESS";
echo "</option>";
echo "<option value=\"DISCOVER\">";
echo "DISCOVER";
echo "</option>";
echo "</select>";
echo "<br>";

echo "CC Expiration: ";
echo "<select name=\"MONTH\" id=\"MONTH\" />";
echo "<option value=\"01\">";
echo "01";
echo "</option>";
echo "<option value=\"02\">";
echo "02";
echo "</option>";
echo "<option value=\"03\">";
echo "03";
echo "</option>";
echo "<option value=\"04\">";
echo "04";
echo "</option>";
echo "<option value=\"05\">";
echo "05";
echo "</option>";
echo "<option value=\"06\">";
echo "06";
echo "</option>";
echo "<option value=\"07\">";
echo "07";
echo "</option>";
echo "<option value=\"08\">";
echo "08";
echo "</option>";
echo "<option value=\"09\">";
echo "09";
echo "</option>";
echo "<option value=\"10\">";
echo "10";
echo "</option>";
echo "<option value=\"11\">";
echo "11";
echo "</option>";
echo "<option value=\"12\">";
echo "12";
echo "</option>";
echo "</select>";

echo "<select name=\"YEAR\" id=\"YEAR\" />";
echo "<option value=\"2012\">";
echo "2012";
echo "</option>";
echo "<option value=\"2013\">";
echo "2013";
echo "</option>";
echo "<option value=\"2014\">";
echo "2014";
echo "</option>";
echo "<option value=\"2015\">";
echo "2015";
echo "</option>";
echo "</select>";

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
echo $row["SHIP_COST"];
echo "<br>";
echo "CABIN COST: $";
echo $row["CABIN_COST"];
echo "<br>";
echo "SEASONAL COST: $";
echo $row["DATE_COST"];
echo "<br>";
echo "<hr/>";
echo "<br>";
echo "TOTAL PRICE: $";
echo $row["TOTAL_COST"];
echo "<hr/>";



//BUTTON OPTIONS

echo "<input type=\"submit\" value=\"CONFIRM\" name=\"submit\" />";
echo "<input type=\"reset\" value=\"CLEAR\" name=\"submit\" />";
echo "<input type=\"button\" value=\"HOME\" name=\"home\" onclick=\"location.href='main.html'\"/>";
echo "<br>";
echo "</form>";



mysql_close($conn);



?>