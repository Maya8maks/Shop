<table style="border-collapse: collapse; margin: 30px 20px">
<tr style="border-collapse: collapse;">
	<td style="border: solid 1px black; padding: 10px">номер</td>
	<td style="border: solid 1px black; padding: 10px">назва категорії</td>
	<td style="border: solid 1px black; padding: 10px">назва товару</td>
	<td style="border: solid 1px black; padding: 10px">опис товару</td>
	<td style="border: solid 1px black; padding: 10px">ціна</td>
	<td style="border: solid 1px black; padding: 10px">редагування</td>
	<td style="border: solid 1px black; padding: 10px">видалення</td>
</tr>
	<?php 
	global $_config, $_page;
	$i=$_page*$_config['items_on_page']; ?>
	<?php
	foreach ($data['product'] as $key => $product) {
		$i++;
		?>
		<tr style="border-collapse: collapse;">
		<td style="border: solid 1px black; padding: 10px">
		<?=$i ?></td>
		<td style="border: solid 1px black; padding: 10px">
		<?=$product['category_name']?>
		</td>
		<td style="border: solid 1px black; padding: 10px">
		<?=$product['title'] ?>
		</td>
		<td style="border: solid 1px black; padding: 10px">
		<?=$product['description'] ?>
		</td>
		<td style="border: solid 1px black; padding: 10px">
		<?=$product['price'] ?>
		</td>
		<td style="border: solid 1px black; padding: 10px">
		<a href="/admin/product?method=edit&id=<?=$product['id']?>">Редагувати</a></td>
		<td style="border: solid 1px black; padding: 10px">
		<a href="/admin/product?method=delete&id=<?=$product['id']?>">Видалити</a></td>
		</tr>
		
		<?php
	}
	?>
</table>
<?php pagination(
        $data['pagination']['pages_count'],
        '/admin/product'
    ); ?>