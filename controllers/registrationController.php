<?php
if( $action=='registration'){
	if(!empty($_POST)){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$login = $_POST['login'];
		$password = $_POST['password'];
		if( $name != '' && $email != '' && $login != '' && $password!= '' ) {
			$userCheck = sql( $db, "SELECT * FROM `users` WHERE `login` = '$login' OR `email` = '$email' ", [], 'rows' );
			if (empty($userCheck)){
				insertUser($db, $name, $email, $password,  $login);
			}
			else {
				echo "такий логін або email вже існує";
			}
		}
	}
	view('registration');
}
