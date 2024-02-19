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

		if ($_POST['password'] === $password) {
			$password_text = $_POST['password'];

			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['email'];
			$_SESSION['id'] = $id;
			header('Location: ../front-end/home.php');
		} else {
			// Incorrect password
			echo 'Incorrect username and/or password!';
		}
	} else {
		// Incorrect username
		echo 'Incorrect username and/or password!';
	}





$statement->close();
}