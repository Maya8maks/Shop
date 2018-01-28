<?php
if( $action == 'login'){
	if(!empty($_POST)){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$login = $_POST['login'];
		$password = $_POST['password'];
		if( $name != '' && $email != '' && $login != '' && $password!= '' ) {
			$userLogIn =sql( $db, "SELECT * FROM `users` WHERE `name` = ? AND `login` = ? AND `email` = ? AND `password` = ? ", [$name, $login, $email, $password],  'rows');
			if(!empty($userLogIn)){
				$checkId=$userLogIn[0]['id'];
				$_SESSION['user'] = $checkId;
				$_SESSION['user_name']=$userLogIn[0]['name'];
				$_SESSION['user_role']=$userLogIn[0]['role'];
				$_SESSION['flash_msg'] = "Привіт" ." ". $userLogIn[0]['name'] ;
				include "views/header.php";
				exit();
			}
		}
	}
	view('login');
}