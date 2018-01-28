<?php
$i = 0;
$totalprice = 0;
if(!empty($_SESSION['basket'])){
	echo ("<h1>Товари в корзині :</h1>");
	
	foreach( $data['products'] as $product) {
		$i++;
		?>
		<p><?= $product[0]['title']." ".$product[0]['price']."грн";?></p>
		<?php
		$totalprice += $product[0]['price'];
		}
	?>
		<p>Загальна сума покупки=<?=$totalprice." "."грн";?></p>
	
	<p>Загальна кількість=<?=$i;?></p>
	
	 <div> 
		<form  method='post'>
			<input type="hidden" name="clear_basket" value=1>
			<button class="btn btn-primary" type="submit" >Очистити корзину</button >
			</form>
		</div> 
	<div> 
		<form  method='post' action="/order">
			<div class="form-group">
  								<input name='name' type="text" class="form-control"  placeholder="Ваше Імя" value=""> 
  							</div>
  							<div class="form-group">
  								<input name='surname' type="text" class="form-control"  placeholder="Ваше прізвище" value=""> 
  							</div>
  							<div class="form-group">
  								<input  name='adress' type="text" class="form-control"  placeholder="Адреса доставки" value="">
  							</div>
  							
			<button class="btn btn-primary" type="submit" >Зробити замовлення</button >
			</form>
			 
		

		<?php
	}
	?>