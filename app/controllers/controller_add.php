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
			date_default_timezone_set('UTC');
		//if(scandir('assets/img/'));
			$comment = ''; 
			if(isset($_POST['comment'])) $comment=$_POST['comment'];
			$upploaddir = 'assets/img/'.$_FILES['image']['name'];
			$size = $_FILES['image']['size'];
			move_uploaded_file($_FILES['image']['tmp_name'], $upploaddir);
			$this->model->set_data($upploaddir,$size,date('Y-m-d'),$comment);
			$this->view->generate('msg.php','template.php');
		}
		
	}
}
?>