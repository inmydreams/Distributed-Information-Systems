<?php 

$host = "127.0.0.1"; 
$user = "";
$pass = ""; 
$db_name = "chat"; 

$con = new mysqli($host,$user,$pass,$db_name);

function formatDate($date){
    date_default_timezone_set('Europe/Vilnius');
	return date('H:i', strtotime($date));
}

?>