<?php
$db_host="91.216.107.186"; // server 
$db_user="tut1b2046160";	//database username
$db_password="4o3t7fitu5";	//database password   
$db_name="tut1b2046160_1hzb1p";	//database name

try
{
	$db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	echo "YES";
	
}
catch(PDOEXCEPTION $e)
{
	$e->getMessage();
	
}

?>



