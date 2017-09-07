<form class="form-horizontal" enctype="multipart/form-data" action="add/add" method="post" id="form_photo">
	<div class="form-group">
		<label for="image_file">Изображение</label>
		<input class="form-control" type="file" name="image" id="image_file" accept="jpeg,jpg,png,gif">
	</div>
	<div class="form-group">
		<label for="comment_holder">Комментарий</label>
		<textarea id="comment_holder" name="comment" placeholder="Комментарий к фото" class="form-control" cols="20" rows="5" maxlength="200"></textarea>
	</div>
	<button type="submit" class="btn btn-success">Сохранить фото</button>
</form>