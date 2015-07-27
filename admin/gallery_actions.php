<?php 
include_once 'libs/class.database.php';
include_once 'libs/class.session.php';
include_once 'libs/functions.php';
session_start();
/* $session= new Session();
if(!$session->has_logged_in())
{
	redirect_to("index.php");
}

//print_r($_REQUEST);
 */
$target_path = "images/gallery/";

$mode=$_REQUEST["mode"];
$image_extensions_allowed = array('jpg', 'jpeg', 'png', 'gif','bmp');
if($mode=="upload")
{
	global $database, $db;

	$name=$database->escape_value ($_REQUEST["name"]);	
	$category=$_REQUEST["category"];
	$image=$_REQUEST["image"];
    $_SESSION["categoryEdit_formData"]=$_REQUEST;
	
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

{	$ck_qry="SELECT id FROM `".TBL_GALLERY."` where img_title like '".$name."' ";
        $ck_count_result = $database->query( $ck_qry );
        $cnt=$database->num_rows( $ck_count_result );
        if($cnt == 0)
        {
	if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path. $_FILES["image"]['name'])) //Upload file to target path
	{
		$fileName = $_FILES['image']['name']; // Get Filename
		$fileSize = $_FILES['image']['size']; // Get filesize
		$fileType = $_FILES['image']['type']; // Get filetype
		

	 $qry_add="INSERT INTO `".TBL_GALLERY."` (`img_title`, `category_id`, `img_path`) VALUES ('".$name."', '".$category."', '".$file_name."' );";
	$result_upload = $database->query( $qry_add );

	if($result_upload>0)
	{
		$msg="Updated successfully!.";
         redirect_to('gallery_manage.php?msg=Updated successfully!.');
	}
	else
	{
		$error="Updating failed!.";
       redirect_to('upload_gallery.php?error=Updating failed!.');
	}
	}
	else 
	{
		redirect_to('upload_gallery.php?error=all failed!.');
	}
        }
        else
{
    redirect_to('upload_gallery.php?error=Category name already exist.');
}
}
else
{
    redirect_to('upload_gallery.php?error=File size is too large.');
}
}

/* if($mode=="category_edit")
{
	global $database, $db;

	$category_id=$_REQUEST["id"];
	$category_name=$database->escape_value ($_REQUEST["category_name"]);	
	$category_image=$_REQUEST["category_image"];
	$created_dt=$_REQUEST["created_dt"];
	
	$file_path = $target_path . basename( $_FILES['category_image']['name']);
	$file_name = $_FILES['category_image']['name'];
	//move_uploaded_file($_FILES['adv_image']['tmp_name'], $target_path. $_FILES["adv_image"]['name']); 
       

if($_FILES['category_image']['name']!="")
{
    $file_path = $target_path . basename( $_FILES['category_image']['name']);
        $file_name = $_FILES['category_image']['name'];
        $fileSize = $_FILES['category_image']['size'];
//$fileName=$_FILES["media"]["name"][$i];
                    $ext = strtolower(substr($file_name, strrpos($file_name, '.') + 1));
                    //$ext = strtolower(substr(strrchr($file_name, "."), 1));
                    if(!in_array($ext, $image_extensions_allowed))
                    {
                    $exts = implode(', ',$image_extensions_allowed);
                    $error .= 'Uploaded image is invalid format.'
                            . 'You must upload a file with one of the following extensions: '.$exts;
                     //redirect_to('add_category.php?error='.$error); 
                      //redirect_to('add_adv.php?error=Updating failed!.');
                     redirect_to("category_edit.php?id=$category_id&error=".$error);
                     exit;
                    }
$fileSize = $_FILES['category_image']['size'];
 list($width, $height, $type, $attr) = getimagesize($_FILES["category_image"]['tmp_name']);
if(($fileSize<=5000) &&($width == 84) &&($height == 84))
{	
	if(move_uploaded_file($_FILES['category_image']['tmp_name'], $target_path. $_FILES["category_image"]['name'])) //Upload file to target path
	{
		$fileName = $_FILES['category_image']['name']; // Get Filename
		$fileSize = $_FILES['category_image']['size']; // Get filesize
		$fileType = $_FILES['category_image']['type']; // Get filetype
		//echo "The picture ".  basename( $_FILES['adv_image']['name']) . " was uploaded successfully.";} else{
		//echo "There was an error uploading the file, please try again!";
		$qry_update="UPDATE `".TBL_CATEGORY."` SET `category_name`='".$category_name."', `category_image_url`='".$file_name."'
		 WHERE `category_id`='".$category_id."' ";
		
		$result_upload = $database->query( $qry_update );
		if($result_upload)
		{
			$msg="Updated successfully!.";
			redirect_to('category.php?msg=Updated successfully!.');
		}
		else
		{
			$error="Updating failed!.";
			//redirect_to('category.php?error=Updating failed!.');
                        redirect_to("category_edit.php?id=$category_id&error=".$error);
                        exit;
		}
	}
	else 
	{

		$error="Updating failed!.";
		//redirect_to('category_edit.php?error=Updating failed!.');
                redirect_to("category_edit.php?id=$category_id&error=Updating failed!.");
                exit;
	}
	
}
else
{
redirect_to("category_edit.php?id=$category_id&error=File size is too large and it should be less than 5KB and dimension should be 84 X 84.");
exit;
}
}
else
{
$qry_update="UPDATE `".TBL_CATEGORY."` SET `category_name`='".$category_name."' 
		 WHERE `category_id`='".$category_id."' ";
	
	$result_upload = $database->query( $qry_update );
   if($result_upload)

    {
		$msg="Updated successfully!.";
         redirect_to('category.php?msg=Updated successfully!.');
	}
	else
	{
		$error="Updating failed!.";
       redirect_to('category.php?error=Updating failed!.');
	}
}
}
if($mode=="category_delete")
{
	
	$category_id=$_REQUEST["id"];
	
	global $database, $db;
	$qry_update="UPDATE `".TBL_CATEGORY."` SET `status`='inactive' WHERE `category_id`='".$category_id."' ";
	
	$result_upload = $database->query( $qry_update );
	if($result_upload>0)
	{
		$msg="Deleted successfully!.";
		redirect_to('category.php?msg=Deleted successfully.');
	}
	else
	{
		$error="Deleting failed!.";
		redirect_to('category.php?error=Deletion failed.');
	}
}
 */
?>
