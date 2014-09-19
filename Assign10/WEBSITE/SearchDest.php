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

//Search cruise by date
$sql = "SELECT IT.DEPARTURE_PORT,IT.DEPARTURE_DATE,PO.PORT_NAME,PO.COUNTRY 
        FROM ITINERARY IT,PORTS PO 
        WHERE IT.PORT_ID =PO.PORT_ID 
        AND PO.PORT_NAME ='$_POST[destination]'";

//execute the SQL statement
$result = mysql_query($sql, $conn);
if (!$result)
{
die( "Could not execute sql:" . mysql_error());
}

$row = mysql_fetch_array($result);


echo "<BODY bgcolor=\"#324dca\" text=\"#39e5e5\">";
echo "<form action=ShipCabin.php method=post>";
echo "DEPARTURE PORT ";
echo "<input type=\"text\" value=\"".$row['DEPARTURE_PORT']."\" name=\"DEPARTURE_PORT\" readonly=\"readonly\" />";
echo "<br>";
echo "DEPARTURE_DATE ";
echo "<input type=\"text\" value=\"".$row['DEPARTURE_DATE']."\" name=\"DEPARTURE_DATE\" readonly=\"readonly\" />";
echo "<br>";
echo "PORT_NAME ";
echo "<input type=\"text\" value=\"".$row['PORT_NAME']."\" name=\"PORT_NAME\" readonly=\"readonly\" />";
echo "<br>";
echo "  COUNTRY ";
echo "<input type=\"text\" value=\"".$row['COUNTRY']."\" name=\"COUNTRY\" readonly=\"readonly\" />";
echo "<br>";
echo "<input type=\"submit\" value=\"BOOK\" name=\"submit\" />";
echo "<input type=\"reset\" value=\"CLEAR\" name=\"submit\" />";
echo "<input type=\"button\" value=\"HOME\" name=\"home\" onclick=\"location.href='main.html'\"/>";
echo "<br>";
echo "</form>";



mysql_close($conn);



?>