<?php 
error_reporting (E_ALL ^ E_NOTICE);
include_once 'libs/class.database.php';
include_once 'libs/class.session.php';
include_once 'libs/functions.php';
include_once 'libs/tables.config.php';
session_start();
$session= new Session();
//if(!$session->has_logged_in())
//{
//	redirect_to("index.php");
//}
$mode=$_REQUEST["mode"];

if($mode == "upload")
{
         
	global $database, $db;

	
	$aboutus=$database->escape_value ($_REQUEST["aboutus"]);
	$goals=$database->escape_value ($_REQUEST["goals"]);
	$mission=$_REQUEST["mission"];
    
	$core_mission=$_REQUEST["core_mission"];
	$methods=$_REQUEST["methods"];
    $_SESSION["aboutusEdit_formData"]=$_REQUEST;
                     
	

	        global $database, $db;
	        $qry_update="UPDATE `".TBL_ABOUTUS."` SET `aboutus`='".$aboutus."',`goals`='".$goals."',`mission`='".$mission."',`core_mission`='".$core_mission."',`methods`='".$methods."' ";
	        
			/* $qry_update="INSERT INTO `".TBL_NEWS."` (`news_category`,`title`,`news_content`,`source`,`source_url`,`created_from`,`created_by`,`created_dt`)"
                        . " VALUES ('".$category."','".$news_title."', '".$news_content."','".$source."','".$source_url."','".$_SERVER['HTTP_USER_AGENT']."','".$_SESSION['VFA_Userid']."', NOW());";
	//print_r($qry_update);
	//exit(); */
			$result_upload = $database->query( $qry_update );
			//echo "The image {$_FILES['media']['name'][$i]} was successfully uploaded and added to the gallery<br />";
                  if($result_upload >0)
	{
		$msg="Updated successfully!.";
		redirect_to('aboutus.php');
	}
	else
	{
		$error="Updating failed!.";
		redirect_to('aboutus_update.php');
	}


  }
             

?>

