 <div class="container-fluid">
<div class="row"> 
<h1>Категорії</h1>
<?php 
	global $_config, $_page;
	$i=$_page*$_config['items_on_page']; ?>
	<?php

foreach ($data['category'] as $key => $category) {
		$i++;
		?>
		<a href="/catalog/<?=$category['id']?>"><?=$category['title'] ?></a><br/>
	<?php } ?>
	 </div>
	</div> 
	<div class="pagination">
	<?php pagination(
        $data['pagination']['pages_count'],
        '/catalog'
    ); ?>
    </div>
