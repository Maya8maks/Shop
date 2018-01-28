<?php
function insertUser($db, $name, $email, $password,  $login){
	$insertUsers = $db->prepare("INSERT INTO users(`name`, `role`, `email`, `password`, `login`) VALUES (?, ?, ?, ?, ?)");
  $insertUsers->execute(array($name, 'customer', $email, $password, $login));
}
function getUsers($db){
  global $_config, $_page;
  $users = sql( $db, 'SELECT * FROM `users` 
    ORDER BY `id` DESC 
    LIMIT '.($_page*20).','.$_config['items_on_page'],
    [],
    'rows'
    );
  return $users;
}
function getUser($db, $id){
	$user = sql( $db, 'SELECT * FROM `users` 
    WHERE `id`='.$id,
    [],
    'rows'
    );
  return $user;
}
function saveUser( $db, $userData ) {
  $user = sql($db,
    'UPDATE `users` set 
    `name` = "'. $userData['name'] .'",  
    `email` = "'. $userData['email'] .'",  
    `login` = "'. $userData['login'] .'",  
    `password` = "'.$userData['password'] .'"
    WHERE `id` = '.$userData['id']
    );
  return $user;
}
function deleteUser($db, $id){
 $user = sql( $db, 'DELETE  FROM `users` 
  WHERE `id`='.$id,
  []  
  );
 if ( file_exists( 'files/avatars/avatar_' . $id . '.jpg' ) ) {
 unlink('files/avatars/avatar_' . $id . '.jpg');
}
 return $user;
}
function getUsersCount( $db ) {
  $usersCount = sql($db,
    'SELECT COUNT(*) as users_count FROM `users`',
    [],
    'rows'
    );
  return $usersCount;
}



