<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	//ini_set('display_errors', '1');
include_once 'class.session.php';
include_once 'class.database.php';
if($_SERVER["REQUEST_METHOD"]=="GET")
{
$mode=$_REQUEST["mode"];
}
 function redirect_to($url)
{
    
     header("Location: ".$url);
}
function log_out()
{
    session_start();
	session_destroy();
    unset($_SESSION);
    header("Location: ../index.php");
}

if($mode == "logout")
{
    log_out();
}

function default_permission()
{
    $per_arr=array(
        "system_settings", 
        "working_shift",
        "working_shift_add",
         "user_groups",
        "user_group_add",
        "user_permission",
        "user_permission_add"
            );
    return $per_arr;
}

//about_update




?>
