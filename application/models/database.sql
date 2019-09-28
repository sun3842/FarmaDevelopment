 /*****************Start Table :user_type **************************/
CREATE TABLE IF NOT EXISTS user_type (
  user_type_id int(12) NOT NULL AUTO_INCREMENT,
  user_type_name varchar(100) NOT NULL,
  user_type_description varchar(250) DEFAULT NULL,
  user_type_active tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (user_type_id),
  UNIQUE KEY user_type_name (user_type_name)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO user_type (user_type_id, user_type_name, user_type_description, user_type_active) 
VALUES (1, 'SUPER_ADMIN', 'Who can maintain everything.', '1'), 
(2, 'pharmacy', 'Who can maintain everything with switchy_admin permission.', '1');


                                                     /*****************End Table :user_type **************************
	/******Pharmacy***********************/
	CREATE TABLE IF NOT EXISTS pharmacy (
  pharmacy_id int(12) NOT NULL AUTO_INCREMENT,
  ragione_sociale text NOT NULL,
  indirizzo text DEFAULT NULL,
  cap varchar(150) DEFAULT NULL,
  citta varchar(250) DEFAULT NULL,
  provincia varchar(250) DEFAULT NULL,
  piva varchar(250) DEFAULT NULL,
  longitudine varchar(100) DEFAULT '0',  
  latitudine varchar(100) DEFAULT '0',
  telefono text DEFAULT NULL,
  fax text DEFAULT NULL,
  email text DEFAULT NULL ,
  url text DEFAULT NULL,
  url_app text DEFAULT NULL,
  ecommerce_locale text DEFAULT NULL,
  pharmacy_from_json tinyint(2) DEFAULT '1',
  pharmacy_added_by_super_admin tinyint(2) DEFAULT '0',
  pharmacy_active tinyint(2) DEFAULT '1',
  pharmacy_updated_date_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (pharmacy_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/***** END pharmacy***/

/******CATEGORY*****/
CREATE TABLE IF NOT EXISTS category (
  codice_categoria varchar(20) NOT NULL,
  posizione varchar(20) DEFAULT NULL,
  livello varchar(20) DEFAULT NULL,
  descrizione text DEFAULT NULL,
  PRIMARY KEY(codice_categoria)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/******END CATEGORY******/

/*****Products*****/
  CREATE TABLE IF NOT EXISTS product (
  product_id int(12) NOT NULL AUTO_INCREMENT,
  codice_catena text DEFAULT NULL,
  codice_sito text DEFAULT NULL,
  codinterno text DEFAULT NULL,
  codminsan text DEFAULT NULL,
  codean text DEFAULT NULL,
  descrizione_ricerca text DEFAULT NULL,
  descrizione_ecommerce text DEFAULT NULL,
  descrizione_h1 text DEFAULT NULL,
  descrizione_h2 text DEFAULT NULL,
  descrizione_ditta text DEFAULT NULL,
  prezzo_web_netto text DEFAULT NULL,
  prezzo_web_lordo text DEFAULT NULL,
  sconto_web text DEFAULT NULL,
  iva text DEFAULT NULL,
  visualizzazione_home_page text DEFAULT NULL,
  visualizzazione_civetta text DEFAULT NULL,
  codice_monografia text DEFAULT NULL,
  codice_testo_immagine text DEFAULT NULL,
  linkImmagineProdotto text DEFAULT NULL,
  linkPaginaProdotto text DEFAULT NULL,
  tree_id_label VARCHAR(20) DEFAULT NULL,
  tree_label text DEFAULT NULL,
  product_from_json tinyint(2) DEFAULT '1',
  product_added_by_super_dmin tinyint(2) DEFAULT '0',
  product_active tinyint(2) DEFAULT '1',
  product_updated_date_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (product_id)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
  
  CREATE TABLE IF NOT EXISTS admin_user (
  admin_user_id int(12) NOT NULL AUTO_INCREMENT,
  
  admin_user_ref_user_type_id int(12) NOT NULL,
  admin_user_ref_pharmacy_id int(12) DEFAULT NULL ,
  
  admin_user_piva_position int(12) DEFAULT '0',
  admin_user_name varchar(50) NOT NULL,
  admin_user_password_hash_value varchar(250) NOT NULL,
  admin_user_active tinyint(2) DEFAULT '1',
  
  admin_user_update_date_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(admin_user_id),
  UNIQUE KEY (admin_user_name),
  UNIQUE KEY (admin_user_ref_pharmacy_id),
  FOREIGN KEY (admin_user_ref_pharmacy_id) references pharmacy(pharmacy_id),
   FOREIGN KEY (admin_user_ref_user_type_id) references user_type(user_type_id)
   )ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `image_album` (
  `image_album_id` int(12) NOT NULL AUTO_INCREMENT,
  `image_album_name` varchar(250) NOT NULL,
  `image_album_description` varchar(500) DEFAULT NULL,
  `image_album_created_user_id` int(12) NOT NULL,
  `image_album_edited_user_id` int(12) DEFAULT NULL,
  `image_album_created_date_time` datetime NOT NULL,
  `image_album_edited_date_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image_album_active` tinyint(1) NOT NULL DEFAULT '1',
   PRIMARY KEY (`image_album_id`),
   FOREIGN KEY (`image_album_created_user_id`) references `admin_user`(`admin_user_id`),
   FOREIGN KEY (`image_album_edited_user_id`) references `admin_user`(`admin_user_id`)
   
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `image` (
  `image_id` int(12) NOT NULL AUTO_INCREMENT,
  `ref_image_image_album_id` int(12) NOT NULL,
  `image_description` varchar(500) NOT NULL,
  `image_name` varchar(500) DEFAULT NULL,
  `image_extension` varchar(50) DEFAULT NULL,
  `image_storage_base_path_android` varchar(500) NOT NULL,
  `image_storage_base_path_ios` varchar(500) NOT NULL,
  `image_name_as_saved` varchar(500) NOT NULL,
  `image_uploaded_user_id` int(12) NOT NULL,
  `image_uploading_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`image_id`),
  FOREIGN KEY (`image_uploaded_user_id`) references `admin_user`(`admin_user_id`),
  FOREIGN KEY (`ref_image_image_album_id`) references `image_album`(`image_album_id`)
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `event_type` (
  `event_type_id` int(12) NOT NULL AUTO_INCREMENT,
  `event_type_name` varchar(100) NOT NULL,
  `event_description` varchar(500) DEFAULT NULL,
  `event_type_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`event_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `events` (
  `events_id` int(12) NOT NULL AUTO_INCREMENT,
  `ref_events_event_type_id` int(12) NOT NULL,
  `events_name` varchar(250) NOT NULL,
  `events_description` varchar(1000) NOT NULL,
  `event_any_web_link` int(2) DEFAULT '1',
  `event_web_link_details` varchar(500) DEFAULT NULL,
  `events_start_date` date NOT NULL,
  `events_start_time` time NOT NULL,
  `events_any_ending_date` int(2) DEFAULT '1',
  `events_end_date` date DEFAULT NULL,
  `events_end_time` time DEFAULT NULL,
  `events_created_user_id` int(12) NOT NULL,
  `events_edited_user_id` int(12) DEFAULT NULL,
  `events_created_date_time` datetime DEFAULT NULL,
  `events_edited_date_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `events_active` tinyint(1) DEFAULT '1',
   PRIMARY KEY (`events_id`),
   FOREIGN KEY (`ref_events_event_type_id`) REFERENCES `event_type`(`event_type_id`),
   
   FOREIGN KEY (`events_created_user_id`) references `admin_user`(`admin_user_id`),
   FOREIGN KEY (`events_edited_user_id`) references `admin_user`(`admin_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `device_type` (
  `device_type_id` int(12) NOT NULL AUTO_INCREMENT,
  `device_type_name` varchar(30) NOT NULL,
  `device_description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`device_type_id`),
  UNIQUE KEY (`device_type_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `app_user` (
  `app_user_id` int(12) NOT NULL AUTO_INCREMENT,
  
  `ref_app_user_device_type_id` int(12) NOT NULL,
  `app_user_device_id` varchar(250) NOT NULL,
  `app_user_installation_date_time`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `app_user_uninstallation_date_time` datetime DEFAULT NULL,
  `app_user_installing_location_has_value` tinyint(1) DEFAULT '1',
  `app_user_installing_location_lat_value` FLOAT( 10, 6 ) DEFAULT '0',
  `app_user_installing_location_long_value` FLOAT( 10, 6 ) DEFAULT '0',
  `app_user_activation` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`app_user_id`),
  
  FOREIGN KEY (`ref_app_user_device_type_id`) references device_type(`device_type_id`),
  UNIQUE KEY  (`app_user_device_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `app_user_ios` (
  `ref_app_user_ios_app_user_id` int(12) NOT NULL,
  
  `ios_device_token` varchar(100) NOT NULL,
  `app_user_ios_active` int(2) DEFAULT '1',
   PRIMARY KEY(ref_app_user_ios_app_user_id),
  FOREIGN KEY (`ref_app_user_ios_app_user_id`) references `app_user`(`app_user_id`),
  
  UNIQUE KEY  (`ios_device_token`)
 
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;


CREATE TABLE IF NOT EXISTS `app_user_details` (
  `ref_app_user_details_app_user_id` int(12) NOT NULL,
  
  `app_user_first_name` varchar(100) NOT NULL,
  `app_user_last_name` varchar(50) NOT NULL,
  `app_user_birth_date` date DEFAULT NULL,
  `app_user_sex` int(2) DEFAULT '-1',
  `app_user_address` varchar(250) DEFAULT NULL,
  `app_user_city` varchar(250) DEFAULT NULL,
  `app_user_post_code` varchar(20) DEFAULT NULL,
  `app_user_country` varchar(250) DEFAULT NULL,
  `app_user_email` varchar(250) DEFAULT NULL,
  `app_user_cell_phone` varchar(20) DEFAULT NULL,
  `app_user_registration_date_time` DATETIME NOT NULL,
  `app_user_registration_editing_date_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   PRIMARY KEY(ref_app_user_details_app_user_id),
   
  FOREIGN KEY (`ref_app_user_details_app_user_id`) references `app_user`(`app_user_id`)
 
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;





CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(12) NOT NULL AUTO_INCREMENT,
  `ref_feedback_app_user_id` int(12) NOT NULL,
  `feedback_rating_score` DOUBLE(4,2) NOT NULL,
  `feedback_message` VARCHAR(500) NOT NULL,
  `feedback_giving_date_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `feedback_is_public` int(2) DEFAULT '1',
  PRIMARY KEY (`feedback_id`),
  
  FOREIGN KEY (`ref_feedback_app_user_id`) REFERENCES `app_user`(`app_user_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `feedback_reply` (
  `feedback_reply_id` int(12) NOT NULL AUTO_INCREMENT,
  `ref_feedback_reply_feedback_id` int(12) NOT NULL,
  `feedback_replied_message` varchar(500) DEFAULT NULL,
  `feedback_replied_message_user_id` int(12) DEFAULT NULL,
  `feedback_replied_message_app_user_id` int(12) DEFAULT NULL,
  `feedback_replied_from_app_user` int(2) DEFAULT '0',
  `feedback_replied_from_admin` int(2) DEFAULT '0',
  `feedback_replied_message_date_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`feedback_reply_id`),
  FOREIGN KEY (`ref_feedback_reply_feedback_id`) REFERENCES `feedback`(`feedback_id`),
  FOREIGN KEY (`feedback_replied_message_user_id`) references `admin_user`(`admin_user_id`),
  FOREIGN KEY (`feedback_replied_message_app_user_id`) references `app_user`(`app_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `offer_type` (
  `offer_type_id` int(12) NOT NULL AUTO_INCREMENT,
  `offer_type_name` varchar(100) NOT NULL,
  `offer_type_description` varchar(250) DEFAULT NULL,
  `offer_type_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`offer_type_id`),
  UNIQUE KEY `message_type_name` (`offer_type_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `offer` (
  `offer_id` int(12) NOT NULL AUTO_INCREMENT,
  `ref_offer_offer_type_id` int(12) NOT NULL,
  `offer_title` varchar(1000) DEFAULT NULL,
  `offer_message` varchar(1000) NOT NULL,
  `offer_any_ending_date` int(2) DEFAULT '1',
  `offer_starting_date` date NOT NULL,
  `offer_starting_time` time DEFAULT NULL,
  `offer_ending_date` date DEFAULT NULL,
  `offer_ending_time` time DEFAULT NULL,
  `offer_is_push_message` tinyint(1) DEFAULT '1',
  `offer_created_by_user_id` int(12) NOT NULL,
  `offer_created_date_time` DATETIME NOT NULL,
  `offer_edited_by_user_id` int(12) DEFAULT NULL,
  `offer_edited_date_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `offer_send_now` tinyint(1) DEFAULT '1',
  `offer_send_later` tinyint(1) DEFAULT '0',
  `offer_send_later_date_time` DATETIME DEFAULT NULL,
  `offer_is_already_sent` tinyint(1) default '1',
  `offer_sending_date_time` datetime DEFAULT NULL,
  `offer_active` tinyint(1) DEFAULT '1',

  PRIMARY KEY (`offer_id`),
  FOREIGN KEY (`ref_offer_offer_type_id`) references `offer_type`(`offer_type_id`),
  
   FOREIGN KEY (`offer_created_by_user_id`) references `admin_user`(`admin_user_id`),
  FOREIGN KEY (`offer_edited_by_user_id`) references `admin_user`(`admin_user_id`)
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `offer_image` (
  `offer_image_id` int(12) NOT NULL AUTO_INCREMENT,
  `ref_offer_image_offer_id` int(12) NOT NULL ,
  `offer_image_product_name` varchar(250) DEFAULT NULL,
  `offer_image_product_description` varchar(500) DEFAULT NULL,
  `offer_image_extension` varchar(100) DEFAULT  NULL,
  `offer_image_storage_base_path_android` varchar(500) NOT NULL,
  `offer_image_storage_base_path_ios` varchar(500) NOT NULL,
  `offer_image_name_as_saved` varchar(500) NOT NULL,
  `offer_image_is_display_image` int(2) DEFAULT 0,
  `offer_image_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`offer_image_id`),
  FOREIGN KEY (`ref_offer_image_offer_id`) references `offer` (`offer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `offer_extra` (
  `offer_extra_id` int(12) NOT NULL AUTO_INCREMENT,
  `ref_offer_extra_offer_id` int(12) NOT NULL ,
  `offer_extra_attribute_name` varchar(500) NOT NULL,
  `offer_extra_attribute_value` varchar(500) NOT NULL,
  `offer_extra_created_user_id` int(12) NOT NULL,
  `offer_extra_edited_user_id` int(12) DEFAULT NULL,
  `offer_extra_created_date_time` datetime NOT NULL,
  `offer_extra_edited_date_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `offer_extra_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`offer_extra_id`),
  FOREIGN KEY (`ref_offer_extra_offer_id`) references `offer` (`offer_id`),
  FOREIGN KEY (`offer_extra_created_user_id`) references `admin_user`(`admin_user_id`),
  FOREIGN KEY (`offer_extra_edited_user_id`) references `admin_user`(`admin_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `personal_offer` (
  `personal_offer_id` int(12) NOT NULL AUTO_INCREMENT,
  `ref_personal_offer_offer_id` int(12) NOT NULL ,
  `ref_personal_offer_app_user_id` int(12) NOT NULL ,
  PRIMARY KEY (`personal_offer_id`),
  FOREIGN KEY (`ref_personal_offer_offer_id`) references `offer` (`offer_id`),
  FOREIGN KEY (`ref_personal_offer_app_user_id`) references `app_user` (`app_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

 
 CREATE TABLE IF NOT EXISTS `group_offer` (
  `group_offer_id` int(12) NOT NULL AUTO_INCREMENT,
  `ref_group_offer_offer_id` int(12) NOT NULL ,
  `is_condition_birth_year` int(2) DEFAULT '0' ,
  `condition_birth_year` int(4) DEFAULT '0' ,
  `is_condition_birth_month` int(2) DEFAULT '0' ,
  `condition_birth_month` int(2) DEFAULT '0' ,
  `is_condition_age_range` int(2) DEFAULT '0' ,
  `condition_age_starting_range` int(3) DEFAULT '0' ,
  `condition_age_ending_range` int(3) DEFAULT '0' ,
  `is_condition_sex` int(2) DEFAULT '0' ,
  `condition_sex` int(2) DEFAULT '-1' ,
  `is_condition_region` int(2) DEFAULT '0' ,
  `condition_region_name` varchar(250) DEFAULT NULL ,
  `is_condition_city` int(2) DEFAULT '0' ,
  `condition_city_name` varchar(250) DEFAULT NULL ,
  `is_condition_post_code` int(2) DEFAULT '0' ,
  `condition_post_code` varchar(100) DEFAULT NULL ,
  `is_condition_or_gate` int(2) DEFAULT '0' ,
  `is_condition_and_gate` int(2) DEFAULT '0' ,
  
  PRIMARY KEY (`group_offer_id`),
  FOREIGN KEY (`ref_group_offer_offer_id`) references `offer` (`offer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

 

CREATE TABLE IF NOT EXISTS `message_type` (
  `message_type_id` int(12) NOT NULL AUTO_INCREMENT,
  `message_type_name` varchar(100) NOT NULL,
  `message_type_description` varchar(250) DEFAULT NULL,
  `message_type_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`message_type_id`),
  UNIQUE KEY `message_type_name` (`message_type_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(12) NOT NULL AUTO_INCREMENT,
  `ref_message_message_type_id` int(12) NOT NULL,
  `message_title` varchar(500) NOT NULL,
  `message_details` varchar(1000) NOT NULL,
  `message_any_ending_date` int(2) DEFAULT '1',
  `message_ending_date` date DEFAULT NULL,
  `message_ending_time` time DEFAULT NULL,
  `message_is_push_message` tinyint(1) DEFAULT '0',
  `message_created_by_user_id` int(12) NOT NULL,
  `message_created_date_time` DATETIME NOT NULL,
  `message_edited_by_user_id` int(12) DEFAULT NULL,
  `message_edited_date_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message_send_now` tinyint(1) DEFAULT '1',
  `message_send_later` tinyint(1) DEFAULT '0',
  `message_send_later_date_time` DATETIME DEFAULT NULL,
  `message_is_already_sent` tinyint(1) default '1',
  `message_sending_date_time` datetime DEFAULT NULL,
  `message_any_attached_file` tinyint(1) DEFAULT '0',
  `message_active` tinyint(1) DEFAULT '1',

  PRIMARY KEY (`message_id`),
  FOREIGN KEY (`ref_message_message_type_id`) references `message_type`(`message_type_id`),
  
   FOREIGN KEY (`message_created_by_user_id`) references `admin_user`(`admin_user_id`),
  FOREIGN KEY (`message_edited_by_user_id`) references `admin_user`(`admin_user_id`)
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `personal_message` (
  `personal_message_id` int(12) NOT NULL AUTO_INCREMENT,
  `ref_personal_message_message_id` int(12) NOT NULL ,
  `ref_personal_message_app_user_id` int(12) NOT NULL ,
  PRIMARY KEY (`personal_message_id`),
  FOREIGN KEY (`ref_personal_message_message_id`) references `message` (`message_id`),
  FOREIGN KEY (`ref_personal_message_app_user_id`) references `app_user` (`app_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `group_message` (
  `group_message_id` int(12) NOT NULL AUTO_INCREMENT,
  `ref_group_message_message_id` int(12) NOT NULL ,
  `is_condition_birth_year` int(2) DEFAULT '0' ,
  `condition_birth_year` int(4) DEFAULT '0' ,
  `is_condition_birth_month` int(2) DEFAULT '0' ,
  `condition_birth_month` int(2) DEFAULT '0' ,
  `is_condition_age_range` int(2) DEFAULT '0' ,
  `condition_age_starting_range` int(3) DEFAULT '0' ,
  `condition_age_ending_range` int(3) DEFAULT '0' ,
  `is_condition_sex` int(2) DEFAULT '0' ,
  `condition_sex` int(2) DEFAULT '-1' ,
  `is_condition_region` int(2) DEFAULT '0' ,
  `condition_region_name` varchar(250) DEFAULT NULL ,
  `is_condition_city` int(2) DEFAULT '0' ,
  `condition_city_name` varchar(250) DEFAULT NULL ,
  `is_condition_post_code` int(2) DEFAULT '0' ,
  `condition_post_code` varchar(100) DEFAULT NULL ,
  `is_condition_or_gate` int(2) DEFAULT '0' ,
  `is_condition_and_gate` int(2) DEFAULT '0' ,
  
  PRIMARY KEY (`group_message_id`),
  FOREIGN KEY (`ref_group_message_message_id`) references `message` (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `message_file` (
  `message_file_id` int(12) NOT NULL AUTO_INCREMENT,
  `ref_message_file_message_id` int(12) NOT NULL ,
  `message_file_type` varchar(250) DEFAULT NULL,
  `message_file_extension` varchar(250) DEFAULT NULL,
  `message_file_storage_location` varchar(500) NOT NULL,
  `message_file_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`message_file_id`),
  FOREIGN KEY (`ref_message_file_message_id`) references `message` (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
