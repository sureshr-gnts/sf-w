<?php 
error_reporting (E_ALL ^ E_NOTICE);
include_once 'libs/class.database.php';
include_once 'libs/class.session.php';
include_once 'libs/functions.php';
include_once 'libs/tables.config.php';
session_start();
$session= new Session();
if(!$session->has_logged_in())
{
	redirect_to("index.php");
}
$target_path = "images/animal/";
/* print_r($_SESSION['VFA_username']);
exit; */
$mode=$_REQUEST["mode"];
$image_extensions_allowed = array('jpg', 'jpeg', 'png', 'gif','bmp');
if($mode=="post_new")
{
	global $database, $db;

	$animal_name=$database->escape_value ($_REQUEST["animal_name"]);	
	$gender=$_REQUEST["gender"];
	$dob=$_REQUEST["dob"];
	$age=$_REQUEST["age"];
	$species=$_REQUEST["species"];
	$weight=$_REQUEST["weight"];
	$colour=$_REQUEST["colour"];
	$behaviour=$_REQUEST["behaviour"];
	$breed=$_REQUEST["breed"];
	$location=$_REQUEST["location"];
	$image=$_REQUEST["image"];
	$relationship=$_REQUEST["relationship"];
	$donor_id=$_REQUEST["donor_id"];
	$volunteer_id=$_REQUEST["volunteer_id"];
	$caretaker_name=$_REQUEST["caretaker_name"];
	$caretaker_mob=$_REQUEST["caretaker_mob"];
	$caretaker_email=$_REQUEST["caretaker_email"];
	$caretaker_address=$_REQUEST["caretaker_address"];
	$feeder_name=$_REQUEST["feeder_name"];
	$desex=$_REQUEST["desex"];
	$desex_date=$_REQUEST["desex_date"];
	$microchip=$_REQUEST["microchip"];
	$microchip_date=$_REQUEST["microchip_date"];
	$microchip_no=$_REQUEST["microchip_no"];
	$arv=$_REQUEST["arv"];
	$arv_date=$_REQUEST["arv_date"];
	$arv_due=$_REQUEST["arv_due"];
	$dhpp=$_REQUEST["dhpp"];
	$dhpp_date=$_REQUEST["dhpp_date"];
	$dhpp_due=$_REQUEST["dhpp_due"];
	$fvrcp=$_REQUEST["fvrcp"];
	$fvrcp_date=$_REQUEST["fvrcp_date"];
	$fvrcp_due=$_REQUEST["fvrcp_due"];
	$deworming=$_REQUEST["deworming"];
	$deworming_date=$_REQUEST["deworming_date"];
	$deworming_due=$_REQUEST["deworming_due"];
	$medical_histroy=$_REQUEST["medical_histroy"];
	$vet_mob=$_REQUEST["vet_mob"];
	$vet_name=$_REQUEST["vet_name"];
    $_SESSION["animalEdit_formData"]=$_REQUEST;
	
	$file_path = $target_path . basename( $_FILES['image']['name']);
        $file_name = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];

                    $ext = strtolower(substr($file_name, strrpos($file_name, '.') + 1));
                    if(!in_array($ext, $image_extensions_allowed))
                    {
                    $exts = implode(', ',$image_extensions_allowed);
                    $error .= 'Uploaded image is invalid format.'
                            . 'You must upload a file with one of the following extensions: '.$exts;
                     redirect_to('add_category.php?error='.$error); 
                     exit;
                    }
                    
$fileSize = $_FILES['image']['size'];
list($width, $height, $type, $attr) = getimagesize($_FILES["image"]['tmp_name']);
if(($fileSize<=500000000))

{
	if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path. $_FILES["image"]['name'])) 
	{
		$fileName = $_FILES['image']['name']; 
		$fileSize = $_FILES['image']['size']; 
		$fileType = $_FILES['image']['type']; 
		

	 $qry_add="INSERT INTO `".TBL_ANIMAL."` (`animal_name`, `gender`, `dob`, `age`, `species`, `weight`, `colour`, `behaviour`, `breed`, `location`, `image`, `relationship`, `donor_id`, `volunteer_id`, `caretaker_name`, `caretaker_mob`, `caretaker_email`, `caretaker_address`, `feeder_name`, `desex`, `desex_date`, `microchip`, `microchip_date`, `microchip_no`, `arv`, `arv_date`, `arv_due`, `dhpp`, `dhpp_date`, `dhpp_due`, `fvrcp`, `fvrcp_date`, `fvrcp_due`, `deworming`, `deworming_date`, `deworming_due`, `medical_histroy`, `vet_mob`, `vet_name`, `created_by`) VALUES ('".$animal_name."', '".$gender."', '".$dob."', '".$age."', '".$species."', '".$weight."', '".$colour."', '".$behaviour."', '".$breed."', '".$location."', '".$fileName."', '".$relationship."', '".$donor_no."', '".$volunteer_no."', '".$caretaker_name."', '".$caretaker_mob."', '".$caretaker_email."', '".$caretaker_address."', '".$feeder_name."', '".$desex."', '".$desex_date."', '".$microchip."', '".$microchip_date."', '".$microchip_no."', '".$arv."', '".$arv_date."', '".$arv_due."', '".$dhpp."', '".$dhpp_date."', '".$dhpp_due."', '".$fvrcp."', '".$fvrcp_date."', '".$fvrcp_due."', '".$deworming."', '".$deworming_date."', '".$deworming_due."', '".$medical_histroy."', '".$vet_mob."', '".$vet_name."', '".$_SESSION['VFA_username']."');";
			$result_upload = $database->query( $qry_add );

	if($result_upload>0)
	{
		$_SESSION["msg"]="Updated successfully!.";
         redirect_to('manageanimal_registration.php?msg=Updated successfully!.');
	}
	else
	{
		$_SESSION["msg1"]="Updating failed!.";
       redirect_to('animal_registration.php?error=Updating failed!.');
	}
	}
	else 
	{
		$_SESSION["msg1"]="All failed!.";
		redirect_to('animal_registration.php');
	}
        }

else
{
	$_SESSION["msg1"]="File size is too large!.";
    redirect_to('animal_registration.php');
}
}
		
              

if($mode=="animal_edit")
{
    global $database, $db;

    $sf_id=$_REQUEST["sf_id"];
    $status=$_REQUEST["status"];
	$animal_name=$database->escape_value ($_REQUEST["animal_name"]);	
	$gender=$_REQUEST["gender"];
	$dob=$_REQUEST["dob"];
	$age=$_REQUEST["age"];
	$species=$_REQUEST["species"];
	$weight=$_REQUEST["weight"];
	$colour=$_REQUEST["colour"];
	$behaviour=$_REQUEST["behaviour"];
	$breed=$_REQUEST["breed"];
	$location=$_REQUEST["location"];
	$image=$_REQUEST["image"];
	$file_name = $_FILES['image']['name'];
	$relationship=$_REQUEST["relationship"];
	$donor_id=$_REQUEST["donor_id"];
	$volunteer_id=$_REQUEST["volunteer_id"];
	$caretaker_name=$_REQUEST["caretaker_name"];
	$caretaker_mob=$_REQUEST["caretaker_mob"];
	$caretaker_email=$_REQUEST["caretaker_email"];
	$caretaker_address=$_REQUEST["caretaker_address"];
	$feeder_name=$_REQUEST["feeder_name"];
	$desex=$_REQUEST["desex"];
	$desex_date=$_REQUEST["desex_date"];
	$microchip=$_REQUEST["microchip"];
	$microchip_date=$_REQUEST["microchip_date"];
	$microchip_no=$_REQUEST["microchip_no"];
	$arv=$_REQUEST["arv"];
	$arv_date=$_REQUEST["arv_date"];
	$arv_due=$_REQUEST["arv_due"];
	$dhpp=$_REQUEST["dhpp"];
	$dhpp_date=$_REQUEST["dhpp_date"];
	$dhpp_due=$_REQUEST["dhpp_due"];
	$fvrcp=$_REQUEST["fvrcp"];
	$fvrcp_date=$_REQUEST["fvrcp_date"];
	$fvrcp_due=$_REQUEST["fvrcp_due"];
	$deworming=$_REQUEST["deworming"];
	$deworming_date=$_REQUEST["deworming_date"];
	$deworming_due=$_REQUEST["deworming_due"];
	$medical_histroy=$_REQUEST["medical_histroy"];
	$vet_mob=$_REQUEST["vet_mob"];
	$vet_name=$_REQUEST["vet_name"];
    $_SESSION["animalEdit_formData"]=$_REQUEST;

    if(empty($file_name))
    {
    
    	$qry_update="UPDATE `".TBL_ANIMAL."` SET `sf_id`='".$sf_id."', `status`='".$status."',
		`animal_name`= '".$animal_name."',`gender`='".$gender."',`dob`='".$dob."',`age`='".$age."' ,`species`='".$species."', `weight`='".$weight."',
		`colour`= '".$colour."',`behaviour`='".$behaviour."',`breed`='".$breed."',`location`='".$location."' , `relationship`='".$relationship."',
		`donor_id`= '".$donor_id."',`volunteer_id`='".$volunteer_id."',`caretaker_name`='".$caretaker_name."',`caretaker_mob`='".$caretaker_mob."' ,`caretaker_email`='".$caretaker_email."', `caretaker_address`='".$caretaker_address."',
		`feeder_name`= '".$feeder_name."',`desex`='".$desex."',`desex_date`='".$desex_date."',`microchip`='".$microchip."' ,`microchip_date`='".$microchip_date."', `microchip_no`='".$microchip_no."',
		`arv`= '".$arv."',`arv_date`='".$arv_date."',`arv_due`='".$arv_due."',`dhpp`='".$dhpp."' ,`dhpp_date`='".$dhpp_date."', `dhpp_due`='".$dhpp_due."',
		`fvrcp`= '".$fvrcp."',`fvrcp_date`='".$fvrcp_date."',`fvrcp_due`='".$fvrcp_due."',`deworming`='".$deworming."', `deworming_date`='".$deworming_date."',
		`deworming_due`= '".$deworming_due."',`medical_histroy`='".$medical_histroy."',`vet_name`='".$vet_name."',`vet_mob`='".$vet_mob."', `updated_by`='".$_SESSION['VFA_username']."'"
    				. ",`updated_dt`= NOW() WHERE `animal_id`='".$_REQUEST['id']."' ";
    	
    	
    	$result_upload = $database->query( $qry_update );
    	 
    	if($result_upload>0)
    	{
    		$_SESSION["msg"]="Updated successfully!.";
    		redirect_to('manageanimal_registration.php');
    	}
    	else
    	{
    		$_SESSION["msg1"]="Updating failed!.";
    		redirect_to('manageanimal_registration.php');
    	}
    }
    
    
    else
    {
    
    	$file_path = $target_path . basename( $_FILES['image']['name']);
    	$file_name = $_FILES['image']['name'];
    	$fileSize = $_FILES['image']['size'];
    	/*  print_r($file_name);
    	 exit; */
    
    	$ext = strtolower(substr($file_name, strrpos($file_name, '.') + 1));
    	if(!in_array($ext, $image_extensions_allowed))
    	{
    		$exts = implode(', ',$image_extensions_allowed);
    		$error .= 'Uploaded image is invalid format.'
    				. 'You must upload a file with one of the following extensions: '.$exts;
    		redirect_to('add_category.php?error='.$error);
    		exit;
    	}
    
    	$fileSize = $_FILES['image']['size'];
    	list($width, $height, $type, $attr) = getimagesize($_FILES["image"]['tmp_name']);
    	if(($fileSize<=500000000))
    
    	{
    		if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path. $_FILES["image"]['name']))
    		{
    			$fileName = $_FILES['image']['name'];
    			$fileSize = $_FILES['image']['size'];
    			$fileType = $_FILES['image']['type'];
    
    
    
    			$qry_update="UPDATE `".TBL_ANIMAL."` SET `sf_id`='".$sf_id."', `status`='".$status."',
		`animal_name`= '".$animal_name."',`gender`='".$gender."',`dob`='".$dob."',`age`='".$age."' ,`species`='".$species."', `weight`='".$weight."',
		`colour`= '".$colour."',`behaviour`='".$behaviour."',`breed`='".$breed."',`location`='".$location."' ,`image`='".$fileName."', `relationship`='".$relationship."',
		`donor_id`= '".$donor_id."',`volunteer_id`='".$volunteer_id."',`caretaker_name`='".$caretaker_name."',`caretaker_mob`='".$caretaker_mob."' ,`caretaker_email`='".$caretaker_email."', `caretaker_address`='".$caretaker_address."',
		`feeder_name`= '".$feeder_name."',`desex`='".$desex."',`desex_date`='".$desex_date."',`microchip`='".$microchip."' ,`microchip_date`='".$microchip_date."', `microchip_no`='".$microchip_no."',
		`arv`= '".$arv."',`arv_date`='".$arv_date."',`arv_due`='".$arv_due."',`dhpp`='".$dhpp."' ,`dhpp_date`='".$dhpp_date."', `dhpp_due`='".$dhpp_due."',
		`fvrcp`= '".$fvrcp."',`fvrcp_date`='".$fvrcp_date."',`fvrcp_due`='".$fvrcp_due."',`deworming`='".$deworming."', `deworming_date`='".$deworming_date."',
		`deworming_due`= '".$deworming_due."',`medical_histroy`='".$medical_histroy."',`vet_name`='".$vet_name."',`vet_mob`='".$vet_mob."', `updated_by`='".$_SESSION['VFA_username']."'"
    				. ",`updated_dt`= NOW() WHERE `animal_id`='".$_REQUEST['id']."' ";
    			
    
    			$result_upload = $database->query( $qry_update );
    
    			if($result_upload>0)
    			{
    				$_SESSION["msg"]="Updated successfully!.";
    				redirect_to('manageanimal_registration.php');
    			}
    			else
    			{
    				$_SESSION["msg1"]="Updating failed!.";
    				redirect_to('manageanimal_registration.php');
    			}
    		}
    		else
    		{
    			$_SESSION["msg1"]="All failed!.";
    			redirect_to('manageanimal_registration.php');
    		}
    	}
    
    
    	else
    	{
    		$_SESSION["msg1"]="File size is too large!.";
    		redirect_to('manageanimal_registration.php');
    	}
    }
    
    }
    

if($mode == "post_delete")
{
	$animal_id=$_REQUEST["id"];
	/* print_r($dog_id);
	exit; */
	global $database, $db;
	$qry_update="DELETE FROM `".TBL_ANIMAL."` WHERE `animal_id`='".$animal_id."' ";
   
	$result_update = $database->query( $qry_update );
	if($result_update)
		{
			$_SESSION["msg"]="Post deleted successfully!.";
			//echo "<script type='text/javascript'> alert('Deleted Successfully.!.');</script>";
			//redirect_to('upload.php');
		             redirect_to('manageanimal_registration.php');
		}
		else{
			$_SESSION["msg1"]="File Delete Failed!.";
		//echo "<script type='text/javascript'> alert('Deleting Successfully.!.');</script>";
		//redirect_to('upload.php');
                  redirect_to('manageanimal_registration.php');
		}		
                
	}

	
    

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


?>

