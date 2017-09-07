<?php
/*
Класс для соединения с базой данных
*/

class MyDatabase
{
	private $connection;

	public function __construct($server,$username,$password,$database)
	{
		try{
			$this->connection = new PDO('mysql:host='.$server.';dbname='.$database, $username, $password);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			echo 'ERROR '.$e->getMessage();
		}
		
	}
	public function insert($table,$data){
		try {
			$sql = 'INSERT INTO '.$table.' (';
			$keys='';
			$values='';
			foreach ($data as $key => $value) {
				$keys.=$key.',';
				$values.='"'.$value.'",';
			}
			$sql .=substr($keys,0,strlen($keys)-1).') VALUES ('.substr($values,0,strlen($values)-1).');';
			$this->connection->exec($sql);
			return false; 
		} catch (PDOException $e) {
			echo 'ERROR '.$e->getMessage();
		}
		
	}
	public function select($table,$data='*',$option=null){
		try {
			if ($option!==null) {
				$sql = 'SELECT '.$data.' FROM '.$table.' '.$option.';';
			}
			else{
				$sql='SELECT '.$data.' FROM '.$table.';';
			}
			$var = $this->connection->prepare($sql);
			$var->execute();
			$result = $var->fetchAll();
			return $result;

		} catch (PDOException $e) {
			echo 'ERROR '.$e->getMessage();
		}
		
	}

	//Подумать
	public function update($table,$new,$old){
		try {
			$data = '';
			$where = '';
			foreach ($new as $key => $value) {
				if(next($new)!==null) $data.=$key.'="'.$value.'",';
				else $data.=$key.'="'.$value.' ';
			}
			foreach ($old as $key => $value) {
				if(next($new)!==null) $where.=$key.'="'.$value.'" AND';
				else $where.=$key.'="'.$value;
			}
			$sql='UPDATE '.$table.' SET '.$data.' WHERE '.$where.';';
			
		} catch (PDOException $e) {
			echo 'ERROR '.$e->getMessage();			
		}
	}
	public function __destruct(){
		$this->connection =null;
	}
	
}
?>