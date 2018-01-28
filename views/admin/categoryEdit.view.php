<form action="/admin/category/?method=update" method="POST" enctype="multipart/form-data">

	<input type="hidden" name="form[id]" value="<?=$data['category']['id']?>">

	<input type="text" name="form[title]" value="<?=$data['category']['title']?>"><br/>
	
	Picture: <input type="file" name="picture" ><br/><br/> 
	<button type="submit">Редагувати</button>
</form>