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
$target_path = "images/animal registration/";

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
	$donor_no=$_REQUEST["donor_no"];
	$volunteer_no=$_REQUEST["volunteer_no"];
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
		

	 $qry_add="INSERT INTO `".TBL_ANIMAL."` (`animal_name`, `gender`, `dob`, `age`, `species`, `weight`, `colour`, `behaviour`, `breed`, `location`, `image`, `relationship`, `donor_no`, `volunteer_no`, `caretaker_name`, `caretaker_mob`, `caretaker_email`, `caretaker_address`, `feeder_name`, `desex`, `desex_date`) VALUES ('".$animal_name."', '".$gender."', '".$dob."', '".$age."', '".$species."', '".$weight."', '".$colour."', '".$behaviour."', '".$breed."', '".$location."', '".$fileName."', '".$relationship."', '".$donor_no."', '".$volunteer_no."', '".$caretaker_name."', '".$caretaker_mob."', '".$caretaker_email."', '".$caretaker_address."', '".$feeder_name."', '".$desex."', '".$desex_date."');";
	$result_upload = $database->query( $qry_add );

	if($result_upload>0)
	{
		$msg="Updated successfully!.";
         redirect_to('dogofweek_manage.php?msg=Updated successfully!.');
	}
	else
	{
		$error="Updating failed!.";
       redirect_to('dogofweek_new.php?error=Updating failed!.');
	}
	}
	else 
	{
		redirect_to('dogofweek_new.php?error=all failed!.');
	}
        }

else
{
    redirect_to('dogofweek_new.php?error=File size is too large.');
}
}
		
              

if($mode=="news_edit")
{
    global $database, $db;
	$news_id=$_REQUEST["news_id"];	
	$category=$_REQUEST["category"];	
	$news_title=$database->escape_value ($_REQUEST["news_title"]);
	$news_content=$database->escape_value ($_REQUEST["news_content"]);
    $news_status=$_REQUEST["news_status"];
	$lang=$_REQUEST["lansel"];
	//$uptd_dt=$_REQUEST["uptd_dt"];
	//$uptd_by=$_REQUEST["uptd_by"];
	$media_id=$_REQUEST["oldmedia_id"];
    $news_source=$_REQUEST["news_source"];
    $news_source_url=$_REQUEST["news_source_url"];
    $agree=$_REQUEST["agree"];
    $media1=$_REQUEST["media"];
    $pushnofication_check=$_REQUEST["pushnofication_check"];


	 if($news_id != "")
{
            
$qry_update="UPDATE `".TBL_NEWS."` SET `news_category`='".$category."', `title`='".$news_title."', 
		`news_content`= '".$news_content."',`source`='".$news_source."',`source_url`='".$news_source_url."', `language_code`='".$lang."',`updated_by`='".$_SESSION['MGZN_username']."'"
        . ",`push_notify`=  '".$pushnofication_check."',status='".$news_status."',agree='".$agree."' WHERE `newsid`='".$news_id."' ";
    
	$result_update = $database->query( $qry_update );
if($result_update)
{
//print_r(count($_FILES["media"]["name"]));
//exit;
       // print_r($_REQUEST);
    $msg="updated successfully.";
    $error="";
$chk_qry="select * from ".TBL_MEDIA." where news_id='".$news_id."'";
$result_chk = $database->query( $chk_qry );
$imgarr=$database->db_result_to_array($result_chk);
foreach ($imgarr as $img) {
    //echo $img["media_id"];
    foreach ($_REQUEST["oldmedia_id"] as $value) {
       // echo $value."<br />";
    }
    if (! in_array($img["media_id"], $_REQUEST["oldmedia_id"])) {
    $del_qry="DELETE FROM ".TBL_MEDIA." WHERE `media_id`='".$img["media_id"]."' and media_type='image';";
    $database->query( $del_qry );
}
    
}
foreach ($imgarr as $img) {
    //echo $img["media_id"];
    foreach ($_REQUEST["old_audio_video"] as $value) {
       // echo $value."<br />";
    }
    if (! in_array($img["media_id"], $_REQUEST["old_audio_video"])) {
    $del_qry="DELETE FROM ".TBL_MEDIA." WHERE `media_id`='".$img["media_id"]."' and (media_type='audio' or media_type='video');";
    $database->query( $del_qry );
}

    
}
if($_FILES["media"]["name"][0] != "")
{
for($i=0; $i < count($_FILES["media"]["name"]); $i++){
		
		//$file_path[$i] = $target_path .(basename($_FILES["media"]["name"][$i]));
        //$img[$i]=basename($_FILES["media"]["name"][$i]);
          
                $fileName=$_FILES["media"]["name"][$i];
                
		$ext = substr($fileName, strrpos($fileName, '.') + 1);
		$fname=uniqid().".".$ext;
                $size=$_FILES['media']['size'][$i];
			 //print_r($size);
			//exit;
            list($width, $height, $type, $attr) = getimagesize($_FILES["media"]['tmp_name'][$i]);


if(($size<30001))
                   {
    if(($width == 480) && ($height == 360) && ($_FILES["media"]["name"][$i] != ""))
    {
		if (move_uploaded_file($_FILES["media"]["tmp_name"][$i], $target_path. $fname))
		{
                   // echo $fileName."<br />";
		//echo $fname."<br />";
            
                     
	

	        global $database, $db;
			$qry_image="INSERT INTO `".TBL_MEDIA."` (`news_id`,`media_url`) VALUES ('".$news_id."','".$fname."');";
			$result_upload = $database->query( $qry_image );
                        echo $qry_image;
			//echo "The image {$_FILES['media']['name'][$i]} was successfully uploaded and added to the gallery<br />";
                  if($result_upload)
                {
                        $msg="Updated successfully!.";
                        echo $msg;
                        //redirect_to('upload.php?error=Updated successfully!...');;
                }
                else
                {
                        $error="Updating failed!.";

                        //redirect_to('upload.php?error=Uploading Failed.!...');
                }



                  
                    }
                    
    }
 else {
         $error="Image dimension should be 480 X 360..";
                        //redirect_to('upload.php?'); 
                   redirect_to('news_edit.php?error='.$error.'&news_id='.$news_id); 
                     exit;  
    }
            
		}
                 else
                   {
                 $error="Image size is too large and it should be less than 30KB ";
                        //redirect_to('upload.php?'); 
                   redirect_to('news_edit.php?error='.$error.'&news_id='.$news_id); 
                     exit;    
                   }
		//print_r($file_path);
		
	} // close your foreach
}

        for($i=0; $i < count($_FILES["media_audio_video"]["name"]); $i++){
		
		$file_path[$i] = $target_path_foraudiovideo .(basename($_FILES["media_audio_video"]["name"][$i]));
        $img[$i]=basename($_FILES["media_audio_video"]["name"][$i]);
          
         $fileName=$_FILES["media_audio_video"]["name"][$i];
                
		$ext = substr($fileName, strrpos($fileName, '.') + 1);
		$fname=uniqid().".".$ext;
                 $size=$_FILES['media_audio_video']['size'][$i];
			 //print_r($size);
			//exit;
                 $media_format="";
                 
            if(in_array($ext, $audio_extensions_allowed))
                    {
               $media_format="audio";
                    }
            elseif(in_array($ext, $video_extensions_allowed)) {
                $media_format="video";
            }
//print_r($size$width$height);
//exit;

if(($size<12582912) )
                   {
		if (move_uploaded_file($_FILES["media_audio_video"]["tmp_name"][$i], $target_path_foraudiovideo.$fname))
		{
            global $database, $db;
			$qry_image="INSERT INTO `".TBL_MEDIA."` (`news_id`,`media_url`,`media_type`,`status`)"
                                . " VALUES ('".$news_id."','".$fname."','".$media_format."','active');";
			$result_upload = $database->query( $qry_image );
                        $med_id[]=$database->insert_id();
			//echo "The image {$_FILES['media']['name'][$i]} was successfully uploaded and added to the gallery<br />";
                  if($result_upload >0)
	{
		$msg="Updated successfully!.";
		//redirect_to('upload.php?error=Uploading successfully!...');;
	}
	else
	{
		$error="Updating failed!.";
		
		//redirect_to('upload.php?error=Uploading Failed.!...');
	}



                  
                    }
             
		}
                
		//print_r($file_path);
		
	}
	
                    
       redirect_to('manage_news.php?msg='.$msg); 
       
}
else

        {
           // redirect_to('upload.php?msg='.$msg."&error=".$error); 
             redirect_to('news_edit.php?error=Updation failed Please uplode image.&news_id='.$news_id); 
                     exit;   
        }
exit;
}
else
{
   redirect_to('manage_news.php?msg=&error=Selected news is not available or something wrong.');  
}
//else
//{
//$qry_update="UPDATE `".TBL_NEWS."` SET `news_category`='".$category."', `title`='".$news_title."', 
//		`news_content`= '".$news_content."', `language_code`='".$lang."',`updated_dt`='".$uptd_dt."', 
//		`updated_by`='".$uptd_by."' WHERE `newsid`='".$news_id."' ";
//    
//	$result_update = $database->query( $qry_update );
//
//if($result_update>0)
//	{
//		$msg="Updated successfully!.";
//		redirect_to('upload.php?error=Uploading successfully!...');;
//	}
//	else
//	{
//		$error="Updating failed!.";
//		
//		redirect_to('upload.php?error=Uploading Failed.!...');
//	}
//}

}
if($mode == "news_delete")
{
	$news_id=$_REQUEST["news_id"];
	global $database, $db;
	$qry_update="DELETE FROM `".TBL_NEWS."` WHERE `newsid`='".$news_id."' ";
   
	$result_update = $database->query( $qry_update );
	if($result_update)
	{
		
 	  	$qry_update1="DELETE FROM `".TBL_MEDIA."` WHERE `news_id`='".$news_id."' ";
		$result_update1 = $database->query( $qry_update1 );
		if($result_update1)
		{
			$msg="News deleted successfully!.";
			//echo "<script type='text/javascript'> alert('Deleted Successfully.!.');</script>";
			//redirect_to('upload.php');
		             redirect_to('manage_news.php?msg='.$msg);
		}
		else{
			$error="File Delete Failed!.";
		//echo "<script type='text/javascript'> alert('Deleting Successfully.!.');</script>";
		//redirect_to('upload.php');
                  redirect_to('manage_news.php?error='.$error);
		}		
                
	}
	else
	{
		$error="Deleting failed!.";
		//echo "<script type='text/javascript'> alert('Deleting Successfully.!.');</script>";
		//redirect_to('upload.php');
                  redirect_to('manage_news.php?error='.$error);
	}
	
}

if($mode == "news_approve")
{
    $user=$_SESSION['MGZN_username'];

	$news_id=$_REQUEST["news_id"];
	global $database, $db;
	$qry_update="UPDATE `".TBL_NEWS."` SET `status`='approved',`approved_by`='".$user."',`approved_dt`=NOW() WHERE `newsid`='".$news_id."' ";
	$result_update = $database->query( $qry_update );
	if($result_update>0)
	{
		$msg="News Approved!.";
		echo "<script type='text/javascript'> alert('Updated Successfully.!.');</script>";
		redirect_to('upload.php');
	}
	else
	{
		$error="News Approval Failed!.";
		echo "<script type='text/javascript'> alert('Updating Failed.!.');</script>";
		redirect_to('upload.php');
	}

}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if($mode == "changestatus")
{
    $user=$_SESSION['MGZN_username'];
	$news_id=$_REQUEST["news_id"];
        $status=$_REQUEST["status"];
        $change_status="";
        if($status == "approved")
        {
            $change_status="pending";
        }
        elseif($status == "pending")
        {
            $change_status="approved";
        }
        if($change_status != "")
        {
            global $database, $db;
            $qry_update="UPDATE `".TBL_NEWS."` SET `status`='".$change_status."',`approved_by`='".$user."',`approved_dt`=NOW()  WHERE `newsid`='".$news_id."' ";
            $result_update = $database->query( $qry_update );
            if($result_update>0)
            {
                    $msg="News Status changed as ".$change_status;
                   // echo "<script type='text/javascript'> alert('Updated Successfully.!.');</script>";
                    redirect_to('manage_news.php?msg='.$msg);
                    exit;
            }
            else
            {
                    $error="News status changing failed.";
                   // echo "<script type='text/javascript'> alert('Updating Failed.!.');</script>";
                   // redirect_to('upload.php');
                     redirect_to('manage_news.php?error='.$error);
                    exit;
            }
        }
    else
        {
                    $error="Something wrong is happened.";
                   // echo "<script type='text/javascript'> alert('Updating Failed.!.');</script>";
                   // redirect_to('upload.php');
                     redirect_to('manage_news.php?error='.$error);
                    exit;
        }

}

?>

