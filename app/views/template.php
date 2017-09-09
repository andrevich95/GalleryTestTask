<!DOCTYPE html>
<html>
<head>
	<title>Галлерея</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
	<script src='assets/js/main.js' type="text/javascript"></script>
	<script src='assets/js/modules.js' type="text/javascript"></script>
</head>
<body>
	<nav class="navbar navbar-reverse">
		<div class="container-fluid">
		    	<div class="navbar-header">
		    		<a class="navbar-brand" href="#">Галлерея</a>
		   		</div>
		    	<ul class="nav navbar-nav">
		      		<li class="active"><a href="#">Домой</a></li>
		      		<li><a href="main">Галлерея фото</a></li>
		      		<li><a href="add">Добавить фото</a></li>
		      	</ul>
	</nav>
	<div class="container">
	<?php include 'app/views/'.$content_view; ?>
	</div>
</body>	
</html>