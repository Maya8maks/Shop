      <h1>Ви обрали категорію: <?=$data['category']['title'] ?></h1>
      <?php
      if(file_exists('files/pictures/picture_'.$data['category']['id'].'.jpg')) {
      	?>
      	<div>
      		<img src="/files/pictures/picture_<?=$data['category']['id']?>.jpg" style="max-width:100px;" alt="">
      	</div>
      	<?php
      }
      ?>
      
      <h2>Товари цієї категорії:</h2>
      <?php foreach( $data['products'] as  $product ) { ?>
      <a href="/product/<?=$product['id']?>"><?=$product['title']?></a><br/>
      <?php 
      }
       ?>


      
