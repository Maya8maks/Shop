<table style="border-collapse: collapse; margin: 30px 20px">
	<tr style="border-collapse: collapse;">
		<td style="border: solid 1px black; padding: 10px">номер</td>
		<td style="border: solid 1px black; padding: 10px">імя</td>
		<td style="border: solid 1px black; padding: 10px">прізвище</td>
		<td style="border: solid 1px black; padding: 10px">адреса доставки</td>
		<td style="border: solid 1px black; padding: 10px">id товарів</td>
		<td style="border: solid 1px black; padding: 10px">назва товарів</td>
		<td style="border: solid 1px black; padding: 10px">id користувачa</td>
		<td style="border: solid 1px black; padding: 10px">імя користувачa</td>
		<td style="border: solid 1px black; padding: 10px">статус</td>
		<td style="border: solid 1px black; padding: 10px">ціна</td>
		<td style="border: solid 1px black; padding: 10px">редагування</td>
		<td style="border: solid 1px black; padding: 10px">видалення</td>
	</tr>
	<?php 
	global $_config, $_page;
	$i=$_page*$_config['items_on_page']; ?>
	<?php
	
	foreach ($data['order'] as $key => $order) {
		$i++;
		?>
		<tr style="border-collapse: collapse;">
			<td style="border: solid 1px black; padding: 10px">
				<?=$i ?></td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$order['name'] ?>
				</td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$order['surname'] ?>
				</td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$order['adress'] ?>
				</td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$order['product_id'] ?>
				</td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$order['product_titles'] ?>
				</td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$order['user_id'] ?>
				</td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$order['user_name'] ?>
				</td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$order['status'] ?>
				</td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$order['total_price'] ?>
				</td>
				<td style="border: solid 1px black; padding: 10px">
					<a href="/admin/order?method=edit&id=<?=$order['id']?>">Редагувати</a></td>
					<td style="border: solid 1px black; padding: 10px">
						<a href="/admin/order?method=delete&id=<?=$order['id']?>">Видалити</a></td>
					</tr>

					<?php
				}
				?>
			</table>
			<?php pagination(
        $data['pagination']['pages_count'],
        '/admin/order'
    ); ?>