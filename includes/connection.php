<?php

try{
	$pdo = new PDO('mysql:host=localhost;dbname=mycms','root','');
} catch(PDOException $e) {
	exit('Database Error');
}
?>