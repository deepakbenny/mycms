<?php

include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article;

if(isset($_GET['id']))
{
	//display article

	$id = $_GET['id'];
	$data = $article->fetch_data($id);
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo $data['article_title'] ?></title>
		<link rel="stylesheet" href="CSS/style.css">
	</head>
	<body>
		<h2><?php echo $data['article_title']; ?></h2> 
		<h3>
			-
			<small>
				posted <?php echo date('l jS', $data['article_timestamp']); ?>
			</small>
		</h3>

		<p>
			<?php echo $data['article_content']; ?>
		</p>

		<a href="index.php">&larr; Back</a>
	</body>
	</html>

	<?php 
}
else
{
	header('Location: index.php');
	exit();
}

?>