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
		$data = $this->model->get_ordered(htmlspecialchars($_POST['param']),htmlspecialchars($_POST['order']));
		echo $this->view->generate(null,'main.php',$data);
	}
	public function action_delete(){
		$id = substr(htmlspecialchars($_POST['id']), strpos(htmlspecialchars($_POST['id']),'_')+1);
		unlink($this->model->select_data($id,'file')[0]['file']);
		$this->model->delete_data($id);
	}
	public function action_update(){
		$id = substr($_POST['id'], strpos(htmlspecialchars($_POST['id']),'_')+1);
		$this->model->update_data(array('id'=>$id),array('comment'=>htmlspecialchars($_POST['text'])));
	}
}
?>
