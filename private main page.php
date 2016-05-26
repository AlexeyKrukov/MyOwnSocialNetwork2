<?php
session_start();
$connect = mysql_connect('localhost','Alexey','1997');
$query = mysql_query("SELECT * FROM engine_users WHERE '$_SESSION[username]' = Login AND '$_SESSION[password]' = Password");
if($query)
{
$array = mysql_fetch_array($query);
$page = SendPage($array);
ShowPage($page);
}

function SendPage($array)
{

}

function ShowPage($page)
{

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
		<a href = "index.php" id = "one"><div class = "exit"><br><br>Exit</div></a>
	</div>
	<div class = "content">
	</div>
	<div class = "left-sidebar">
	<a href = "private main page.php"><div class = "Menu"><br><br>My page</div></a>
	<a href = "personal blog.php"><div class = "Menu" id = "first"><br><br>Blog</div></a>
	<a href = "settings of page.php"><div class = "Menu" id = "second"><br><br>Settings</div></a>
	</div>
	<div class = "footer">
	</div>
	</div>
</body>
</html>