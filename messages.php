<?php  
require_once "header.php";

if(!$loggedin) die();

if(isset($_GET['view'])) $view = sanitizeString($_GET['view']);
else $view = $user;

if($_POST['text']){
	$text = sanitizeString($_POST['text']);

	if($text != ""){
		$pm = substr(sanitizeString($_POST['pm']), 0,1);

		$time = time();
		queryMysql("INSERT INTO messages VALUES(NULL, '$user','$view','$pm','$time','$text'");
	}
}

if($view != ""){
	if( $view == $user) $name1 = $name2 = "Your" ;
}else{
	$name1 = "<a href='members.php?view=$view'>$view</a>'s";
	$name2 = "$view's";
}

?>