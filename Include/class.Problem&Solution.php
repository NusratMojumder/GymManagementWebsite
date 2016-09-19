<?php 
	include "db_config.php";

	class ProblemSolution{
		
		public $db;
		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		
			if(mysqli_connect_errno()) {
	 
				echo "Error: Could not connect to database.";
	 
			exit;
 
			}
                 
		}

    	//Fullname//
            public function get_fullname($uid){
    		$sql3="SELECT name FROM registration WHERE id = $uid";
	        $result = mysqli_query($this->db,$sql3);
	        $user_data = mysqli_fetch_array($result);
	        echo $user_data['name'];
            }
  
    	//Session//
	    public function get_session(){    
	        return $_SESSION['login'];
	    }

	//Logout//
            public function user_logout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
	    }
            
            
         //Submit Problem//
            public function submit_problem($problem,$id){

			$sql1="INSERT INTO member_query SET  member_id='$id' , problem='$problem', problem_date=NOW(), solution='Pending', solution_date='' ";
			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot be inserted");
        		return $result;
		}
            
        //Solution//
            public function receive_solution($uid){
    		$sql2="SELECT * FROM member_query WHERE member_id = $uid";
	        $result = mysqli_query($this->db,$sql2);
                $numberofrows = $result->num_rows;
                
                if($numberofrows > 0){
			 foreach( $result as $row ) {
                                                   
                                        $problem = $row["problem"];           
                                        $problem_date = $row["problem_date"];
                                        $solution = $row["solution"];
                                        $solution_date = $row["solution_date"];
                                        
					echo '<tr>';
                                        echo '<td>'; 
                                        echo $problem;
                                        echo '</td>';
                                        echo '<td>'; 
                                        echo $problem_date;
                                        echo '</td>';
                                        echo '<td>'; 
                                        echo $solution;
                                        echo '</td>';
                                        echo '<td>'; 
                                        echo $solution_date;
                                        echo '</td>';
                                        echo '</tr>';  
            }
                }

        }}
?>