<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);


define('ANDROID_DEVICE_TYPE_ID',1);
define('IOS_DEVICE_TYPE_ID',2);

define('MSG_TYPE_NORMAL_ID',1);
define('MSG_TYPE_PERSONAL_ID',2);
define('MSG_TYPE_GROUP_ID',3);

define('OFFER_TYPE_NORMAL_ID',1);
define('OFFER_TYPE_PERSONAL_ID',2);
define('OFFER_TYPE_GROUP_ID',3);

define('MSG_LIMIT',10);
define('CHAT_LIMIT',10);
define('NEW_ARRIVAL_LIMIT',10);
define('OFFER_LIMIT',10);
define('EVENTS_LIMIT',10);
define('GALLERY_ALBUM_LIMIT',5);
define('FEEDBACK_LIMIT',10);


define('APP_ROW_LIMIT',10);

/**********************************/

/*
define('VIEWS_FOLDER_ENGLISH','views_en');
define('VIEWS_FOLDER_ITALIAN','views_it');

define('FORM_REQUIRED_EN',"Required");
define('FORM_REQUIRED_IT',"Required");
*/
define("PUSH_OPERATION_NEW",1);
define("PUSH_OPERATION_EDIT",2);
define("PUSH_OPERATION_DELETE",3);

define("SEX_TYPE_FEMALE",0);
define("SEX_TYPE_MALE",1);
define("SEX_TYPE_OTHERS",2);

define("MESSAGE_CONDITION_OR_GATE",0);
define("MESSAGE_CONDITION_AND_GATE",1);

define("SENT_STATUS_EN","SENT");
define("PENDING_STATUS_EN","PENDING");
define("SENT_STATUS_IT","SENT");
define("PENDING_STATUS_IT","PENDING");



define('NORMAL_MESSAGE_TYPE_NAME_EN',"GENERAL");
define('GROUP_MESSAGE_TYPE_NAME_EN',"GROUP");
define('PERSONAL_MESSAGE_TYPE_NAME_EN',"PERSONAL");
define('NORMAL_MESSAGE_TYPE_NAME_IT',"GENERAL");
define('GROUP_MESSAGE_TYPE_NAME_IT',"GROUP");
define('PERSONAL_MESSAGE_TYPE_NAME_IT',"PERSONAL");


define('ONGOING_NAME_EN',"ONGOING");
define('UPCOMING_NAME_EN',"UPCOMING");
define('ONGOING_NAME_IT',"ONGOING");
define('UPCOMING_NAME_IT',"UPCOMING");

define('POST_PER_PAGE',10);
define('CHAT_USER_LIMIT',10);


define('PUSH_EVENT_TYPE',1);
define('PUSH_MESSAGE_TYPE',2);
define('PUSH_NEW_ARRIVAL_TYPE',3);
define('PUSH_OFFER_TYPE',4);
define('PUSH_CHAT_TYPE',5);

define('lang_en','en');
define('lang_it','it');

define('LANG_EN','en');
define('LANG_IT','it');

/*

define("SUCCESSFULLY_DONE_EN","SUCCESSFULLY DONE");
define("SUCCESSFULLY_NOT_DONE_EN","PLEASE TRY AGAIN");
define("SUCCESSFULLY_DONE_IT","SUCCESSFULLY DONE");
define("SUCCESSFULLY_NOT_DONE_IT","PLEASE TRY AGAIN");

*/

define('NEW_ARRIVAL_ANDROID_BASE_PATH','all_images/image_new/android');
define('NEW_ARRIVAL_IOS_BASE_PATH','all_images/image_new/ios');
define('OFFER_ANDROID_BASE_PATH','all_images/image_offer/android');
define('OFFER_IOS_BASE_PATH','all_images/image_offer/ios');





//These constant related with passwords,login authentication
define("PBKDF2_HASH_ALGORITHM", "sha256");
define("PBKDF2_ITERATIONS", 1000);
define("PBKDF2_SALT_BYTE_SIZE", 24);
define("PBKDF2_HASH_BYTE_SIZE", 24);

define("HASH_SECTIONS", 4);
define("HASH_ALGORITHM_INDEX", 0);
define("HASH_ITERATION_INDEX", 1);
define("HASH_SALT_INDEX", 2);
define("HASH_PBKDF2_INDEX", 3);



define('USER_TYPE_PHARMACY',2);
define('USER_TYPE_SUPER_ADMIN',1);
/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */