<?php

session_start();
include_once('../includes/connection.php');

if(isset($_SESSION['logged_in'])) {
	//header('Location: ../index.php');

	
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Blog</title>
		<link rel="stylesheet" href="../CSS/userprofile.css">
	</head>
	<body>
		<div class="wrap">
		
			<div class="header">
				<h2>Welcome <?php echo $_SESSION['username']; ?></h2>
				<p>Goto
				<a href="../index.php" >Home</a>
				This page is under Construction
				</p>
			</div>
			<div class="container">
				<h4>Under Construction</h4>
				
				<h3>To Do</h3>
				
				<ul>
					<h4>Registration</h4>
					<li>User Validation</li>
					<li>Duplicate Entries</li>
					<h4>User Profile</h4>
					<li>Personiled Blogs</li>
					<li>Edit Blog</li>
					<li>Deletion Feature</li>
					<h4>Blog</h4>
					<li>Fix Date</li>
				</ul>

			</div>
		</div>
	</body>
	</html>
	<?php

} else {
	
	if (isset($_POST['username'],$_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(empty($username) or empty($password)) {
			$error =  "Enter all Fields";
		} else {
			$query = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
			$query->bindValue(1,$username);
			$query->bindValue(2,$password);

			$query->execute();

			$num = $query->rowCount();

			if($num == 1) {
				//user entered correct details
				
				$_SESSION['logged_in'] = true;
				$_SESSION['username'] = $username;
				header('Location: index.php');
				exit();
			} else {
				$error = "Incorrect Details";
			}
		}
	}
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Login</title>
		<link rel="stylesheet" href="../CSS/login.css">
	</head>
	<body>

<div class="wrap">
<h3>Login</h3>
<?php if(isset($error)) { ?>
			<div class="errmessage">
				<p><?php echo $error ?><p>
			</div>
		<?php } ?>
	<div class="loginform">
		<form action="index.php" method="POST" >
			<input type="text" name="username" id="textbox" placeholder="username" />
			<input type="password" name="password" id="textbox" placeholder="password" />
			<input type="submit" id="submitbutton"value="Login" />
			<input type="button" id="register" onclick="location.href='register.php';"value="Register" />
			<br/>
		</form>
	</div>

		
</div>
	</body>
	</html>
	<?php }?>