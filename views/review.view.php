<div class="text">
								<div class="container">
									<div class="row">
										<div class="col-sm-6 col-xs-12">
											<form  method='post'>
												<div class="form-group " >
													<p><b>Тут може бути Ваш відгук про товар:</b></p>
													
													<select name="form[product_id]" id="">
													<option>Виберіть товар</option>
	
		<?php 

		foreach ($data['product'] as $key => $product){

			?>

			<option value="<?=$product['id']?>"> 
						<?=$product['title']?>
			</option>
		<?php
		}
		?>
	</select>
													<p><textarea rows="10" cols="60" name="form[text_review]"></textarea></p>

													<div class="form-group">
														<button type="submit" class="button btn btn-primary pull-right ">Відправити</button>
													</div>
												</form>  

											</div>

										</div>
									</div>
								</div>
<table style="border-collapse: collapse; margin: 30px 20px">
	<tr style="border-collapse: collapse;">
		<td style="border: solid 1px black; padding: 10px">назва товарів</td>
		<td style="border: solid 1px black; padding: 10px">імя користувачa</td>
		<td style="border: solid 1px black; padding: 10px">відгук</td>
		<td style="border: solid 1px black; padding: 10px">дата</td>
		</tr>
		<?php
		
	foreach ($data['review'] as $key => $review) {

	?>
	<tr style="border-collapse: collapse">
			<td style="border: solid 1px black; padding: 10px">
			<?=$review['product_titles'] ?>
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
	</tr>
	<?php
}
?>
</table>
<?php pagination(
        $data['pagination']['pages_count'],
        '/admin/review'
    ); ?>