<?php
/**
* Класс подгружающий все изображения в галлерею из базы данных
*/
class Model_Main extends Model
{
	public function get_data(){
		require_once 'app/core/server_info.php';
		$DB = new MyDatabase($servername,$serverusername,$serverpassword,$serverdatabase);
		return $DB->select('photo');
	}
	public function get_ordered($param,$order='ASC'){
		require_once 'app/core/server_info.php';
		$DB = new MyDatabase($servername,$serverusername,$serverpassword,$serverdatabase);
		return $DB->select('photo','*',' ORDER BY '.$param.' '.$order);
		
	}
}
?>