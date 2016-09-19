<?php 
	include "db_config.php";

	class Registration{
		
		public $db;
		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		
			if(mysqli_connect_errno()) {
	 
				echo "Error: Could not connect to database.";
	 
			exit;
 
			}
		}
public function reg_user($name,$phone,$email,$gender,$password){

			$sql="SELECT * FROM registration WHERE email_id='$email'";
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;


			if ($count_row == 0){
				$sql1="INSERT INTO registration SET name='$name', phone_no='$phone', email_id='$email', gender='$gender', password='$password' ";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot be inserted");
        		return $result;
			}
			else { return false;}
		}
	}
?>