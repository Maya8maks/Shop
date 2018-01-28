<?php
function getCategories( $db ) {
    $_page = $_GET['page'] ?? 0;
    global $_config, $_page;
    $category = sql( $db, 'SELECT * FROM `categories` ORDER BY `id` DESC
       LIMIT '.($_page*20).','.$_config['items_on_page'],
       [],
       'rows'
       );
    return $category;
}
function getReviews( $db ) {
    $_page = $_GET['page'] ?? 0;
    global $_config, $_page;
    $review = sql( $db, 'SELECT * FROM `reviews` ORDER BY `id` DESC
       LIMIT '.($_page*20).','.$_config['items_on_page'],
       [],
       'rows'
       );
    return $review;
}
function getProducts( $db ) {
    global $_config, $_page;
    $products = sql( $db, 'SELECT * FROM `products` ORDER BY `id` DESC 
        LIMIT '.($_page*20).','.$_config['items_on_page'], [], 'rows' );
    return $products;
}
function getOrders( $db ) {
    global $_config, $_page;
    $orders = sql( $db, 'SELECT * FROM `orders` 
        ORDER BY `id` DESC 
        LIMIT '.($_page*20).','.$_config['items_on_page'], [], 'rows' );
    return $orders;
}
function getCategoriesId($db, $idRout){
	$res = sql( $db,  'SELECT * FROM `categories` WHERE `id` = '.$idRout, [], 'rows' );
	return $res;
}
function getReviewsId($db, $idRout){
    $res = sql( $db,  'SELECT * FROM `reviews` WHERE `id` = '.$idRout, [], 'rows' );
    return $res;
}
function getProductsId($db, $idRout){
	$res = sql( $db, 'SELECT * FROM `products` WHERE `category_id` = '.$idRout, [],  'rows');
	return $res;
}
function getProductId($db, $idRout){
	$res = sql( $db, 'SELECT * FROM `products` WHERE `id` = '.$idRout, [], 'rows');
	return $res;
}
function getOrderId($db, $idRout){
    $res = sql( $db, 'SELECT * FROM `orders` WHERE `id` = '.$idRout, [],  'rows');
    return $res;
}
function saveCategory( $db, $categoryData ) {
    $category = sql($db,
        'UPDATE `categories` set 
        `title` = "'. $categoryData['title'] .'"  
        WHERE `id` = '.$categoryData['id']
        );
    return $category;
}
function saveReview( $db, $reviewData ) {
    $review = sql($db,
        'UPDATE `reviews` set 
        `text` = "'. $reviewData['text'] .'"  
        WHERE `id` = '.$reviewData['id']
        );
    return $review;
}
function deleteCategory($db, $id){
 $category = sql( $db, 'DELETE  FROM `categories` 
    WHERE `id`='.$id,
    []  
    );
 return $category;
}
function deleteReview($db, $id){
 $review = sql( $db, 'DELETE  FROM `reviews` 
    WHERE `id`='.$id,
    []  
    );
 return $review;
}
function insertCategory($db, $dataCategory){
	$insertCategory = $db->prepare("INSERT INTO categories(`title`) VALUES (?) ");
    $insertCategory->execute(array($dataCategory['title']));
}

function saveProduct( $db, $productData ) {
    $product = sql($db,
        'UPDATE `products` set 
        `title` = "'. $productData['title'] .'" ,
        `description` = "'. $productData['description'] .'" ,
        `price` = "'. $productData['price'] .'" ,
        `category_id` = "'. $productData['category_id'] .'"
        WHERE `id` = '.$productData['id']
        );
    return $product;
}
function saveOrder( $db, $orderData ) {
    $product = sql($db,
        'UPDATE `orders` set 
        `total_price` = "'. $orderData['total_price'] .'",
        `status` = "'. $orderData['status'] .'"
         WHERE `id` = '.$orderData['id']
        );
    return $product;
}
function deleteProduct($db, $id){
    $res = sql( $db, 'DELETE  FROM `products` 
        WHERE `id`='.$id,
        []  
        );
    return $res;
}
function deleteOrder($db, $id){
    $res = sql( $db, 'DELETE  FROM `orders` 
        WHERE `id`='.$id,
        []  
        );
    return $res;
}
function getCategoryCount( $db ) {
    $categoryCount = sql($db,
        'SELECT COUNT(*) as category_count FROM `categories`',
        [],
        'rows'
        );
    return $categoryCount;
}
function getProductCount( $db ) {
    $productCount = sql($db,
        'SELECT COUNT(*) as product_count FROM `products`',
        [],
        'rows'
        );
    return $productCount;
}
function getOrderCount( $db ) {
    $orderCount = sql($db,
        'SELECT COUNT(*) as order_count FROM `orders`',
        [],
        'rows'
        );
    return $orderCount;
}
function getReviewCount( $db ) {
    $reviewCount = sql($db,
        'SELECT COUNT(*) as review_count FROM `reviews`',
        [],
        'rows'
        );
    return $reviewCount;
}

