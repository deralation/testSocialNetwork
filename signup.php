<?php  
require_once "header.php";

echo <<<_END
<script>
function checkUser(user){
	if(user.value == '')
	{
		o('info').innerHTML=''
		return
	}

	params = "user=" + user.value
	request = new ajaxRequest()
	request.open("POST","checkuser.php",true)

	
}

?>