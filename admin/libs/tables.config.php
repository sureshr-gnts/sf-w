<?php
/* 
 * voice for animals
 */
include_once("db.config.php");
$PREFIX=DB_PREFIX;
defined('TBL_ADMIN') ? null : define('TBL_ADMIN',$PREFIX.'admin' );
defined('TBL_ABOUTUS') ? null : define('TBL_ABOUTUS',$PREFIX.'aboutus' );
defined('TBL_NEWS') ? null : define('TBL_NEWS',$PREFIX.'news' );
defined('TBL_PERMISSIONS') ? null : define('TBL_PERMISSIONS',$PREFIX.'permissions' );
defined('TBL_GALLERY_CAT') ? null : define('TBL_GALLERY_CAT',$PREFIX.'gallery_cat' );
defined('TBL_NEWS_CAT') ? null : define('TBL_NEWS_CAT',$PREFIX.'news_cat' );
defined('TBL_GALLERY') ? null : define('TBL_GALLERY',$PREFIX.'gallery' );
defined('TBL_DOGOF_THEWEEK') ? null : define('TBL_DOGOF_THEWEEK',$PREFIX.'dogof_theweek' );
defined('TBL_FLASH_NEWS') ? null : define('TBL_FLASH_NEWS',$PREFIX.'flash_news' );
defined('TBL_PET_ADOPTION') ? null : define('TBL_PET_ADOPTION',$PREFIX.'pet_adoption' );
defined('TBL_VIDEO_GALLERY') ? null : define('TBL_VIDEO_GALLERY',$PREFIX.'video_gallery' );
defined('TBL_ACTION_TEAM') ? null : define('TBL_ACTION_TEAM',$PREFIX.'action_team' );
defined('TBL_HOMELESS_FRIENDS') ? null : define('TBL_HOMELESS_FRIENDS',$PREFIX.'homeless_friends' );
defined('TBL_ADOPT') ? null : define('TBL_ADOPT',$PREFIX.'adopt' );
defined('TBL_POLL') ? null : define('TBL_POLL',$PREFIX.'poll' );
defined('TBL_ACT_NOW') ? null : define('TBL_ACT_NOW',$PREFIX.'act_now' );
defined('TBL_ANIMAL') ? null : define('TBL_ANIMAL',$PREFIX.'animal' );
?>
