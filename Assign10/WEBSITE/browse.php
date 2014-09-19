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

$sql = "SELECT SHIP.SHIP_ID, SHIP_NAME, CABIN.CABIN_ID, CABIN_TYPE, ITINERARY.ROUTE_ID, 
	DEPARTURE_PORT, DEPARTURE_DATE, PORT_NAME 
 	FROM SHIP
	JOIN CABIN
	ON SHIP.SHIP_ID=CABIN.SHIP_ID
	JOIN ITINERARY
	ON SHIP.SHIP_ID=ITINERARY.SHIP_ID
	JOIN STOPS
	ON ITINERARY.ROUTE_ID=STOPS.ROUTE_ID
	JOIN PORTS
	ON STOPS.PORT_ID=PORTS.PORT_ID
  	WHERE 
	PORTS.PORT_NAME='$_POST[destination]'";
	
//execute the SQL statement
$result = mysql_query($sql, $conn);
if (!$result)
{
die( "Could not execute sql:" . mysql_error());
}

$row = mysql_fetch_array($result);

//DISPLAY
echo '<table border = "2">';
//Display headings for the Customer
echo '<tr>';
echo '<td> Ship ID </td>';
echo '<td> Ship Name </td>';
echo '<td> Cabin ID </td>';
echo '<td> Cabin Type </td>';
echo '<td> Route ID </td>';
echo '<td> Departure Port </td>';
echo '<td> Departure Date </td>';
echo '<td> Port Name </td>';
echo '</tr>';
echo '<tr>';
echo '<td>', ($row["SHIP_ID"]), '</td>';
echo '<td>', ($row["SHIP_NAME"]), '</td>';
echo '<td>', ($row["CABIN_ID"]), '</td>';
echo '<td>', ($row["CABIN_TYPE"]), '</td>';
echo '<td>', ($row["ROUTE_ID"]), '</td>';
echo '<td>', ($row["DEPARTURE_PORT"]), '</td>';
echo '<td>', ($row["DEPARTURE_DATE"]), '</td>';
echo '<td>', ($row["PORT_NAME"]), '</td>';
echo '</tr>';
echo '</table> <br /> <hr />';

//echo "Ship ID: ";
//echo $row["SHIP_ID"];
//echo "<br>";
//echo "Ship Name: ";
//echo $row["SHIP_NAME"];
//echo "<br>";
//echo "Cabin ID: ";
//echo $row["CABIN_ID"];
//echo "<br>";
//echo "Cabin Type: ";
//echo $row["CABIN_TYPE"];
//echo "<br>";
//echo "Route ID: ";
//echo $row["ROUTE_ID"];
//echo "<br>";
//echo "Departure Port: ";
//echo $row["DEPARTURE_PORT"];
//echo "<br>";
//echo "Departure Date: ";
//echo $row["DEPARTURE_DATE"];
//echo "<br>";
//echo "Port Name: ";
//echo $row["PORT_NAME"];





mysql_close($conn);

?>