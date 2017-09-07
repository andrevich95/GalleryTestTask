<?php

class Controller_Main extends Controller
{
	function __construct()
	{
		$this->model = new Model_Main();
		$this->view = new View();
	}
	function action_index()
	{	
		if(isset($_POST['by'])){
			switch($_POST['by']){
				case 'date':
					$data = $this->model->get_ordered('date',$_POST['order']);
					break;
				case 'size':
					$data = $this->model->get_ordered('size',$_POST['order']);
					break;
				default:
					$data = $this->model->get_data();
					break;
			}
		}
		else{
			$data = $this->model->get_data();
		}
		$this->view->generate('main.php','template.php',$data);
	}
}
?>