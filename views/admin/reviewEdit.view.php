<form action="/admin/review/?method=update" method="POST" enctype="multipart/form-data">

	<input type="hidden" name="form[id]" value="<?=$data['review']['id']?>">
	
	<input type="text" name="form[text]" value="<?=$data['review']['text']?>"><br/>

	</br>

	<button type="submit">Update</button>
</form>
