<?php 
	include "db_config.php";

	class Admin{
		
		public $db;
		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		
			if(mysqli_connect_errno()) {
	 
				echo "Error: Could not connect to database.";
	 
			exit;
 
			}
                 
		}

	//Login//
            public function check_admin_login($username, $password){
    
		$sql2="SELECT id from admin WHERE username='$username' and password='$password'";
			
        	$result = mysqli_query($this->db,$sql2);
        	$admin_data = mysqli_fetch_array($result);
        	$count_row = $result->num_rows;

	        if ($count_row == 1) {
                    $_SESSION['login'] = true; 
	            $_SESSION['id'] = $admin_data['id'];
	            return true;
	           
	        }
	        else{
                    echo "<script>alert('Login Failed.Wrong Username or Password')</script>";
                    return false;
			}
             }
            

    	//Fullname//
            public function get_adminname($uid){
    		$sql3="SELECT name FROM registration WHERE id = $uid";
	        $result = mysqli_query($this->db,$sql3);
	        $user_data = mysqli_fetch_array($result);
	        echo $user_data['name'];
            }
  
    	//Session//
	    public function get_admin_session(){    
	        return $_SESSION['login'];
	    }

	//Logout//
            public function admin_logout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
	    }
            
              //Package//                         
                         //Add Package//
		public function add_package($name,$description,$gender,$schedule,$fee){

			$sql="SELECT * FROM package WHERE name='$name'";

			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;


			if ($count_row == 0){
				$sql1="INSERT INTO package SET name='$name', description='$description', gender='$gender', schedule='$schedule' , fee='$fee'";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot be inserted");
        		return $result;
			}
			else { return false;}
		}
     
                //Update Package//
                  public function update_package($id,$name,$description,$gender,$schedule,$fee){

			$sql="SELECT * FROM package WHERE id='$id'";

			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;


			if ($count_row == 1){
                                 $sql1="update package set name='$name',description='$description', gender='$gender',schedule='$schedule' , fee='$fee' where id='$id'";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot be updated");
        		return $result;
			}
			else { return false;}
		}
                
                         
                         //Add Instructor//
		public function add_instructor($name, $package ,$qualification){

			$sql="SELECT * FROM instructor WHERE name='$name'";

			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;


			if ($count_row == 0){
				$sql1="INSERT INTO instructor SET name='$name', package_id='$package', qualification='$qualification'";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot be inserted");
        		return $result;
			}
			else { return false;}
		}
                
                    //Update Instructor//
         public function update_instructor($id,$name, $package,$qualification){

			$sql="SELECT * FROM instructor WHERE id='$id'";

			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;


			if ($count_row == 1){
                                 $sql1="update instructor set name='$name', package_id='$package', qualification='$qualification' where id='$id'";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot be updated");
        		return $result;
			}
			else { return false;}
		}
                
                              //Package//
            public function show_problem(){
    		$sql2="SELECT * FROM member_query";
	        $result = mysqli_query($this->db,$sql2);
                $numberofrows = $result->num_rows;
                
                if($numberofrows > 0){
			 foreach( $result as $row ) {
                                                   
                                        $problem_id = $row["id"];           
                                        $member_id = $row["id"];
                                        $problem = $row["problem"];
                                        $prolem_date = $row["problem_date"];
                                        $solution = $row["solution"];
                                        $solution_date = $row["solution_date"];
                                        
                                        
                                $sql2="SELECT * FROM registration where id = '$member_id'";
                                $result = mysqli_query($this->db,$sql2);
                                $numberofrows = $result->num_rows;

                                if($numberofrows > 0){
                                         foreach( $result as $row ) {          
                                         $member_name = $row["name"];}
                                }
                                        
					echo '<tr>';
                                        echo '<td>'; 
                                        echo $problem_id;
                                        echo '</td>';
                                        echo '<td>'; 
                                        echo $member_name;
                                        echo '</td>';
                                        echo '<td>'; 
                                        echo $problem;
                                        echo '</td>';
                                        echo '<td>'; 
                                        echo $prolem_date;
                                        echo '</td>';
                                        echo '<td>'; 
                                        echo $solution;
                                        echo '</td>';
                                        echo '<td>'; 
                                        echo $solution_date;
                                        echo '</td>';     
                        }
                    }
                }

                   public function send_solution($query_id,$solution){

			$sql="SELECT * FROM member_query WHERE id='$query_id'";

			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;


			if ($count_row == 1){
                                 $sql1="update member_query set solution='$solution' , solution_date=NOW() where id='$query_id'";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot be updated");
        		return $result;
			}
			else { return false;}
		}
                
                         }
	
?>