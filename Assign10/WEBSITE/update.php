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

  

mysql_query("UPDATE CUSTOMER 
             SET CUSTOMER_NAME='$_POST[CUST_NAME]'
             WHERE CUSTOMER_NAME='$_POST[CUST_NAME]'");
mysql_query("UPDATE CUSTOMER 
             SET STREET='$_POST[STREET]'
             WHERE CUSTOMER_NAME='$_POST[CUST_NAME]'");
mysql_query("UPDATE CUSTOMER 
             SET CITY=$_POST[2]
             WHERE CUSTOMER_NAME=$_POST[0]");
mysql_query("UPDATE CUSTOMER 
             SET STATE=$_POST[3]
             WHERE CUSTOMER_NAME=$_POST[0]");
mysql_query("UPDATE CUSTOMER 
             SET ZIP=$_POST[4]
             WHERE CUSTOMER_NAME=$_POST[0]");
mysql_query("UPDATE CUSTOMER 
             SET PHONE_NUM=$_POST[5]
             WHERE CUSTOMER_NAME=$_POST[0]");
mysql_query("UPDATE CUSTOMER 
             SET EMAIL=$_POST[6]
             WHERE CUSTOMER_NAME=$_POST[CUST_NAME]");             
             
          
echo "<BODY bgcolor=\"#324dca\" text=\"#39e5e5\">";
echo "INFORMATION UPDATED";
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


mysql_close($conn);


?>