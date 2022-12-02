<?php
	include '../config.php';

	session_start();

	if (isset($_GET['page']) && ($_SESSION['phpcoder']!='')) {
		// $username=$_SESSION['phpcoder'];

		include 'common/header.php';
		include $_GET['page'].'.php';
		include 'common/footer.php';
	}else{
		include 'login.php';
	}
	
?>