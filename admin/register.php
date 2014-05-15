<?php
	session_start();
	include_once('../includes/connection.php');

	if(isset($_SESSION['logged_in'])) {
		header('Location: ../index.php');

	?>
	<?php
	}
	else {
		//signup
		//validate all fields
		//enter into database 
		//redirect to login page
		if(isset($_POST['fullname'],$_POST['username'],$_POST['password'])) {
			$username = $_POST['username'];
			$fullname = $_POST['fullname'];
			$password = $_POST['password'];

			if(empty($fullname) or empty($username) or empty($password)) {
				$error = "Enter All Fields";
			} else {
				$query = $pdo->prepare("INSERT INTO users (fullname,username,password) VALUES (?,?,?)");
				$query->bindValue(1,$fullname);
				$query->bindValue(2,$username);
				$query->bindValue(3,$password);

				$result = $query->execute();

				if($result)
					$registered = "Registration Successful,Please Login";
				else
					$error = "Failed";
			}
		}
	?>



<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link rel="stylesheet" href="../CSS/register.css" />
</head>
<body>
	<div class="wrap">
		<div class="header">
			<h2>Register</h2>
			<?php if(isset($registered)) { 
				header('Location: ../admin/index.php');
			 } ?>

		</div>
		<div class="registerform">
		<?php if(isset($error)) { ?>
			<div class="errmessage">
				<p><?php echo $error ?><p>
			</div>
		<?php } ?>
		<?php if(isset($registered)) { ?>
			<div class="registermessage">
				<p>
					<?php echo $registered ?>
				<p>

			</div>
		<?php } ?>

			<form action="register.php" method="POST">
				<input type="text" name="fullname" id="textbox"placeholder="Enter Fullname" />
				<input type="text" name="username" id="textbox" placeholder="Enter Username" />
				<input type="password" name="password" id="textbox" placeholder="Enter Password" />
				<input type="submit" name="submitbutton" id="submitbutton" value="Signup"/>
				<input type="button" onclick="location.href='../index.php'" name="backbutton" id="submitbutton" value="Cancel"/>
			</form>
		</div>
	</div>	
</body>


</html>

<?php }?>