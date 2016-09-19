<?php 
	include "db_config.php";

	class LoginMemberDetail{
		
		public $db;
		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		
			if(mysqli_connect_errno()) {
	 
				echo "Error: Could not connect to database.";
	 
			exit;
 
			}
                 
		}

	//Login//
            public function check_login($email, $password){
        	
                    $flag = 0;
                    
			$sql2="SELECT id from registration WHERE email_id='$email' and password='$password'";
			
        	$result = mysqli_query($this->db,$sql2);
        	$user_data = mysqli_fetch_array($result);
        	$count_row = $result->num_rows;
		
	        if ($count_row == 1) {

	           $flag = 1;
	        }
	        else{
                    echo "<script>alert('Wrong Username or Password')</script>";
                    $flag = 0;
			    return false;
			}
                        
                
                if ($flag) {       
			
                    $sql2="SELECT id from registration WHERE email_id='$email' and password='$password' and admin_confirmation='1'";
			
        	$result = mysqli_query($this->db,$sql2);
        	$user_data = mysqli_fetch_array($result);
        	$count_row = $result->num_rows;
		
	        if ($count_row == 1) {
                    $_SESSION['login'] = true; 
	            $_SESSION['id'] = $user_data['id'];
	            return true;
	           
	        }
	        else{
                    echo "<script>alert('Registration request pending')</script>";
                    $flag = 1;
			    return false;
			}
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
            
        //View Basic Info//
            public function view_basic_info($uid){
    		$sql2="SELECT * FROM registration WHERE id = $uid";
	        $result = mysqli_query($this->db,$sql2);
	        $user_data = mysqli_fetch_array($result);
                
                $name = $user_data['name'];
                $phone = $user_data['phone_no'];
                $email = $user_data['email_id'];
                $gender = $user_data['gender'];
                $password = $user_data['password'];
                
                echo '<h3>';echo $name;
                echo '<br>';echo $phone;
                echo '<br>';echo $email;
                echo '<br>';echo $gender;
                echo '<br>';echo $password;
                echo '</h3>';
            }
            
                //Update Basic Info//
		public function edit_basic_info($id,$name,$phone,$email,$gender,$password){

			$sql="SELECT * FROM registration WHERE id='$id'";

			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;


			if ($count_row == 1){
                                    $sql1="update registration set name='$name', phone_no='$phone', email_id='$email', gender='$gender', password='$password' where id='$id' ";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot be updated");
        		return $result;
			}
			else { return false;}
		}
                
           public function diet_plan($uid){
    		$sql2="SELECT * FROM member WHERE registration_id = $uid";
	        $result = mysqli_query($this->db,$sql2);
	        $user_data = mysqli_fetch_array($result);
                
                $diet_plan = $user_data['diet_plan'];
                echo $diet_plan;
                                      
                }
        
            public function update_diet_plan($diet_plan,$id){

			$sql="SELECT * FROM member WHERE registration_id='$id'";

			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;


			if ($count_row == 1){
                                 $sql1="update member set diet_plan='$diet_plan' where registration_id='$id' ";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot be updated");
        		return $result;
			}
			else { return false;}
		}
                
             //View Basic Info//
            public function view_package_instructor($uid){
    		$sql="SELECT * FROM member WHERE registration_id = $uid";
	        $result = mysqli_query($this->db,$sql);
	        $user_data = mysqli_fetch_array($result);
                
                $package_id = $user_data['package_id'];
                $instructor_id = $user_data['instructor_id'];

                $sql2="SELECT * FROM package WHERE id = $package_id";
	        $result2 = mysqli_query($this->db,$sql2);
	        $package_data = mysqli_fetch_array($result2);
                
                $package_id = $package_data['id'];
                $package_name = $package_data['name'];
                $package_description = $package_data['description'];
                $package_gender = $package_data['gender'];
                $package_schedule = $package_data['schedule'];
                $package_fee = $package_data['fee'];
                
                $sql3="SELECT * FROM instructor WHERE id = $instructor_id";
	        $result3 = mysqli_query($this->db,$sql3);
	        $instructor_data = mysqli_fetch_array($result3);
                
                $instructor_name = $instructor_data['name'];
                $instructor_qualification = $instructor_data['qualification'];
                
                echo '<h3>';echo $package_name;
                echo '<br>';echo $package_description;
                echo '<br>';echo $package_schedule;
                echo '<br>';echo $package_gender;
                echo '<br>';echo $package_fee;
                echo '<br><br>';echo $instructor_name;
                echo '<br>';echo $instructor_qualification;
                echo '</h3>';
            }
            
        //Solution//
            public function choose_package_instructor($id){
    		$sql2="SELECT * FROM package";
	        $result = mysqli_query($this->db,$sql2);
                $numberofrows = $result->num_rows;
                
                if($numberofrows > 0){
			 foreach( $result as $row ) {
                                                   
                                        $package_id = $row["id"];           
                                        $package_name = $row["name"];
                                        $package_gender = $row["gender"];
                                        $package_schedule = $row["schedule"];
                                        $package_fee = $row["fee"];
                                        
					echo '<tr>';
                                        echo '<td>'; 
                                        echo $package_id;
                                        echo '</td>';
                                        echo '<td>'; 
                                        echo $package_name;
                                        echo '</td>';
                                        echo '<td>'; 
                                        echo $package_gender;
                                        echo '</td>';
                                        echo '<td>'; 
                                        echo $package_schedule;
                                        echo '</td>';
                                        echo '<td>'; 
                                        echo $package_fee;
                                        echo '</td>';
                                        echo '<td>';
                                        echo '<select>'; 
                                        
                $sql3="SELECT * FROM instructor where package_id = $package_id";
	        $result1 = mysqli_query($this->db,$sql3);
                $numberofrows1 = $result1->num_rows;
                
                if($numberofrows1 > 0){
			 foreach( $result1 as $row1 ) {  
                             $instructor_id = $row1["id"];
                                        $instructor_name = $row1["name"];
                                        
                                         
                                        echo "<option value='$instructor_id'>$instructor_name</option>";
                }}
                                        echo '</select>';
                                        echo '</td>';
                                        echo '<td>'; 
                                        echo '<a class="btn btn-success" name="change">Choose</a>';
                                        echo '</td>';
                                        echo '</tr>';  
            }
                }
                
                
                  if(isset($_POST['change']))
                                {
                                    $sql1="update member set package_id='$package_id' instructor='$instructor_id' where registration_id='$id' ";
                                    $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."<script>alert('Update Failed')</script>");
                                if ($result)
                                {
                                    header("location: ../Member/packgeInstructor.php");
                                }
			}

        }

                         }
	
?>