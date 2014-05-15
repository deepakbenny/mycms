<?php

include_once('../includes/connection.php');
session_start();

if(isset($_SESSION['logged_in'])) { 
	if(isset($_POST['title'],$_POST['content'])) {
		$title = $_POST['title'];
		$content = nl2br($_POST['content']);

		if(empty($title) or empty($content)) {
			$error = "All fields are required";
		} else {
			$query = $pdo->prepare('INSERT INTO articles (article_title,article_content,article_timestamp) VALUES (?, ?, ?)');
			$query->bindValue(1,$title);
			$query->bindValue(2,$content);
			$query->bindValue(3,time());

			$query->execute();

			header('Location: ../index.php');	
		}
	}
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Add article</title>
		<link rel="stylesheet" href="../CSS/add.css" />
	</head>
	<body>
		<div class="wrap">
			<div class="header">
				<h3>Add blog</h3>
			</div>

			<div class="container">
				<form action="add.php" method="POST" accept-charset="utf-8">
					<span id="info">Enter title here: </span><input type="text" name="title" id="titlebox" placeholder="Blog title" />
					<textarea rows="15" cols="50" id="blogbox" placeholder="Enter content" name="content"></textarea>
					<br/>
					<input type="submit" id="submitbutton" value="Add article" />
					<input type="button" onclick="location.href='../index.php'" id="submitbutton" value="Cancel" />					
				</form>
				
				<?php if(isset($error)){ ?>
				<div class="errmessage">
					<?php echo $error; ?>
				</div>

				<?php }?>

				
			</div>
		</div>
	</body>

	</html>

	<?php } else {
		header('Location: index.php');
	}?>