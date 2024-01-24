<?php 
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
class connection
{

		private $hostname = 'localhost';
		private $username = 'siron1';
		private $password = 'Siron123!@#';
		private $dbname = 'twitter';
		public $db_name = 'twitter';
		/*
		private $hostname = 'localhost';
		private $username = 'root';
		private $password = '123';
		private $dbname = 'twitter_video';
		public $db_name = 'twitter_video';
		*/
		private $conn = '';
		private $data = array();
		
		public function __construct()
		{
			$this->conn = new mysqli($this->hostname,$this->username,$this->password,$this->dbname);
			
			$this->mysqli = new mysqli("localhost", "siron1", "Siron123!@#", "twitter");
			//$this->mysqli = new mysqli("localhost", "root", "123", "twitter_video");

			//$this->access_var = 'yes';
			try
			{
				if($this->conn->connect_error)
				{
					throw new Exception('Connection Error !');
					exit;
				}
			}
			
			catch(Exception $ex)
			{
				echo $ex->getmessage();
			}
		}
		
		
		public function insert($data)
		{
			if($this->conn->query($data)==TRUE)
			{
				return  mysqli_insert_id($this->conn);
			}
			
			else
			{
				return 0;
			}
		}
		
		
		public function select($data)
		{
			$result = $this->conn->query($data);
			$data = array();
			if($result==TRUE)
			 {
				while($row = $result->fetch_array()) 
				{
					$data[] = $row;
				}
				return $data;
			 }
		}

		public function count_row($data)
		{
			$result = $this->conn->query($data);
			
			$data = $result->num_rows;
			
			return $data;
		} 
		
		public function select_where($data)
		{
			$result = $this->conn->query($data);
			$data = array();
			if($result==TRUE)
			 {
				while($row = $result->fetch_assoc()) 
				{
					$data[] = $row;
				}
				return $data;
			 }
		}
		
		public function select_where_with_param($table , $where_clause)
		{
			// check for optional where clause
			$whereSQL = '';
			if(!empty($where_clause))
			{
				// check to see if the 'where' keyword exists
				if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
				{
					// not found, add keyword
					$whereSQL = " WHERE ".$where_clause;
				} else
				{
					$whereSQL = " ".trim($where_clause);
				}
			}
			
			$qry = "SELECT * FROM $table".$whereSQL;
			
			$result = $this->conn->query($qry);
			
			$data = array();
			
			if($result==TRUE)
			 {
				while($row = $result->fetch_assoc()) 
				{
					$data[] = $row;
				}
				return $data;
			 }
		}
		
		public function select_where_with_param_order($table , $where_clause, $order)
		{
			// check for optional where clause
			$whereSQL = '';
			if(!empty($where_clause))
			{
				// check to see if the 'where' keyword exists
				if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
				{
					// not found, add keyword
					$whereSQL = " WHERE ".$where_clause;
				} else
				{
					$whereSQL = " ".trim($where_clause);
				}
			}
			
			$qry = "SELECT * FROM $table".$whereSQL.' '.$order;
			
			$result = $this->conn->query($qry);
			
			$data = array();
			
			if($result==TRUE)
			 {
				while($row = $result->fetch_assoc()) 
				{
					$data[] = $row;
				}
				return $data;
			 }
		}
		
		public function select_where_with_fields($table , $where_clause , $fields)
		{
			// check for optional where clause
			$whereSQL = '';
			if(!empty($where_clause))
			{
				// check to see if the 'where' keyword exists
				if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
				{
					// not found, add keyword
					$whereSQL = " WHERE ".$where_clause;
				} else
				{
					$whereSQL = " ".trim($where_clause);
				}
			}
			
			$qry = "SELECT $fields FROM $table".$whereSQL;
			
			$result = $this->conn->query($qry);
			
			$data = array();
			
			if($result==TRUE)
			 {
				while($row = $result->fetch_assoc()) 
				{
					$data[] = $row;
				}
				return $data;
			 }
		}
		
		public function get_field_val($table , $where_clause , $fields)
		{
			// check for optional where clause
			$whereSQL = '';
			if(!empty($where_clause))
			{
				// check to see if the 'where' keyword exists
				if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
				{
					// not found, add keyword
					$whereSQL = " WHERE ".$where_clause;
				} else
				{
					$whereSQL = " ".trim($where_clause);
				}
			}
			
			$qry = "SELECT $fields FROM $table".$whereSQL;
			
			$result = $this->conn->query($qry);
			
			$data = array();
			
			if($result==TRUE)
			 {
				while($row = $result->fetch_assoc()) 
				{
					$field_val = $row[$fields];
				}
				return $field_val;
			 }
		}
		
		public function update_where($data)
		{
			$result = $this->conn->query($data);
			if($result==TRUE)
			{
				return 1;
			}
			else
			{
				 return 0;
			}
		} 
		
		public function delete($data)
		{   
			$result = $this->conn->query($data);
			if($result==TRUE)
			 {
				return 1;
			 }
			 
			 else
			 {
				 return 0;
			 }
		}
		
		public function getExcerpt($str, $startPos, $maxLength) 
		{
			if(strlen($str) > $maxLength) 
			{
				$excerpt   = substr($str, $startPos, $maxLength-3);
				$lastSpace = strrpos($excerpt, ' ');
				$excerpt   = substr($excerpt, 0, $lastSpace);
				$excerpt  .= '...';
			}
			
			else 
			{
				$excerpt = $str;
			}
			
			return $excerpt;
		}
		
		public function InsertData($table_name, $form_data)
		{  
			// retrieve the keys of the array (column titles)
			$fields = array_keys($form_data);

			// build the query
			$sql = "INSERT INTO ".$table_name."
			(`".implode('`,`', $fields)."`)
			VALUES('".implode("','", $form_data)."')";

			// run and return the query result resource
				//echo $sql; exit;
			
			if($this->conn->query($sql)==TRUE)
			{
				return  mysqli_insert_id($this->conn);
			}
			
			else
			{
				return 0;
			}
				
		}
		
		public function DeleteData($table_name, $where_clause='')
		{
			// check for optional where clause
			$whereSQL = '';
			if(!empty($where_clause))
			{
				// check to see if the 'where' keyword exists
				if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
				{
					// not found, add keyword
					$whereSQL = " WHERE ".$where_clause;
				} else
				{
					$whereSQL = " ".trim($where_clause);
				}
			}
			// build the query
			$sql = "DELETE FROM ".$table_name.$whereSQL;

			// run and return the query result resource
			
			$result = $this->conn->query($sql);
			if($result==TRUE)
			{
				return 1;
			}
			else
			{
				 return 0;
			}
			
		}
		
		public function UpdateData($table_name, $form_data, $where_clause='')
		{
			// check for optional where clause
			$whereSQL = '';
			if(!empty($where_clause))
			{
				// check to see if the 'where' keyword exists
			if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
				{
					// not found, add key word
					$whereSQL = " WHERE ".$where_clause;
				} else
				{
					$whereSQL = " ".trim($where_clause);
				}
			}
			// start the actual SQL statement
			$sql = "UPDATE ".$table_name." SET ";

			// loop and build the column /
			$sets = array();
			foreach($form_data as $column => $value)
			{
				 $sets[] = "`".$column."` = '".$value."'";
			}
			$sql .= implode(', ', $sets);

			// append the where statement
			$sql .= $whereSQL;

			// run and return the query result
			$result = $this->conn->query($sql);
			if($result==TRUE)
			{
				return 1;
			}
			else
			{
				 return 0;
			}
		}
		
		public function randomPassword() {
			$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 6; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
			}
			return implode($pass); //turn the array into a string
		}
		
		public function getQualification($ids){
			
			$idArray = explode(',' , $ids);
			
		     foreach($idArray as $id){
				$select = "SELECT qualificationName FROM `qualification` WHERE qualificationId=".$id."";
				$data = $this->select_where($select);
				$datas[] = $data[0]['qualificationName'];
				echo  '<span class="skill-tags">'.$data[0]['qualificationName'].'</span>';
			 }
			 
			
			
			
		}
		
		public function getQualificationApi($ids){
			
			$idArray = explode(',' , $ids);
			
		     foreach($idArray as $id){
				$select = "SELECT qualificationName FROM `qualification` WHERE qualificationId=".$id."";
				$data = $this->select_where($select);
				$datas[] = $data[0]['qualificationName'];
				
			 }
			 
			return(implode(',' , $datas));
			
			
		}
		
		public function now_date(){
			date_default_timezone_set('America/Chicago');
			return date("Y-m-d H:i:s");
		}
		
		public function custom_now_date($string){
			date_default_timezone_set('America/Chicago');
			return date($string);
		}
}
?>