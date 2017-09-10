<?php
/**
* Класс подгружающий все изображения в галлерею из базы данных
*/
class Model_Main extends Model
{
	public function get_data(){
		$DB = new MyDatabase();
		return $DB->select('photo');
	}
	public function get_ordered($param,$order='ASC'){
		$DB = new MyDatabase();
		return $DB->select('photo','*',' ORDER BY '.$param.' '.$order);
		
	}
	public function select_data($id,$what){
		$DB = new MyDatabase();
		return $DB->select('photo',$what,' WHERE id="'.$id.'"');
	}
	public function delete_data($id)
	{
		$DB = new MyDatabase();
		$DB->delete('photo',$id);
	}
	public function update_data($id,$value){
		$DB = new MyDatabase();
		$DB->update('photo',$value,$id);
	}
}
?>