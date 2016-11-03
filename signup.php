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

	request.setRequestHeader("Content-type","application/x-www-form-urlencoded")
	request.setRequestHeader("Content-length","params.length")

	request.setRequestHeader("Connection","close")
	request.onreadystatechange = function(){
		if()
	}
}

?>