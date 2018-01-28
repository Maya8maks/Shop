<?php
?>
<div class='container-fluid'>
	<div class="row">
		<h1><?= $data['product'][0]['title'] ?></h1>
		<p>опис товару: '<?= $data['product'][0]['description'] ?>'</p>
		<p>ціна: '<?= $data['product'][0]['price'] ?>' грн</p>
	</div>
	<div>
		<form  method='post' >
			<input type="hidden" name='id' value=1>
			<button class="btn btn-primary" type="submit" >Відправити в корзину</button >
			</form>
		</div>
	</div>
	<?php
	$check=false;
	if(empty($data['review'])){
		$check=true;
	}
	else{
		foreach ($data['review'] as $key => $reviewProd) {

			if($reviewProd['product_id']!=$data['product'][0]['id'] ){
				$check=true;
				break;
			}
			else {
				?>
				<div>
					<p>Ви залишали відгук про цей товар:</p></br>
					<?php
					foreach ($data['review'] as $key => $review) {
						if($review['product_id']==$data['product'][0]['id']){
							echo $review['text'];
						}
					}
					?></p>
				</div>
				<?php
			}
		}
	}
	if($check){
		foreach ($data['productsIds'] as $key => $product) {
			if($product==$data['product'][0]['id']){

				?>
				<div class="text">
					<div class="container">
						<div class="row">
							<div class="col-sm-6 col-xs-12">
								<form  method='post'>
									<div class="form-group " >
										<p><b>Будь ласка, залиште Ваш відгук про товар:</b></p>
										<p><textarea rows="10" cols="60" name="form[text_review]"></textarea></p>

										<div class="form-group">
											<button type="submit" class="button btn btn-primary pull-right ">Відправити</button>
										</div>
									</form>  

								</div>

							</div>
						</div>
					</div>
					<?php
					break;
				}

			}
			
		}
	


if(!empty($data['reviews'])){

	?>
	<div>
		<p>Відгуки про цей товар:</p>
	</br>

	<?php
	foreach ($data['reviews'] as $key => $allreviews) {
		?>
		<p>Імя: <?php echo $allreviews['user_name'] ?>
		</p>
		<p>
			Відгук:<?php echo $allreviews['text'] ?>
		</p>
	</br>
	<?php
}
}
else{
	?>
	<p>відгуків по цьому товару немає</p>
	<?php
}

?>

</div>




