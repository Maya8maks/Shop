<?php
if($action=='review'){
	$reviews=getReviews( $db );
$products= sql( $db, "SELECT * FROM `products` ", [], 'rows' );
	
	if(!empty($_POST['form'])){
		$product_id=$_POST['form']['product_id'];
		$text=$_POST['form']['text_review'];
		if(isset($product_id) && isset($text)){
			$insertReview = $db->prepare("INSERT INTO reviews(`text`, `user_id`, `product_id`,`created_at`) VALUES (?, ?, ?, ?) ");
			$insertReview->execute(array($text, $_SESSION['user'], $product_id, date('Y-m-d H:i:s')));
		}
	}
	foreach ($reviews as $key => $review) {
		$productsIds = explode(',', $review['product_id']);
		$productsRew = [];
		foreach ($productsIds as $productId) {
			$productsRew[] = getProductId($db, $productId)[0];
		}

		$productTitles = [];
		$str = '';
		foreach ($productsRew as $product) {
			$productTitles[] = $product['title'];
		}
		
		$str = join(',', $productTitles); 
		$reviews[$key]['product_titles'] = $str;
		
		$user= getUser($db, $review['user_id']);
		$reviews[$key]['user_name']=$user[0]['name'];
	
	}
	$allReviewsCount = getReviewCount($db)[0]['review_count'];
	
	$pagination = [
	'pages_count' => ceil($allReviewsCount / $_config['items_on_page'])
	];

	view('review', ['review'=>$reviews, 'product'=>$products,'pagination' => $pagination]);
}