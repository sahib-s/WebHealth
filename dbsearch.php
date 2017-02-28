<?php
$username = "openemr";
$password = "escargot";
$hostname = "localhost"; 
$title = $_GET['title'];

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");

//select a database to work with
$selected = mysql_select_db("openemr",$dbhandle) 
  or die("Could not select examples");

//execute the SQL query and return records
$result = mysql_query("SELECT title from list_options where list_id = 'immunizations' and title like '".$title."%'");
$output = "success";
//fetch tha data from the database 
while ($row = mysql_fetch_array($result)) {

   $output = $output.",".$row{'title'};
}
echo $output;
//close the connection
mysql_close($dbhandle);
?>