<?php
if( $action == 'basket') {
	$basketProducts = [];
	if(!empty($_SESSION['basket']))
		foreach($_SESSION['basket'] as $id){
			$basketProducts[] = getProductId( $db, $id );
		}
		if(isset($_POST['clear_basket'] )) {
			if(!empty($_SESSION['basket'])){
				unset( $_SESSION['basket'] );
				$_SESSION['flash_msg'] = "Ваша корзина пуста";
			}

		}

		view('basket', ['products' => $basketProducts]);
	}