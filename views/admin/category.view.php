<div class="create">
	<p><a href="/admin/category?method=create">Створити категорію</a></p>	
</div> 
<table style="border-collapse: collapse;">
	<tr style="border-collapse: collapse;">
		<td style="border: solid 1px black; padding: 10px">номер</td>
		<td style="border: solid 1px black; padding: 10px">назва категорії</td>
		<td style="border: solid 1px black; padding: 10px">редагування</td>
		<td style="border: solid 1px black; padding: 10px">видалення</td>
	</tr>

	<?php 

	global $_config, $_page;
	$i=$_page*$_config['items_on_page']; ?>
	<?php

	foreach ($data['category'] as $key => $category) {
		
		$i++;
		?>
		<tr style="border-collapse: collapse;">
			<td style="border: solid 1px black; padding: 10px">
				<?=$i ?></td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$category['title']?>
				</td>
				<td style="border: solid 1px black; padding: 10px">
					<a href="/admin/category?method=edit&id=<?=$category['id']?>">Редагувати</a></td>
					<td style="border: solid 1px black; padding: 10px">
						<a href="/admin/category?method=delete&id=<?=$category['id']?>">Видалити</a></td>
						
						<?php
						
						
						if(file_exists('files/pictures/picture_'.$category['id'].'.jpg')) {
							?>
							<td style="border: solid 1px black; padding: 10px">
								<img src="/files/pictures/picture_<?=$category['id']?>.jpg" style="max-width:100px;" alt=""> </td>
							</tr>

							<?php

						}
					}
					?>
				</table>

				<div class="pagination">

					<?php pagination(
						$data['pagination']['pages_count'],
						'/admin/category'
						); ?>

					</div>