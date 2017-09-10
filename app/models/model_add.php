<?php
class Model_Add extends Model
{
	public function get_data(){
	}
	public function set_data($file,$size,$date,$comment=null){
		$DB = new MyDatabase();
		$data = array('file'=>$file,'size'=>$size,'date'=>$date,'comment'=>$comment);
		$DB->insert('photo',$data);
	}
}
?>