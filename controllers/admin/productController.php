<?php
if($subAction=='product'&& $method=='edit'){
	$id=$_GET['id'];
$categories = getCategories($db);
	$product= getProductId($db, $id);

	view('admin/productEdit', ['product' => $product[0], 'category' => $categories]);
}
else if($subAction=='product'&& $method=='update'){
		
	$res= saveProduct($db, $_POST['form']);

	header('location: /admin/product');
	exit();
}
else if($subAction=='product'&& $method=='delete'){
	$id=$_GET['id'];
	$res= deleteProduct($db, $id);
	header('location:/admin/product');
	exit();
}
else if($subAction=='product'){
	
	$products= getProducts($db);
	foreach ($products as $key=>$product) {
		$category = getCategoriesId($db, $product['category_id']);

		$products[$key]['category_name']=$category[0]['title'];
		
	}
	$allProductsCount = getProductCount($db)[0]['product_count'];
	
    $pagination = [
        'pages_count' => ceil($allProductsCount / $_config['items_on_page'])
    ];
	
	view('admin/product',['product'=>$products, 'pagination' => $pagination]);
	
}
