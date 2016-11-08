<?php  
require_once 'header.php';

if(!$loggedin) die();

if(isset($_GET['view'])){
	$view = sanitizeString($_GET['view']);
else $view = $user;

if($view==$user){
	$name1=$name2= "Your";
	$name3 = "You are";
}
else
{
	$name1= "<a href='members.php?view=$view'>$view</a>'s";
	$name2= "$view's";
	$name3= "$view is";
}

echo "<div class='main'>";

$followes = array();
$following = array();

$result = queryMysql("SELECT * FROM friends WHERE user='$view'");
$num = $result->num_rows;

for ($i=0; $i < $num ; $i++) { 
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$followers[$j] = $row['friend']; 
}

$mutual = array_intersect($followers, $following);
$followers = array_diff($followers, $mutual);
$following = array_diff($following, $mutual);
$friends = FALSE;

?>