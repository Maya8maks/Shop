<?php
include "db.php";

$randUserName = ['Max','Peter', 'Dmitriy',  'Katya'];
$userEmail=['m@gmail.com', 'p@gmail.com', 'g@gmail.com', 'l@gmail.com'];
$roles = ['admin','customer'];
$logins = ['max','piter','dima','kate'];
$insertedIds= [];


function RandDateTime(){
    $year = rand(2000,2017);
    $month = rand(1,12);
    $day = rand(1,28);
    $hour = rand(0,23);
    $minute = rand(0,59);
    $second = rand(0,59);
    return $randData = "$year-$month-$day $hour:$minute:$second";
};	
function RandText(){
	$randText = ['Vehicles; apparatus for locomotion by land, air or water.','Machines and machine tools; motors (except for land vehicles); machine coupling and belting (except for land vehicles); agricultural implements; incubators for eggs.','Hand tools and implements (hand operated); cutlery, forks and spoons; side arms; razors.',' Apparatus for lighting, heating, steam generating, cooking, refrigerating, drying, ventilating, water supply and sanitary purposes'];
	return $randText[rand(0,3)];
};

 $insertUsers = $db->prepare("INSERT INTO users(`name`,`email`, `password`, `role`, `login`, `last_activity`) VALUES(:name,:email,:password, :role,:login, :last_activity)");
 	for ($i=0; $i <5 ; $i++) { 
 	$insertUsers->execute(array("name" => $randUserName[rand(0,3)], "email" => $userEmail[rand(0,3)], "password"=> rand(1000, 9999), "role" =>$roles[rand(0,1)], "login"=> $logins[rand(0,3)], "last_activity" =>RandDateTime()));
 	$insertedIds['users'] =$db->lastInsertId();
 	   };



 $titleCategory = ["food", "cars", "books", "funiture"];
$insertCategory = $db->prepare("INSERT INTO categories(`title`) VALUES(:title)");
 	for ($i=0; $i <5 ; $i++) { 
 	$insertCategory->execute(array("title" =>$titleCategory[rand(0, 3)]));
 	$insertedIds['categories'] =$db->lastInsertId();
 	 };
 
$titleProducts = ["toys", "cars", "phones", "tv"];
$insertProducts = $db->prepare("INSERT INTO products(`title`, `description`, `price`, `category_id`) VALUES(:title, :description, :price, :category_id)");
 	for ($i=0; $i <5 ; $i++) { 
 		
 	 	$insertProducts->execute(array("title" => $titleProducts[rand(0,3)], "description" => RandText(), "price" => rand(100, 1000), 'category_id' => rand(0,$insertedIds['categories']) ));
 	 	$insertedIds['products'] =$db->lastInsertId();
 	 	 };


 $orderStatuses = ['open','in progress','closed'];
$insertOrder = $db->prepare("INSERT INTO orders(`created_at`, `delivered_at`, `total_price`, `status`, `user_id`, `product_id`) VALUES(:created_at, :delivered_at, :total_price, :status, :user_id, :product_id)");
 	for ($i=0; $i <10 ; $i++) { 
 		
 		 	 	$insertOrder->execute(array("created_at" => RandDateTime(), "delivered_at" => RandDateTime(), "total_price" => rand(100, 1000), "status" =>$orderStatuses[rand(0,2)], 'user_id' => rand(0, $insertedIds['users']) , 'product_id' => rand(0, $insertedIds['products'])));
 };
 $insertRewies = $db->prepare("INSERT INTO reviews(`created_at`, `text`, `rating`, `user_id`, `product_id`) VALUES(:created_at, :text , :rating, :user_id, :product_id)");
 	for ($i=0; $i <5 ; $i++) { 
 		
 	 	$insertRewies->execute(array("created_at" => RandDateTime(), "text" => RandText(), "rating" => rand(0, 10),'user_id' => rand(0, $insertedIds['users']), 'product_id' => rand(0, $insertedIds['products'])));
 }