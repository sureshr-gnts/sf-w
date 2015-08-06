<?php 
/* 
 * Register a user throght sms short code
 * check sms shortcode format and display error if exist .
  */
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	

		include_once 'libs/class.database.php';
		include_once 'libs/class.session.php';
		include_once 'libs/functions.php';
		include_once 'libs/tables.config.php';
	
		$smsalert->ph_no 	= $_REQUEST['msisdn'];
		$smsalert->msg 		= strtolower($_REQUEST['msg']);
		$smsalert->circle 	= strtolower($_REQUEST['circle']);
		$smsalert->operator = strtolower($_REQUEST['operator']);
		$smsalert->zone 	= strtolower($_REQUEST['zone']);
		$smsalert->user_id 	= $_REQUEST['userid'];
		$msgdetails = explode(" ", strtolower($_REQUEST['msg'])); 
		//print_r($msgdetails);
        $myArray 	= array_filter( $msgdetails );
		$keycode 	= $msgdetails[0];
        $key_name 	= $msgdetails[1];
		$key_id 	= $msgdetails[3];
		
        
		if($keycode == "animal"){
					if($key_name == "details"){
				
											$sf_id = $key_id;
											$sql="SELECT animal_name,gender,species,relationship,caretaker_name,caretaker_mob FROM tbl_animal where sf_id='{$key_id}'";
											$result_set = $database->query($sql);
											while($row = $database->fetch_array($result_set)){
											if($result_set>0)

											echo "Hi i am ".$row['animal_name']." , Gender: ".$row['gender']." , Species: ".$row['species']." , Caretaker: ".$row['caretaker_name']." , Mobile NO: ".$row['caretaker_mob']." ";
				
											else {
												
													echo "Sorry, No data for your search";
												
											      }
																							  }
									  		 }
			
			 		if($key_name == "volunteer"){
			 	
											  $sf_code = $key_id;
											  $sql="SELECT fname,lname,email,mobile_no1 FROM tbl_volunteer where sf_code='{$key_id}'";
											  $result_set = $database->query($sql);
											  while($row = $database->fetch_array($result_set)){
											  if($result_set>0)
				
											  echo "Hi i am ".$row['fname']."".$row['lname']." , Email: ".$row['email']." , Mobile Number: ".$row['mobile_no1']."";
				
											  else {

													  echo "Sorry, No data for your search";
													}
																								}
									 			}

			if($key_name == "owner"){
				$owner_id = $key_id;
			}
			if($key_name == "donor"){
				$volunter_id = $key_id;
			}
		}

	
		else 
		{
			echo "Keyword mismatch.";
		}

?>

