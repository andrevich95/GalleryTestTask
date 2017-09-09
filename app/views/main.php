<form class="form-inline" id="sorting">
	<select class="form-control" id="param">
		<option disabled selected>Параметр</option>
		<option value="date">Дата</option>
		<option value="size">Размер</option>
		<option value="comment">Коментарий</option>
	</select>
	<select class="form-control" id="order">
		<option disabled selected>Порядок</option>
		<option value="ASC">Прямой</option>
		<option value="DESC">Обратный</option>
	</select>
	<button type="submit" class="btn btn-default">Сортировать</button>
</form>

<div class="lib">
<?php
if (isset($data)){
	foreach ($data as $value) {
		echo '<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
				<div class="panel panel-default">
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