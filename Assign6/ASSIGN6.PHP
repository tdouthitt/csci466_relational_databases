<?php

$hostname = "students";
$username = "z1579803";
$password = "19910531";
$db = "z1579803";

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

//define the SQL statement
$sql = "SELECT ORDER_NUM, ORDER_DATE, CUSTOMER_NAME, STREET, CITY, STATE, ZIP
        FROM CUSTOMER, ORDERS
        WHERE CUSTOMER.CUSTOMER_NUM=ORDERS.CUSTOMER_NUM
        AND CUSTOMER.CUSTOMER_NUM='$_POST[CUST_NUM]'
        ORDER BY 
        ORDER_DATE DESC
        LIMIT 1";


//execute the SQL statement
$result = mysql_query($sql);
if (!$result){
    die( "Could not execute sql:" . mysql_error());
}
//get in the result set
		$numrows = mysql_num_rows($result);
		
		$row=mysql_fetch_array($result);
        
        if($numrows == 0) 
        {
			// output customer # not found message
            echo "CUSTOMER NUMBER NOT FOUND, PLEASE TRY AGAIN";
		}
else {
        //DISPLAY
echo "<table BORDER='1'><tr>";
echo "<th>Customer Name</th> ";
echo "<th>Order Number</th> ";
echo "<th>Order Date</th> ";
echo "<th>Street</th> ";
echo "<th>City</th> ";
echo "<th>State</th> ";
echo "<th>Zip-Code</th> ";
echo "</tr>";
echo "<tr>";

echo "<td>";
echo $row["CUSTOMER_NAME"];
echo "</td>";

echo "<td>";
echo $row["ORDER_NUM"];
echo "</td>";

echo "<td>";
echo $row["ORDER_DATE"];
echo "</td>";

echo "<td>";
echo $row["STREET"];
echo "</td>";

echo "<td>";
echo $row["CITY"];
echo "</td>";

echo "<td>";
echo $row["STATE"];
echo "</td>";

echo "<td>";
echo $row["ZIP"];
echo "</td>";



echo "</tr>";

$sql = 'SELECT OL.PART_NUM, DESCRIPTION, NUM_ORDERED, PRICE, (PRICE*NUM_ORDERED) AS TOTAL_COST
        FROM
        ORDER_LINE OL, PART P
        WHERE
        OL.PART_NUM=P.PART_NUM
        AND
        OL.ORDER_NUM='.$row['ORDER_NUM'].'';

$result = mysql_query($sql);
if (!$result)
{
    die( "Could not execute sql:" . mysql_error());
}		
			//get in the result set
			$numrows = mysql_num_rows($result);

// output the column names for part number, description, number ordered, price, and total cost
echo "<tr>";
echo "<th>Part Number</th> ";
echo "<th>Description</th> ";
echo "<th>Price</th> ";
echo "<th>Number Purchased</th> ";
echo "<th>Total Price</th> ";
echo "</tr>";
//do a for loop to loop through all the products found from this order
for($i=0; $i<$numrows; $i++) 
            {
				//display info in table
				echo '<tr>';
				//fetch a row in the result set
				$row=mysql_fetch_array($result);
				echo '<td align="center">'.($row[0]).'</td>';
				echo '<td align="center">'.($row[1]).'</td>';
				echo '<td align="center">'.($row[2]).'</td>';
				echo '<td align="center">'.($row[3]).'</td>';
				echo '<td align="center">'.($row[4]).'</td>'; 
				echo '</tr>';
				
				$totalCost += $row[4];
			}

// output the final totalcost for the entire order
// this would be the totalCost variable
echo "<tr>";
echo "<th>Total Sale Price</th> ";
echo "<td>";
echo $totalCost;
echo "</td>";
echo "</table>";



echo "INFORMATION DISPLAY COMPLETE";
     }
//close the connection to MySQL
mysql_close($conn);
?>