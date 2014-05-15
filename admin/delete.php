<?php 

session_start();
include_once('../includes/connection.php');
include_once('../includes/articles.php');

$article = new Article;

if(isset($_SESSION['logged_in'])) {
	//display delete page
	$articles = $article->fetch_all();

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Delete</title>
	</head>
	<body>
		<form action="delete.php" method="get" accept-charset="utf-8">

		</form>
	</body>
	</html>
	<?php
} else {
	header('Location: index.php');
}
?>