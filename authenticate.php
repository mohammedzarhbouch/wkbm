<?php
session_start();

include('conn.php');

if ( !isset($_POST['email'], $_POST['password']) ) {
	
	exit('Please fill both the username and password fields!');
}

if ($statement = $con->prepare('SELECT id, password FROM user WHERE email = ?')) {
	
	$statement->bind_param('s', $_POST['email']);
	$statement->execute();
	$statement->store_result();

	if ($statement->num_rows > 0) {
		$statement->bind_result($id, $password);
		$statement->fetch();
		
		$password_text = $_POST['password'];

		$bool = password_verify($password_text, $password);

		if ($bool === true) {
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['id'] = $id;
			header('Location: index.html');
		} else {
			header(("Location: test.html"));
		}
	} else {
		header(("Location: google.com"));
	}

	$statement->close();
	
}





?>