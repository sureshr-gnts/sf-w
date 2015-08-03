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
		
        $myArray 	= array_filter( $msgdetails );
		$keycode 	= $msgdetails[0];
        $key_name 	= $msgdetails[1];
		$key_id 	= $msgdetails[2];

        
		if($keycode == "animal")
		{
			if($key_name == "registration"){
				$sf_id = $key_id;
				$sql="SELECT animal_name,gender,species,relationship,caretaker_name,caretaker_mob FROM tbl_animal where id='{$key_id}'";
				print_r($sql); exit;
				echo "See your Data";		
				
			}
			else {
					echo "Sorry, No data for your search";
				}
			if($key_name == "donor"){
				$donor_id = $key_id;
			}
			else if($key_name == "owner"){
				$owner_id = $key_id;
			}
			else if($key_name == "volunteer"){
				$volunter_id = $key_id;
			}
			else {
				echo "Kindly Your provide valid information.";
			}
		}
		else 
		{
			echo "Keyword mismatch.";
		}

?>