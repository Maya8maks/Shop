<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/style/css.css">
</head>
<body>
  <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/">Головна</a></li>
        <li><a href="/catalog">Каталог</a></li>
        
        <?php
        if( isset( $_SESSION['user'] ) ) { 
          ?>
          <img src="/files/avatars/avatar_<?=$_SESSION['user']?>.jpg" style="max-width:100px;" alt="">     
          <li class='pull-right'> <a href="/logout">Вихід</a></li>
          <?php } 
          else  { ?>
          <li class='pull-right'><a href="/login">Вхід</a></li> 
          <?php } ?>

          <li><a href="/registration">Реєстрація</a></li>
          <li><a href="/review">Відгуки</a></li>
          <li><a href="/basket">Корзина</a></li>
        </ul>
      </div>
    </div>
  </nav>
</body>
</html>
<?php
if(isset($_SESSION['flash_msg'])){
  echo $_SESSION['flash_msg'];
  unset($_SESSION['flash_msg']);
}
?>

