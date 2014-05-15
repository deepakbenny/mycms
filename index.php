<?php
session_start();
include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article;
$articles = $article->fetch_all();

?>

<html>
<head>
	<meta charset="utf-8">
	<title>Blog</title>
	<link rel="stylesheet" href="CSS/style.css">
</head>

<body>
	<div class="container">
		

		<div class="userid">
			<h2>
				<?php if(isset($_SESSION['logged_in'])) { 
					echo $_SESSION['username'].' -';
				} ?>
				<a href="index.php" id="logo"> Blog</a>
			</h2>
		</div>

	</div>
	<div class="wrap">
		<div class="nav">
			<?php if(!isset($_SESSION['logged_in'])) { ?>
			<ul>
				<li><a href="../mycms/admin/index.php">Login</a></li>
			</ul>
			<?php }else { ?>
			<ul>
				<li><a href="../mycms/admin/logout.php" >Logout</a></li>
				<li><a href="../mycms/admin/add.php" >Add Article</a></li>
				<li><a href="../mycms/admin/index.php" >Home</a></li>
			</ul>


			<?php 
		}?>
	</div>
	<div class="row">
		<ul>
			<?php foreach ($articles as $article ) { ?>

			<li>
				<h2><a href="articledisplay.php?id=<?php echo $article['article_id']?>">
					<?php echo $article['article_title'];?>
				</a></h2>
				<small> 
					posted <?php echo date('l jS',$article['article_timestamp']); ?>
				</small>
				<br/>
			</li>
			<?php }?>
		</ul>
	</div>
</div>
</body>
<footer>
	<p>For the Sake of footer</p>	
</footer>
</html>