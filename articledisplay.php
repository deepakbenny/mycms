<?php
session_start();
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
		<title>
			<?php echo $data['article_title'] ?>
		</title>
		<link rel="stylesheet" 
			href="CSS/articledisplay.css">
	</head>
	<body>
		<div class="wrap">
			<div class="date">
				<h2>
				<?php echo $data['article_title']; ?>
					
				<?php if(isset($_SESSION['username'])) {
				?>
				By
				<?php 
				echo $data['article_user']; } ?>
				</h2> 
				<h3>
					-
					<small>
						posted <?php echo date('l jS', $data['article_timestamp']); ?>
					</small>
				</h3>
			</div>
			<div class="container">
				<p>
					<?php echo $data['article_content']; 
					?>
				</p>
			</div>

			<input type="button" id="backbutton"
			onclick="location.href='index.php'" 
			value="Back">
		</div>
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