<form action="/admin/product/?method=update" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="form[id]" value="<?=$data['product']['id']?>">

	<input type="text" name="form[title]" value="<?=$data['product']['title']?>"><br/>
	<input type="text" name="form[description]" value="<?=$data['product']['description']?>"><br/>
	<input type="text" name="form[price]" value="<?=$data['product']['price']?>"><br/>
	<?php
	var_dump($data['product']['category_id']);
	
	?>
	<select name="form[category_id]" id="">
	
		<?php 

		foreach ($data['category'] as $key => $category){?>
			<option value="<?=$category['id']?>" 
			<?= ($category['id']==$data['product']['category_id']) ? 'selected' : '' ?>>
			<?=$category['title']?>
			</option>
		<?php
		}
		?>
	</select>
	<!-- Avatar: <input type="file" name="avatar" ><br/><br/> -->
	<button type="submit">Update</button>
</form>
