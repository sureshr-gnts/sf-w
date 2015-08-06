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
$mode=$_REQUEST["mode"];

if($mode == "addnews_category")
{
         
	global $database, $db;

	
	$category_name=$database->escape_value ($_REQUEST["category_name"]);
    $_SESSION["categoryEdit_formData"]=$_REQUEST;
           
  	$ck_qry="SELECT id FROM `".TBL_NEWS_CAT."` where category_name like '".$category_name."' ";
    $ck_count_result = $database->query( $ck_qry );
    $cnt=$database->num_rows( $ck_count_result );
    if($cnt == 0)
    {

	        global $database, $db;
			$qry_update="INSERT INTO `".TBL_NEWS_CAT."` (`category_name`)"
                        . " VALUES ('".$category_name."');";
			//print_r($qry_update);
			//exit();
			$result_upload = $database->query( $qry_update );
			//echo "The image {$_FILES['media']['name'][$i]} was successfully uploaded and added to the gallery<br />";
            if($result_upload >0)
            {
				$_SESSION["msg"]="Updated successfully!.";
				redirect_to('news_category.php');;
			}
			else
			{
				$_SESSION["msg"]="Updating failed!.";
				redirect_to('addnews_category.php');
			}

    }
    else
    {
    	$_SESSION["msg"]="Category name already exist!.";
    	redirect_to('addnews_category.php');
	} 
}
     
     

if($mode == "addgallery_category")
{
         
	global $database, $db;

	
	$category_name=$database->escape_value ($_REQUEST["category_name"]);
    $_SESSION["categoryEdit_formData"]=$_REQUEST;
           
  	$ck_qry="SELECT category_id FROM `".TBL_GALLERY_CAT."` where category_name like '".$category_name."' ";
    $ck_count_result = $database->query( $ck_qry );
    $cnt=$database->num_rows( $ck_count_result );
    if($cnt == 0)
    {

	        global $database, $db;
			$qry_update="INSERT INTO `".TBL_GALLERY_CAT."` (`category_name`)"
                        . " VALUES ('".$category_name."');";
			//print_r($qry_update);
			//exit();
			$result_upload = $database->query( $qry_update );
			//echo "The image {$_FILES['media']['name'][$i]} was successfully uploaded and added to the gallery<br />";
            if($result_upload >0)
            {
				$msg="Updated successfully!.";
				redirect_to('gallery_category.php?error=Uploading successfully!...');;
			}
			else
			{
				$error="Updating failed!.";
				redirect_to('addgallery_category.php?error=Uploading Failed.!...');
			}

    }
    else
    {
    	redirect_to('addgallery_category.php?error=Category name already exist.');
	} 
}


     
if($mode == "newscategory_edit")
{
	global $database, $db;

	$category_id=$_REQUEST["id"];
	$category_name=$database->escape_value ($_REQUEST["category_name"]);	
	$status=$_REQUEST["status"];
	
		$qry_update="UPDATE `".TBL_NEWS_CAT."` SET `category_name`='".$category_name."', `status`='".$status."'
		 WHERE `id`='".$category_id."' ";
		
		$result_upload = $database->query( $qry_update );
		if($result_upload)
		{
			$_SESSION["msg"]="Updated successfully!.";
			redirect_to('news_category.php');
		}
		else
		{
			$_SESSION["msg1"]="Updating failed!.";
            redirect_to("news_category.php");
            exit;
		}
}
	

if($mode == "newscategory_delete")
{
	
	$id=$_REQUEST["id"];
	
	global $database, $db;
	$qry_update="DELETE FROM `".TBL_NEWS_CAT."` WHERE `id`='".$id."' ";
   
	$result_update = $database->query( $qry_update );
	if($result_update)
		{
			$_SESSION["msg"]="Post deleted successfully!.";
		             redirect_to('news_category.php');
		}
		else{
			$_SESSION["msg1"]="File Delete Failed!.";
                  redirect_to('news_category.php');
		}		
                
	}
	else
	{
		$_SESSION["msg1"]="Deleting failed!.";
                  redirect_to('news_category.php');
	}
	
	

?>
