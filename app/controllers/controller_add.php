<?php
/**
*  Контроллер для загрузки файлов на сервер
*/
class Controller_Add extends Controller
{
	function __construct()
	{
		$this->model = new Model_Add();
		$this->view = new View();
	}
	function action_index()
	{	
		$this->view->generate('add.php','template.php');
	}
	function action_add(){
		if(isset($_POST)&&isset($_FILES))
		{
			$variable = scandir('assets/img');
			foreach ($variable as $key => $value) {
				if($value==htmlspecialchars($_FILES['image']['name'])) $file_ex=true;
			}
			if($_FILES['image']['size']>1048576){
				echo '<div class="alert alert-danger"><p>Размер файла слишком большой</p></div>';
			}
			elseif (isset($file_ex)) {
				echo '<div class="alert alert-danger"><p>Данный файл уже существует</p></div>';
			}
			else{
				date_default_timezone_set('UTC');
				$comment = ''; 
				if(isset($_POST['comment'])) $comment=htmlspecialchars($_POST['comment']);
				$upploaddir = 'assets/img/'.$_FILES['image']['name'];
				$size = $_FILES['image']['size'];
				move_uploaded_file($_FILES['image']['tmp_name'], $upploaddir);
				$this->model->set_data($upploaddir,$size,date('Y-m-d'),$comment);
				echo '<div class="alert alert-success"><p>Успешно загружен файл</p></div>';
				
			}
			
		}
		
	}
}
?>