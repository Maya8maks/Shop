<?php
if( $action == 'order') {
	if(!empty($_POST)){
		if(isset($_SESSION['basket'])){

			foreach($_SESSION['basket'] as $id){
				$basketProducts[] = getProductId( $db, $id );
			}
			$stringProduct=implode(",", $_SESSION['basket']);
			
			
			$total_price=0;
			foreach( $_SESSION['basket'] as $key => $product ) {
				$products = sql($db, "SELECT * FROM `products` WHERE `id` = $product", 
					[],  'rows'  );
				$total_price+=$products[0]['price'];
			}
			if(!empty($_POST)){
				$name = $_POST['name'];
				$surname = $_POST['surname'];
				$adress = $_POST['adress'];
				if( $name != '' && $surname != '' && $adress != '' ) {
					$insertUsers = $db->prepare("INSERT INTO orders(`user_id`, `product_id`,`status`,`total_price`, `name`, `surname`, `adress`, `created_at`) VALUES (?, ?, ?, ?, ?, ?,  ?, ?)");
					$insertUsers->execute(array($_SESSION['user'], $stringProduct,  'open', $total_price, $name, $surname, $adress, date('Y-m-d H:i:s')));
					$_SESSION['flash_msg'] = "Ваше замовлення на виконанні";

					
				}
				




			}

		}
	}
	unset($_SESSION['basket']);
}	



