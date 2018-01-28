<?php
if( $action == 'product' && $idRout ) {

	$products = getProductId($db, $idRout);

	$order= sql( $db, 'SELECT * FROM `orders` WHERE `user_id` = '.$_SESSION['user'].' AND `status`="closed"', [],  'rows');
	$review=sql( $db, 'SELECT * FROM `reviews` WHERE `user_id` = '.$_SESSION['user'] , [],  'rows');
	$reviews=sql( $db, 'SELECT * FROM `reviews` WHERE `product_id` = '.$idRout , [],  'rows');

	if(!empty($_POST)){
		if( isset($_SESSION['user'] )) {
			if(isset($_POST['id']))	{
				$_SESSION['basket'][] = $idRout;

				$_SESSION['flash_msg'] = "Товар успішно додано в корзину";
			}
		}
		else {
			$_SESSION['flash_msg'] = 'Зареєструйтеся будь ласка.';
			header('location: /login');
			exit();
		}
	}
	if(!empty($_POST['form'])){

		$text=$_POST['form']['text_review'];
		if(isset($text)){
			if( $review['user_id'] == $_SESSION['user'] ) {
				$insertReview = $db->prepare("INSERT INTO reviews(`text`, `user_id`, `product_id`,`created_at`) VALUES (?, ?, ?, ?) ");
				$insertReview->execute(array($text, $_SESSION['user'], $idRout, date('Y-m-d H:i:s')));

			}
		}
}

		foreach ($reviews as $key => $userReview) {

			$user= getUser($db, $userReview['user_id']);
			$reviews[$key]['user_name']=$user[0]['name'];
		}

		foreach ($order as $key => $prodOrder) {

			$productsId[] = explode(',', $prodOrder['product_id']);

		}
		$productsIds=[];
		if(isset($productsId)){
			foreach ($productsId as $subarray) {
				$productsIds=array_merge($productsIds, array_values($subarray));
			}
		}
		view('product',['product'=>$products, 'productsIds'=>$productsIds,  'review'=>$review, 'reviews'=>$reviews]);

	}