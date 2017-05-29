<?php

class DB_Functions {

    private $db;

    //put your code here
    // constructor
    function __construct() {
        include_once '../phpfiles/phpincludes/config.inc';
        // connecting to database
       dbconnect();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($name, $email, $gcm_regid) {
        // insert user into database
			$query = mysql_query("SELECT * from gcm_users where gcm_regid = '$gcm_regid'");
			if(mysql_num_rows($query)==0) {
				 $result = mysql_query("INSERT INTO gcm_users(name, mobile_no, gcm_regid, created_at) VALUES('$name', '$email', '$gcm_regid', NOW())");
				// check for successful store
				if ($result) {
					// get user details
					$id = mysql_insert_id(); // last inserted id
					$result = mysql_query("SELECT * FROM gcm_users WHERE id = $id") or die(mysql_error());
					// return user details
					if (mysql_num_rows($result) > 0) {
						return mysql_fetch_array($result);
					} else {
						return false;
					}
				} else {
					return false;
				}	
			} else {
				$details  = mysql_fetch_array($query);
				$default_mbl_no = $details['mobile_no'];
				
				if($default_mbl_no != $email){
					
						if(mysql_query("Update `gcm_users` set mobile_no = '$email' where gcm_regid= '$gcm_regid'")) {
							$result = mysql_query("SELECT * FROM gcm_users WHERE mobile_no = '$email'") or die(mysql_error());
							if (mysql_num_rows($result) > 0) {
								return mysql_fetch_array($result);
							} else {
								return false;
							}
						}
									
					}
					else {
					$result = mysql_query("SELECT * FROM gcm_users WHERE mobile_no = '$email'") or die(mysql_error());
						if (mysql_num_rows($result) > 0) {
							return mysql_fetch_array($result);
						} else {
							return false;
						}
					}		
			}
							
		
    }
	public function store_userto_main_userslist($mobile_no, $name){
		$userdata_query=mysql_query("select user_id from users where mobile_no = $mobile_no");
		$userdata=mysql_fetch_array($userdata_query);
		
			if(mysql_num_rows($userdata_query) == 1)
			{
				
			}
			else {
				mysql_query("insert into users (`full_name`,`mobile_no`,`password`) values ('$name','$mobile_no','$mobile_no') ");
			}
		}
    /**
     * Get user by email and password
     */
    public function getUserByEmail($email) {
        $result = mysql_query("SELECT * FROM gcm_users WHERE mobile_no = '$email' LIMIT 1");
        return $result;
    }

    /**
     * Getting all users
     */
    public function getAllUsers() {
        $result = mysql_query("select * FROM gcm_users");
        return $result;
    }

    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
        $result = mysql_query("SELECT email from gcm_users WHERE mobile_no = '$email'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed
            return true;
        } else {
            // user not existed
            return false;
        }
    }

    public function getGcmID($email) {
        $result = mysql_query("SELECT * from gcm_users WHERE mobile_no = '$email'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            
            $user_details = mysql_fetch_assoc($result);

            return $user_details['gcm_regid'] ;
        } else {
            // user not existed
            return "No";
        }
    }

}

?>