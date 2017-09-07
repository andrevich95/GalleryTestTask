<form class="form-inline">
	<select class="form-control" id="param">
	<option disabled>Параметр</option>
	<option value="date">Дата</option>
	<option value="size">Размер</option>
</select>
<select class="form-control" id="order">
	<option disabled>Порядок</option>
	<option value="date">Прямой</option>
	<option value="size">Обратный</option>
</select>
<button class="btn btn-default" id="sort">Сортировать</button>
</form>

<div class="lib">
<?php
foreach ($data as $value) {
	echo '<div class="col-sm-4"><div class="panel"><div class="panel-body">';
	echo '<img class="img-rounded" src="'.$value['file'].'"/>';
	echo '</div><div class="panel-footer"><p>'.$value['comment'].'</p>';
	echo '</div></div></div>';
}
?>
</div>