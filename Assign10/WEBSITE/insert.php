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

//define the SQL statement
$sql = "INSERT INTO CUSTOMER (null, CUSTOMER_NAME, STREET, CITY, STATE, ZIP, PHONE_NUM, EMAIL)
VALUES ('$_POST[id]','$_POST[name]','$_POST[street]','$_POST[city]','$_POST[state]','$_POST[zip]','$_POST[phone]','$_POST[email]')";

//execute the SQL statement
$result = mysql_query($sql, $conn);
if (!$result){
    die( "Could not execute sql:" . mysql_error());
}

echo "<BODY bgcolor=\"#324dca\" text=\"#39e5e5\">";
echo "<form>";
echo "<input type=\"button\" value=\"HOME\" name=\"home\" onclick=\"location.href='main.html'\"/>";
echo "</form>";
echo "1 record added";

//close the connection to MySQL
mysql_close($conn);

?>
