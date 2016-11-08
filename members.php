<?php  
require_once "header.php";

if(!$loggedin) die();

echo "<div class='main'>";

if(isset($_GET['view'])){
	$view = sanitizeString($_GET['view']);

	if($view == $user)	$name = "Your";
	else $name = "$view's";

	echo "<h3>$name Profile</h3>";
	showProfile($view);

	echo "<a class='button' href='messages.php?view=$view'>"."view $name message</a><br><br>";
	die("</div></body></html>");
}

if(isset($_GET["add"])){
	$add = sanitizeString($_GET['add']);

	$result = queryMysql("SELECT * FROM friends WHERE user='$add' AND friend=$user");

	if(!$result->num_rows)
		queryMysql("INSERT INTO friends VALUES ('$add', '$user')");
}elseif(isset($_GET['remove'])){
	$remove = sanitizeString($_GET['remove']);
	queryMysql("DELETE FROM friends WHERE user='$remove' AND friend='$user'");
}


?>