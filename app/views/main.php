<div class="row">
	<div class="form-group">
		<label for="param">Параметр</label>
		<select class="form-control" id="param">
			<option disabled >Параметр</option>
			<option value="date" selected>Дата</option>
			<option value="size">Размер</option>
			<option value="comment">Коментарий</option>
		</select>
		<label for="order">Порядок</label>
		<select class="form-control" id="order">
			<option disabled ></option>
			<option value="ASC" selected>Прямой</option>
			<option value="DESC">Обратный</option>
		</select>
	</div>
	
	<button type="submit" class="btn btn-default" id="sorting">Сортировать</button>
</div>

<div class="tz-gallery">
<?php
if (isset($data)){
	foreach ($data as $value) {
		echo '<div class="col-sm-6 col-md-4">
			  		
                <div class="thumbnail" id="panel_'.$value['id'].'">
                <button class="btn edit-item"><span class="glyphicon glyphicon-pencil"></span></button>
					<button class="btn remove-item"><span class="glyphicon glyphicon-remove"></span></button>
                    <a class="lightbox" href="'.$value['file'].'">
                        <img src="'.$value['file'].'" alt="'.$value['comment'].'">
                    </a>
                    <div class="caption">
                        <h3>'.$value['date'].'</h3>
                        <p>'.$value['comment'].'</p>
                    </div>
                </div>
            </div>';
	}
}
?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>