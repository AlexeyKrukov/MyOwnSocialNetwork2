<?php
session_start();
if(isset($_POST['Register']))
{
	$connect = mysql_connect('localhost','Alexey', '1997') or die();
	mysql_select_db('lessons');
	$username = $_POST['login'];
	$email = $_POST['e-mail'];
	$password = $_POST["password"];
	$r_password = $_POST["r_password"];
	$captcha = $_POST["Captcha"];
	$avatar = $_POST["avatar"];
	if($captcha != $_SESSION["Captcha"])
	{
		MessageSend(2);
		MessageShow();
	}
	else if($password == $r_password && !empty($username) && !empty($email))
	{
	$md5 = md5($password);
	$query = mysql_query("INSERT INTO engine_users VALUES('$username', '$email', '$md5', '$avatar')") or die(mysql_error());//avatar понять как
	}
	else if($password != $r_password)
	{
		MessageSend(1);
		MessageShow();
	}
}

function MessageSend($type)
{
	if($type == 1)
		$_SESSION['message'] = '<div class = "MessageBlock"><b>ERROR: Passwords must match!</b></div>';
	if($type == 2)
		$_SESSION['message'] = '<div class = "MessageBlock"><b>ERROR: Repeat captcha!</b></div>';
}

function MessageShow()
{
	echo $_SESSION['message'];
}
?>
<html>

<head>
	<title> Main Page</title>
	<meta charset = "utf-8">
	<meta content = "description" text = "My personal blog for education">
	<meta content = "keywords" text = "Blog, Education">
	<title>Main Page</title>
	<link rel = "stylesheet" type = "text/css" href = "style.css" />
</head>

<body>
	<div class = "wrapper">
	<div class = "header">
		<img src = "mralexey.jpg" class = "mralexey">
	</div>
	<div class = "content">
		<img src = "registration.jpg" class = "text-registration">
	<form action = "registration.php" method = "POST" enctype="multipart/form-data" class = "form">
	<!--<p align = "middle"><strong>Registration</strong></p>-->
	<br>
	<br>
	<brs>
	<input type = "text" name = "login" placeholder = "Login" required>
	<br>
	<br>
	<input type = "email" name = "e-mail" placeholder = "E-mail" required>
	<br>
	<br>
	<input type = "password" name = "password" placeholder = "Password" required>
	<br>
	<br>
	<input type = "password" name = "r_password" placeholder = "Repeat password" required>
	<br>
	<input type = "text" name = "captcha" placeholder = "Captcha">
	<img src = "/captcha.php" alt = "Captcha" class = "captcha">
	<br>
	<br>
	<input type = "file" name = "file" accept = "image/jpeg">
	<br>
	<br>
	<input type = "submit" name = "Register" value = "Register!" class = "submit">
	<input type="reset" value="Clear!" name = "Clear" class = "submit"></p>
	<br>
	</form>
	</div>
	<div class = "left-sidebar">
	<a href = "/index.php"><div class = "Menu"><br><br>Main</div></a>
	<a href = "/registration.php"><div class = "Menu" id = "first"><br><br>Registration</div></a>
	<a href = "/ent.php"><div class = "Menu" id = "second"><br><br>Enter</div></a>
	</div>
	<div class = "footer">
	</div>
	</div>
</body>
</html>