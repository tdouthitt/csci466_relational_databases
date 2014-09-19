<?php
//
//

$hostname = "students";    //name of the server
$username = "cs566103";    //id of the user
$password = "JAwDGP7LR";   //password of the user
$db = "cs566103";          //name of the database


//connect to the database
$conn = mysql_connect($hostname,$username,$password);
if (!$conn) {
  die("Could not connect: " . mysql_error());
}

//select the database
$db_selected = mysql_select_db($db, $conn);
if (!$db_selected) {
   die ("Can\"t use " . $db . mysql_error());
}

//EXTRACT NEW CUSTOMER_ID FROM INSERTED VALUES
$sql_CUST = "SELECT * FROM CUSTOMER WHERE CUSTOMER_NAME LIKE '%$_POST[name]%'";

//execute the SQL statement
$result_CUST = mysql_query($sql_CUST, $conn);
if (!$result_CUST)
{
die( "Could not execute sql:1" . mysql_error());
}

$row = mysql_fetch_array($result_CUST);

//DELETE FROM CUSTOMER
//define the SQL statement
$sql_DEL = "DELETE FROM CUSTOMER WHERE CUSTOMER_NAME = '$_POST[name]'";

//execute the SQL statement
$result_DEL = mysql_query($sql_DEL, $conn);
if (!$result_DEL){
    die( "Could not execute sql:" . mysql_error());
}

//DELETE FROM CREDIT
//define the SQL statement
$sql_CRED = "DELETE FROM CREDIT WHERE CUSTOMER_ID = '$row[CUSTOMER_ID]'";

//execute the SQL statement
$result_CRED = mysql_query($sql_CRED, $conn);
if (!$result_CRED){
    die( "Could not execute sql:" . mysql_error());
}

//DELETE FROM BOOKING
//define the SQL statement
$sql_BOOK = "DELETE FROM BOOKING WHERE CUSTOMER_ID = '$row[CUSTOMER_ID]'";

//execute the SQL statement
$result_BOOK = mysql_query($sql_BOOK, $conn);
if (!$result_BOOK){
    die( "Could not execute sql:" . mysql_error());
}



echo "<BODY bgcolor=\"#324dca\" text=\"#39e5e5\">";
echo "<form>";
echo "<input type=\"button\" value=\"HOME\" name=\"home\" onclick=\"location.href='main.html'\"/>";
echo "</form>";
echo "1 record deleted";


//close the connection to MySQL
mysql_close($conn);

?>
