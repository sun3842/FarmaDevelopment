<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "login";
$route['404_override'] = '';


/*********************FOR ANDROID DEVICES*********************************/

$route['android_store_device_id_tokens']="android/store_android_device_id_tokens";



$route['app_farma_about_us']="App/app_farma_about_us";
$route['app_pharmacy_search']="App/app_pharmacy_search";
$route['app_product_list']="App/app_product_list";

$route['app_product_list_by_limit/(:any)/(:any)']="App/app_product_list_by_limit/$1/$2";

$route['app_associate_pharmacy']="App/app_associate_pharmacy_user";

$route['app_all_news_by_limit/(:any)']="App/app_all_news_by_limit/$1";

$route['app_all_events_by_limit/(:any)/(:any)']="App/app_all_events_by_limit/$1/$2";

$route['app_message_list_by_app_user_id_limit/(:any)/(:any)']="App/app_message_list_by_app_user_id_limit/$1/$2";

$route['app_gallery_images/(:any)/(:any)']="App/app_gallery_images/$1/$2";


$route['app_all_categories']="App/app_all_categories";
$route['app_get_pharmacy_details_by_pharmacy_id']="App/app_get_pharmacy_details_by_pharmacy_id";



 /*********************************************FOR IOS DEVICES*******************************/

$route['ios_store_device_id_tokens']="ios/store_ios_device_id_tokens";





$route['store_android_device_id']="android/store_android_device_id";
$route['user_is_registered/(:any)']="android/user_is_registered_by_app_user_id/$1";
$route['app_user_details/(:any)']="android/get_app_user_details_by_app_user_id/$1";
$route['app_user_submit_registration/(:any)']="android/set_app_user_registration_data_by_app_user_id/$1";
$route['app_footer_details']="android/get_app_foooter_details";
$route['main_branch_details']="android/get_head_or_main_branch_details";

$route['get_normal_messages/(:any)']="android/get_normal_messages/$1";
$route['get_personal_messages/(:any)/(:any)']="android/get_personal_messages/$1/$2";

$route['get_chat_messages/(:any)/(:any)']="android/get_chat_messages/$1/$2";
$route['save_app_user_chat_message']="android/save_app_user_chat_message";

$route['get_new_arrival_list/(:any)']="android/get_new_arrival_product_list/$1";

$route['get_normal_offer_list/(:any)']="android/get_normal_offer/$1";
$route['get_personal_offer_list/(:any)/(:any)']="android/get_personal_offer/$1/$2";

$route['get_ongoing_events_list/(:any)']="android/get_ongoing_events/$1";
$route['get_upcoming_events_list/(:any)']="android/get_upcoming_events/$1";

$route['get_image_gallery/(:any)']="android/get_image_gallery/$1";

$route['get_all_feedbacks/(:any)']="android/get_all_feedbacks/$1";
$route['get_personal_feedbacks/(:any)/(:any)']="android/get_personal_feedbacks/$1/$2";
$route['get_personal_all_feedbacks/(:any)/(:any)']="android/get_personal_all_feedbacks/$1/$2";
$route['save_app_user_feedback']="android/save_app_user_feedback";
$route['update_app_user_feedback']="android/update_app_user_feedback";
$route['save_app_user_feedback_reply']="android/save_app_user_feedback_replying_msg";

$route['about_map']="android/show_map_webview";


$route['local_db_offer_deleting']="android/all_offer_deleting_id";
$route['local_db_new_arrival_deleting']="android/all_new_arrival_deleting_id";
$route['local_db_events_deleting']="android/all_events_deleting_id";
$route['local_db_image_album_deleting']="android/all_image_album_deleting_id";
$route['local_db_image_deleting']="android/all_image_deleting_id";
$route['local_db_image_deleting']="android/all_image_deleting_id";
$route['local_db_message_deleting']="android/all_message_deleting_id";

$route['local_db_all_deleting']="android/all_table_deleting_id";

/********************END ANDROID DEVICES**********************************/

/****JSON VALUE******/
$route['insert_pharmacy_db_json']="JsonData/insert_pharmacy_data";
$route['insert_category_db_json']="JsonData/insert_category_data";
$route['insert_product_db_json']="JsonData/insert_product_data";
$route['auto_pharmacy_user_creation']="JsonData/auto_pharmacy_user_creation";


/******END JSON VALUE*****/

/****PHARMACY*************/
$route['pharmacy']="Pharmacy/pharmacy_list_page";

/*****PHARMACY USERS*****/
$route['pharmacy_user_list_page']="PharmacyUsers/pharmacy_user_list_page";
$route['pharmacy_user_details/(:any)']="PharmacyUsers/pharmacy_user_details_page/$1";

/***PRODUCTS*****/
$route['add_new_product']="Products/add_new_product";
$route['products']="Products/products_list_page";
$route['products_details/(:any)']="Products/single_product_page/$1";
$route['new_products_details/(:any)']="Products/new_product_page/$1";
$route['edit_new_product/(:any)']='Products/edit_new_product/$1';
$route['free_text_product_details_page/(:any)']='Products/free_text_product_details_page/$1';
$route['free_text_product_edit_page/(:any)']='Products/free_text_product_edit_page/$1';
$route['delete_free_text_product/(:any)']='Products/delete_free_text_product/$1';
$route['delete_new_product/(:any)']='Products/delete_new_product/$1';


/*****LOGIN RELATED*********/
$route['login_check']="login/login_check";
$route['logout']="logout/logout_function";
$route['get_reset_password_link']="login/get_reset_password_link";
$route['reset_password/(:any)']="login/reset_password/$1";


/********************	for News	**********************************/
$route['news']="News/all_news";
$route['news/page/(:any)']="News/all_news/$1";

$route['all_news']="News/all_news_page";

$route['add_new_news']="News/create_news";

$route['delete_news/(:any)']="News/delete_news/$1";

$route['edit_news/(:any)']="News/edit_news/$1";
$route['view_news/(:any)']="News/view_news/$1";


/*******************About US************************/
$route['about_us_page']="AboutUS/about_us_page";


/*******************EVENTS***************************************/
$route['add_new_events']="Events/create_events/";

$route['events']="Events/admin_events";
$route['events/page/(:any)']="Events/admin_events/$1";

$route['edit_events/(:any)']="Events/edit_events/$1";
$route['delete_events/(:any)']="Events/delete_events/$1";
$route['view_events/(:any)']="Events/view_events/$1";
$route['change_status/(:any)']="Events/change_status/$1";


$route['gallery']="gallery/gallery_admin";
$route['gallery/page/(:any)']="gallery/gallery_admin/$1";
$route['add_new_gallery']="gallery/create_gallery";
$route['delete_gallery']="gallery/delete_gallery";
$route['edit_gallery/(:any)']="gallery/edit_gallery/$1";
$route['view_gallery/(:any)']="gallery/view_album/$1";
$route['add_images/(:any)']="gallery/add_images/$1";
$route['get_album_photo/(:any)']="gallery/get_album_photo/$1";

/********************	for album	**********************************/
$route['album']="gallery/album_admin";
$route['album/page/(:any)']="gallery/album_admin/$1";
$route['add_new_album']="gallery/create_album";
$route['delete_album/(:any)']="gallery/delete_album/$1";
$route['edit_album/(:any)']="gallery/edit_album/$1";
$route['view_album/(:any)']="gallery/view_album/$1";
$route['add_album_image/(:any)']="gallery/update_album/$1";


/********************	for message	**********************************/
$route['message']="Message/admin_message";
$route['message/page/(:any)']="Message/admin_message/$1";

$route['add_new_message']="Message/create_message";
$route['add_group_message']="Message/create_group_message";
$route['add_personal_message']="Message/create_personal_message";
$route['delete_message/(:any)']="Message/delete_message/$1";
$route['edit_message/(:any)']="Message/edit_message/$1";
$route['view_message/(:any)']="Message/view_message/$1";



/********************	for offer	**********************************/
$route['offer']="Offer/view_offer";
$route['offer/page/(:any)']="Offer/admin_offer/$1";

$route['add_new_offer']="Offer/create_offer";
$route['add_new_group_offer']="Offer/create_group_offer";
$route['add_new_personal_offer']="Offer/create_personal_offer";
$route['delete_offer/(:any)']="Offer/delete_offer/$1";
$route['delete_offer_pdf/(:any)']="Offer/delete_offer_pdf/$1";
$route['edit_offer/(:any)']="Offer/edit_offer/$1";
$route['view_offer/(:any)']="Offer/view_single_offer/$1";
$route['change_status/(:any)']="Offer/change_status/$1";
$route['edit_offer/(:any)']="Offer/edit/$1";
$route['view_single_pdf_offer/(:any)']="Offer/view_single_pdf_offer/$1";


/********************	for new_arrival	**********************************/
    
$route['new_arrival']="NewArrival/admin_new_arrival";
$route['new_arrival/page/(:any)']="NewArrival/admin_new_arrival/$1";
$route['add_new_arrival']="NewArrival/create_new_arrival";
$route['delete_new_arrival/(:any)']="NewArrival/delete_new_arrival/$1";
$route['edit_new_arrival/(:any)']="NewArrival/edit_new_arrival/$1";
$route['view_new_arrival/(:any)']="NewArrival/view_new_arrival/$1";
$route['change_status/(:any)']="NewArrival/change_status/$1";

/********************	end new_arrival	**********************************/


/********************	for chat	**********************************/
    
$route['chat']="Chat/admin_chat";
$route['chat/page/(:any)']="Chat/admin_chat/$1";
$route['delete_chat/(:any)']="Chat/delete_chat/$1";
$route['edit_chat/(:any)']="Chat/edit_chat/$1";
$route['view_chat/(:any)']="Chat/view_chat/$1";


/********************	end chat	**********************************/

/**********************FOR BRANCH**************************************************/
$route['add_new_branch']="Branch/create_branch";
$route['all_branch']="Branch/all_branch";
$route['view_branch/(:any)']="Branch/view_branch/$1";
$route['edit_branch/(:any)']="Branch/edit_branch/$1";
$route['delete_branch']="Branch/delete_branch";

/********************	for feedback	**********************************/
    
$route['feedback']="Feedback/admin_feedback";
$route['feedback/page/(:any)']="Feedback/admin_feedback/$1";
$route['delete_feedback/(:any)']="Feedback/delete_feedback/$1";
$route['edit_feedback/(:any)']="Feedback/edit_feedback/$1";
$route['view_feedback/(:any)']="Feedback/view_feedback/$1";
$route['feedback_reply/(:any)']="Feedback/reply_feedback/$1";
$route['change_status/(:any)']="Feedback/change_status/$1";
$route['approve_feedback/(:any)']="Feedback/approve_feedback/$1";

/********************	end feedback	**********************************/



/********************	for account	**********************************/
    
$route['account']="Account/admin_account";
$route['account/page/(:any)']="Account/admin_account/$1";
$route['add_new_account']="Account/create_account";
$route['delete_account/(:any)']="Account/delete_account/$1";
$route['edit_account/(:any)']="Account/edit_account/$1";
$route['view_account/(:any)']="Account/view_account/$1";
$route['change_status/(:any)']="Account/change_status/$1";

/********************	end account	**********************************/


/*****Temporary for app user*************************/
$route['app_user_list']="AppUser/all_app_user_list";
$route['app_user_list/page/(:any)']="AppUser/all_app_user_list/$1";
$route['app_user_send_message/(:any)']="AppUser/app_user_send_message/$1";

$route['set_login_language/(:any)']="login/set_language/$1";
$route['set_language/(:any)/(:any)']="Language/set_language/$1/$2";
$route['set_language/(:any)/(:any)/(:any)']="Language/set_language/$1/$2/$3";

/*********************FOR IOS DEVICES*********************************/

$route['store_ios_device_id']="ios/store_ios_device_id";
$route['ios_user_is_registered/(:any)']="ios/ios_user_is_registered_by_app_user_id/$1";
$route['ios_app_user_submit_registration/(:any)']="ios/ios_set_app_user_registration_data_by_app_user_id/$1";

$route['ios_get_normal_messages/(:any)']="ios/ios_get_normal_messages/$1";
$route['ios_get_personal_messages/(:any)/(:any)']="ios/ios_get_personal_messages/$1/$2";

$route['ios_get_chat_messages/(:any)/(:any)']="ios/ios_get_chat_messages/$1/$2";
$route['ios_save_app_user_chat_message']="ios/ios_save_app_user_chat_message";


$route['ios_store_device_token/(:any)']="ios/store_ios_device_token/$1";



/***********************  for pharmacists     ****************************/
$route['add_new_pharmacist']='Pharmacists/create_pharmacist';
$route['all_pharmacists']='Pharmacists/all_pharmacists_page';
$route['delete_pharmacist/(:any)']="Pharmacists/delete_pharmacist/$1";
$route['edit_pharmacist/(:any)']="Pharmacists/edit_pharmacist/$1";


/************************   for orders  *********************************/

$route['view_all_orders']='Orders/view_all_orders';
$route['order_details_page/(:any)']='Orders/order_details_page/$1';
$route['deliver_order_by_id/(:any)']='Orders/deliver_order_by_id/$1';
$route['return_order_by_id/(:any)']='Orders/return_order_by_id/$1';
/* End of file routes.php */

/* Location: ./application/config/routes.php */