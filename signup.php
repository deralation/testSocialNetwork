<?php  
require_once "header.php";

echo <<<_END
<script>
function checkUser(user){
	if(user.value == ''){
		o('info').innerHTML=''
		return
	}

	params = "user=" + user.value
	request = new ajaxRequest()
	request.open("POST","checkuser.php",true)
	request.setRequestHeader("Content-type",params.length)
	request.setRequestHeader("Connection","close")
	request.onreadystatechange = function(){
		if(this.readyState == 4)
			if(this.status == 200)
				if(this.responseText != null)
					O('info').innerHTML = this.responseText
	}
	request.send(params)
}


function ajaxRequest(){
	try{
		var request = new XMLHttpRequest()}
		catch(e1){
			try{request = new ActiveXObject("Msxml2.XMLHTTP")}
			catch(e2){
				try{request = new ActiveXObject("Microsoft.XMLHTTP")}
				catch(e3){
					request = false
				}
			}
		}
		return request 

	}
}
</script>
<div class='main'><h3>Please enter your details to sign up </h3>
__END;

?>