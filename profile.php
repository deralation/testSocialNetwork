<?php 
require_once "header.php";

if(!$loggedin) die();

echo "<div class='main'><h3>Your Profile</h3>";

$result = queryMysql("SELECT * FROM profiles WHERE user='$user'");

if(isset($_POST['text'])){
	$text = sanitizeString($_POST['text']);
	$text = preg_replace('/\s\s+/','',$text);
}

?>