<?php

class Controller_Main extends Controller
{
	function __construct()
	{
		$this->model = new Model_Main();
		$this->view = new View();
	}
	public function action_index()
	{	
		$data = $this->model->get_data();
		$this->view->generate('main.php','template.php',$data);
	}
	public function action_sort(){
		$data = $this->model->get_ordered($_POST['param'],$_POST['order']);
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
}
?>