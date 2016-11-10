<?php  
require_once 'header.php';

if(isset($_SESSION['user'])){
	destroySession();
	echo "<div class='main'>You have been logged out. Please"."<a gref='index.php'>click here</a>to refresh screen.";
}else{
	echo "<div class='main'><br>"."You cannot log out becaseu you are not logged in";
}
?>

		<br><br></div>
	</body>
</html>