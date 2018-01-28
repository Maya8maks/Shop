<?php
if($subAction=='order'&& $method=='edit'){
	$id=$_GET['id'];
	$products=getProducts($db);
	$users=getUsers($db);
	$order = getOrderId($db, $id);

	view('admin/orderEdit', ['order'=>$order, 'product'=>$products, 'user'=>$users]);
}
else if($subAction=='order'&& $method=='update'){

	$res= saveOrder($db, $_POST['form']);

	header('location: /admin/order');
	exit();
}
else if($subAction=='order'&& $method=='delete'){
	$id=$_GET['id'];
	$res= deleteOrder($db, $id);
	header('location:/admin/order');
	exit();
}

else if($subAction=='order'){
	$users= getUsers($db);	
	$orders= getOrders($db);

	foreach ($orders as $key => $order) {
		$productsIds = explode(',', $order['product_id']);
		$products = [];
		foreach ($productsIds as $productId) {
			$products[] = getProductId($db, $productId)[0];
		}

		$productTitles = [];
		$str = '';
		

		foreach ($products as $product) {
			
			$productTitles[] = $product['title'];
		}
		
		$str = join(',', $productTitles); 

		$orders[$key]['product_titles'] = $str;
		
		$user= getUser($db, $order['user_id']);
		$orders[$key]['user_name']=$user[0]['name'];
		
	}
	$allOrdersCount = getOrderCount($db)[0]['order_count'];
	
	$pagination = [
	'pages_count' => ceil($allOrdersCount / $_config['items_on_page'])
	];
	
	view('admin/order',['order'=>$orders, 'pagination' => $pagination]);

}