<?php
//config.php
//time zone 
date_default_timezone_set('Asia/Bangkok'); #sets default date/timezone for this website
//config on the domain
//define('DOMAIN','http://192.168.1.100/salatraju/');#this the ip address or the domain to make easy to change when we change ip address.
define('DOMAIN','http://192.168.1.120/fpanel/');#this the ip address or the domain to make easy to change when we change ip address.
define('DOMAIN_PHYSICAL','/var/www/html/fpanel/');

//////////////////////////
////all PHYSICAL PATH////////////change as your config
define('PHYSICAL_PATH', DOMAIN_PHYSICAL);

////all VIRTUAL_PATH/////////////change as your config
define('VIRTUAL_PATH', DOMAIN);
////////////Navigation Path/////////////////
define('NAV_PATH', DOMAIN.'');
define('ADMIN_NAV_PATH', DOMAIN.'index.php/');
///////////library path //////////////////////
define('LIB_PATH',PHYSICAL_PATH.'library/');
/////////////Image Path///////////////////////
#VIRTUAL_PATH URL of application for image view or link for admin
define('IMG_PATH',VIRTUAL_PATH.'view/img/');
#VIRTUAL_PATH_SITE URL of application for image view or link for front end
///////////all include path ////////////////////
# Physical (PHP) 'root' of application for file & upload reference
define('INCLUDE_PATH', PHYSICAL_PATH . 'includes/');
# Path to PHP include files - INSIDE APPLICATION ROOT 



#define session to use or not
define('SESSION',true);
define('KEY_ENCRYPT','200987');
/*
 * reference required include files here
 */
include PHYSICAL_PATH.'library/database.php';//stores all the function and credentials to connect to database
include PHYSICAL_PATH.'library/common.php'; //stores all unsightly application functions, etc.
include PHYSICAL_PATH.'library/pager.php'; //stores all the function to create pager.
//include PHYSICAL_PATH.'library/sidebar.php'; //stores all the function to create pager.
ob_start();  #buffers our page to be prevent header errors. Call before INC files or ANY html!
header("Cache-Control: no-cache");header("Expires: -1");#Helps stop browser & proxy caching

///////Theme config////////////
define('THEME','fpanel');
//////////////////////////////
$layout = array(
    "left" => "3",
    "container" => "9",
    "right" => "0"
);
////////////////////////////////


//SET the VIEW_PAGE to show all the page view
//set the condition to delete the extension of page
//Do Not Make change after this section.
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
if (stripos(THIS_PAGE,".php") != -1){
  $this_page = explode('.',THIS_PAGE);
  define('VIEW_PAGE',$this_page[0]);
}else{
    define('VIEW_PAGE',basename($_SERVER['PHP_SELF']));    
}
//Define front end theme///
/*
$res = db_get_limit('themes_use',0,1);
define('THEME_ID',$res[0]['Id']);
define('THEME_TITLE',$res[0]['Title']);
define('THEME_CUSTOMIZE',$res[0]['Active']);
*/