<?php

?>
<form action="/admin/order/?method=update" method="POST" enctype="multipart/form-data">

	<input type="hidden" name="form[id]" value="<?=$data['order'][0]['id']?>">
	<select name="form[status]" id="">
	<option value="open">open</option>
	<option value="in progress">in progress</option>
	<option value="closed">closed</option>
	</select>
	<input type="text" name="form[total_price]" value="<?=$data['order'][0]['total_price']?>"><br/>

	</br>

	<!-- Avatar: <input type="file" name="avatar" ><br/><br/> -->
	<button type="submit">Update</button>
</form>
