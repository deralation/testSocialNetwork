<?php  

$dbhost = "localhost"; // Unlikely to require changing
$dbname = "socialNetwork"; // Modify these...
$dbuser = "root"; //...variables according
$dbpass = "root"; //...to your installation
$appname = "testSocialNetwork" //...and preference

$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname); 
if($connection->connect_error)
	die($connection->connect_error);

function createTable($name, $query){
	queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
	echo "Table '$name' created or already exists.<br>";
}

function queryMysql($query){
	global $connection;

	$result = $connection->query($query);

	if(!$result) die($connection->error);

	return $result;
}


function destroySession(){
	$_SESSION=array();
}

?>