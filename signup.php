<?php  
require_once "header.php";

echo <<<_END
<script>
function checkUser(user)
{
	if(user.value == '')
	{
		O('info').innerHTML=''
		return
	}

	params = "user=" + user.value
	request = new ajaxRequest()
	request.open("POST","checkuser.php",true)
	request.setRequestHeader("Content-type",params.length)
	request.setRequestHeader("Connection","close")
	request.onreadystatechange = function()
	{
		if(this.readyState == 4)
			if(this.status == 200)
				if(this.responseText != null)
					O('info').innerHTML = this.responseText
	}
	request.send(params)
}


function ajaxRequest(){
	try{var request = new XMLHttpRequest()}
		catch(e1){try{request = new ActiveXObject("Msxml2.XMLHTTP")}
			catch(e2){try{request = new ActiveXObject("Microsoft.XMLHTTP")}
				catch(e3){
					request = false
				}
			}
		}
	return request 
}
</script>
<div class='main'><h3>Please enter your details to sign up </h3>
_END;

	$error = $user = $pass = "";
	if(isset($_SESSION["user"]))
		destroySession();

	if(isset($_POST["user"]))
	{
		$user = sanitizeString($_POST["user"]);
		$pass = sanitizeString($_POST["pass"]);
	}

	if($user == "" || $pass == "")
		$error = "Not all fields were entered<br><br>";
	else
	{
		$result = queryMysql("SELECT * FROM members WHERE user='$user'");

		if($result->num_rows)
			$error = "That username is already exits<br><br>";
		else{
			queryMysql("INSERT INTO members VALUES('$user','$pass')");
			die("<h4>Account Created</h4>Please log in.<br><br>");
		}
	}
}

echo <<<_END
	<form method="post">
_END;

?>