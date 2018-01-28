<?php
if($subAction=='user'&& $method=='edit'){
	$id=$_GET['id'];
	$user= getUser($db, $id);
	
	view('admin/userEdit', ['user' => $user[0]]);
}
else if($subAction=='user'&& $method=='update'){
	$id = $_POST['form']['id'];
	$user= getUser($db, $id)[0];
	/*var_dump($user);
	exit();*/
	foreach( $_POST['form'] as $key => $val ) {
		
		if($val!="")
			{ $user[$key] = $val;}
	}

	$res= saveUser($db, $user);
	if( $res && $_FILES['avatar'] ) {
		$fileName = 'avatar_'.$id.'.jpg';
		
		if(!file_exists('files')){
			mkdir('files/avatars', 0777, true);
		}
		
		move_uploaded_file($_FILES['avatar']['tmp_name'],'files/avatars/'.$fileName);
	}

	header('location: /admin/user');
	exit();
}
else if($subAction=='user'&& $method=='delete'){
	$id=$_GET['id'];
	$user= deleteUser($db, $id);
	header('location:/admin/user');
	exit();
}
else if($subAction=='user'&& $method=='create'){
	view('admin/userCreate');
}
else if($subAction=='user'&& $method=='insert'){
	$dataUser=$_POST['insert'];
	
	$name=$dataUser['name'];
	$email=$dataUser['email'];
	$login=$dataUser['login'];
	$password=$dataUser['password'];
	$user= insertUser($db, $name, $email, $password,  $login);
	header('location: /admin/user');
	exit();
}
else if($subAction=='user'){
	$users = getUsers($db);
	$allUsersCount = getUsersCount($db)[0]['users_count'];
	
	$pagination = [
	'pages_count' => ceil($allUsersCount / $_config['items_on_page'])
	];
	view('admin/user', ['user'=>$users, 'pagination' => $pagination]);
}


