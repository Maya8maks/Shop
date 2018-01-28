<div class="create">
	<p><a href="/admin/user?method=create">Створити користувача</a></p>	
</div>

<table style="border-collapse: collapse;">
	<tr style="border-collapse: collapse;">
		<td style="border: solid 1px black; padding: 10px">номер</td>
		<td style="border: solid 1px black; padding: 10px">ім'я</td>
		<td style="border: solid 1px black; padding: 10px">email</td>
		<td style="border: solid 1px black; padding: 10px">логін</td>
		<td style="border: solid 1px black; padding: 10px">редагування</td>
		<td style="border: solid 1px black; padding: 10px">видалення</td>
	</tr>
	<?php 
	global $_config, $_page;
	$i=$_page*$_config['items_on_page']; ?>
	<?php
	
	foreach ($data['user'] as $key => $user) {

		$i++;
		?>
		<tr style="border-collapse: collapse;">
			<td style="border: solid 1px black; padding: 10px">
				<?=$i ?></td>
				<td style="border: solid 1px black; padding: 10px">
					<?=$user['name'] ?></td>
					<td style="border: solid 1px black; padding: 10px">
						<?=$user['email']?></td>
						<td style="border: solid 1px black; padding: 10px">
							<?=$user['login']?></td>
							<td style="border: solid 1px black; padding: 10px">
								<a href="/admin/user?method=edit&id=<?=$user['id']?>">Редагувати</a></td>
								<td style="border: solid 1px black; padding: 10px">
									<a href="/admin/user?method=delete&id=<?=$user['id']?>">Видалити</a></td>
								</tr>
								
								<?php
							}
							?>
						</table>

						<div class="pagination">

							<?php pagination(
								$data['pagination']['pages_count'],
								'/admin/user'
								); ?>

							</div>