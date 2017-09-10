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

<div class="lib">
<?php
if (isset($data)){
	foreach ($data as $value) {
		echo '<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
				<div class="panel panel-default" id="panel_'.$value['id'].'">

				<div class="panel-header pull-right">
					<button class="btn edit-item"><span class="glyphicon glyphicon-pencil"></span></button>
					<button class="btn remove-item"><span class="glyphicon glyphicon-remove"></span></button>
				</div>
			  		<div class="panel-body">
			  			<img src="'.$value['file'].'">
			  		</div>
			  		<div class="panel-footer">
			  			<p class="pull-right">'.$value['date'].'</p>
			  			<p>'.$value['comment'].'</p>
			  		</div>
				</div>
			</div>';
	}
}
?>
</div>