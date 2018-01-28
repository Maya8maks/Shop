<?php
if($subAction=='category'&& $method=='edit'){
	$id=$_GET['id'];

	$category= getCategoriesId($db, $id);
	
	view('admin/categoryEdit', ['category' => $category[0]]);
}
else if($subAction=='category'&& $method=='update'){
	$res= saveCategory($db, $_POST['form']);
	$id=$_POST['form']['id'];
	if( $res && $_FILES['picture'] ) {
		$fileName = 'picture_'.$id.'.jpg';
		
		move_uploaded_file($_FILES['picture']['tmp_name'], 'files/pictures/'.$fileName);
	}

	header('location: /admin/category');
	exit();
}
else if($subAction=='category'&& $method=='delete'){
	$id=$_GET['id'];
	$res= deleteCategory($db, $id);
	header('location:/admin/category');
	exit();
}
else if($subAction=='category'&& $method=='create'){
	view('admin/categoryCreate');
}
else if($subAction=='category'&& $method=='insert'){
	
	$dataCategory=$_POST['insert'];
	$res=insertCategory($db, $dataCategory);
	header('location: /admin/category');
	exit();
}
else if($subAction=='category'){
	$categories = getCategories( $db );

	$allCategoriessCount = getCategoryCount($db)[0]['category_count'];
	
	$pagination = [
	'pages_count' => ceil($allCategoriessCount / $_config['items_on_page'])
	];
	
	view('admin/category', ['category'=>$categories, 'pagination' => $pagination]);
}