<form action="/admin/user/?method=update" method="POST" enctype="multipart/form-data">

	<input type="hidden" name="form[id]" value="<?=$data['user']['id']?>">

	<input type="text" name="form[name]" value="<?=$data['user']['name']?>"><br/>
	<input type="text" name="form[email]" value="<?=$data['user']['email']?>"><br/>
	<input type="text" name="form[login]" value="<?=$data['user']['login']?>"><br/>
	<input type="password" name="form[password]" value=""><br/>
	Avatar: <input type="file" name="avatar" ><br/><br/>
	<button type="submit">Update</button>
</form>