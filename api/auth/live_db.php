<?php

$username="CCODEZ";
$password="CCODEZ12345";


$db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.1.20)(PORT = 1521)))(CONNECT_DATA=(SID=orcl)))" ;

$conn=oci_connect($username, $password,$db);
if(!$conn){
	// echo "failed";

}
else {
	// echo "success";
}
?>