<?php

if( $action == 'catalog' && $idRout ) {
  $category = getCategoriesId($db, $idRout)[0];
  $products= getProductsId($db, $idRout);

  view('category',['category'=>$category, 'products'=>$products]);
  }



