<?php
session_start();
if(isset($_POST["Enter"]))
{
	$connect = mysql_connect('localhost','Alexey', '1997') or die();
	mysql_select_db('lessons');
	$_SESSION['username'] = $_POST['login'];
	$_SESSION['password'] = md5($_POST['password']);
	$username = $_POST['login'];
	$password = $_POST['password'];
	if(!empty($password) && !empty($username))
	{
	$md5 = md5($password);
	$query = mysql_query("SELECT * FROM engine_users WHERE Login = '$username' AND Password = '$md5'");//avatar понять как
	$user_data = mysql_fetch_array($query);
	$i = 0;
	$yes = false;
	while($i != count($user_data))
	{
	$i++;
	if($user_data[Password] == $md5 && $user_data[Login] == $username)
		{
			$yes = true;
			header("Location:private main page.php");
		}
	}
	if($yes == false)
	{
		MessageSend(1);
		MessageShow();
	}
	}
}

function MessageSend($type)
{
	if($type == 1)
		$_SESSION['message'] = '<div class = "MessageBlock"><b>ERROR: Wrong password or login.</b></div>';
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
	<img src = "enter.jpg" class = "text-enter">
	<form action = "ent.php" method = "POST" enctype="multipart/form-data" class = "form">
	<!--<p align = "middle"><strong>Registration</strong></p>-->
	<br>
	<br>
	<brs>
	<input type = "text" name = "login" placeholder = "Login" required>
	<br>
	<br>
	<input type = "password" name = "password" placeholder = "Password" required>
	<br>
	<br>
	<input type = "submit" name = "Enter" value = "Enter!" class = "submit">
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