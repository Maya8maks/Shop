<table style="border-collapse: collapse; margin: 30px 20px">
	<tr style="border-collapse: collapse;">
		<td style="border: solid 1px black; padding: 10px">номер</td>
		<td style="border: solid 1px black; padding: 10px">id товарів</td>
		<td style="border: solid 1px black; padding: 10px">назва товарів</td>
		<td style="border: solid 1px black; padding: 10px">id користувачa</td>
		<td style="border: solid 1px black; padding: 10px">імя користувачa</td>
		<td style="border: solid 1px black; padding: 10px">відгук</td>
		<td style="border: solid 1px black; padding: 10px">дата</td>
		<td style="border: solid 1px black; padding: 10px">редагування</td>
		<td style="border: solid 1px black; padding: 10px">видалення</td>
	</tr>
	<?php 
	global $_config, $_page;
	$i=$_page*$_config['items_on_page']; ?>
	<?php
	
	foreach ($data['review'] as $key => $review) {
		$i++;
		?>
		<tr style="border-collapse: collapse;">
			<td style="border: solid 1px black; padding: 10px">
				<?=$i ?></td>
				
				<td style="border: solid 1px black; padding: 10px">
					<?=$review['product_id'] ?>
				</td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$review['product_titles'] ?>
				</td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$review['user_id'] ?>
				</td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$review['user_name'] ?>
				</td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$review['text'] ?>
				</td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$review['created_at'] ?>
				</td>
				<td style="border: solid 1px black; padding: 10px">
					<a href="/admin/review?method=edit&id=<?=$review['id']?>">Редагувати</a></td>
					<td style="border: solid 1px black; padding: 10px">
						<a href="/admin/review?method=delete&id=<?=$review['id']?>">Видалити</a></td>
					</tr>

					<?php
				}
				?>
			</table>
			<?php pagination(
        $data['pagination']['pages_count'],
        '/admin/review'
    ); ?>