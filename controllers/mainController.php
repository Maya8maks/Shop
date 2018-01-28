<?php
if( $action == 'main' ) {
include "views/header.php";	?>
		<?php }

if( $action == 'catalog'&& $idRout==null ) {
	$categories = getCategories( $db );
	$allCategoriesCount = getCategoryCount($db)[0]['category_count'];
	
    $pagination = [
        'pages_count' => ceil($allCategoriesCount / $_config['items_on_page'])
    ];
	
	view('catalog', ['category'=>$categories, 'pagination' => $pagination] );
}
?>