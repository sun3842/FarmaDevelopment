CREATE TABLE IF NOT EXISTS `push_information` (
  `push_information_id` int NOT NULL AUTO_INCREMENT,
  `push_information_android_server_url` varchar(1000) NOT NULL DEFAULT 'https://android.googleapis.com/gcm/send',
  `push_information_android_gcm_api_key` varchar(1000) NOT NULL,
  `push_information_android_project_number` varchar(1000) NOT NULL,
  `push_information_ios_development_gateway_ssl` varchar(1000) NOT NULL DEFAULT 'ssl://gateway.sandbox.push.apple.com:2195',
  `push_information_ios_distribution_gateway_ssl` varchar(1000) NOT NULL DEFAULT 'ssl://gateway.push.apple.com:2195',
  `push_information_ios_current_gateway_ssl` varchar(1000) NOT NULL DEFAULT 'ssl://gateway.push.apple.com:2195',
  `push_information_ios_local_cert_pem_file_name` varchar(1000) NOT NULL ,
  `push_information_ios_passphrase` varchar(1000) NOT NULL,
  `push_information_activation` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`push_information_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `device_type` (
  `device_type_id` int NOT NULL AUTO_INCREMENT,
  `device_type_name` varchar(30) NOT NULL,
  `device_description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`device_type_id`),
  UNIQUE KEY (`device_type_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

 INSERT INTO `device_type` (`device_type_id`, `device_type_name`, `device_description`) VALUES
 (1, 'ANDROID', NULL),
 (2, 'IOS', NULL);


CREATE TABLE `user_type` (
  `user_type_id` int NOT NULL,
  `user_type_name` varchar(100) NOT NULL,
  `user_type_description` varchar(250) DEFAULT NULL,
  `user_type_active` tinyint(1) NOT NULL DEFAULT '1',
   PRIMARY KEY (`user_type_id`),
   UNIQUE KEY `user_type_name` (`user_type_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `user_type` (`user_type_id`, `user_type_name`, `user_type_description`, `user_type_active`) VALUES
(1, 'SUPER_ADMIN', 'Who can maintain everything.', 1),
(2, 'PHARMACY', 'Who can maintain everything with switchy_admin permission.', 1);

CREATE TABLE `pharmacy` (
  `pharmacy_id` int unsigned NOT NULL AUTO_INCREMENT,
  `ragione_sociale` text NOT NULL,
  `indirizzo` text,
  `cap` varchar(150) DEFAULT NULL,
  `citta` varchar(250) DEFAULT NULL,
  `provincia` varchar(250) DEFAULT NULL,
  `piva` varchar(250) DEFAULT NULL,
  `longitudine` varchar(100) DEFAULT '0',
  `latitudine` varchar(100) DEFAULT '0',
  `telefono` text,
  `fax` text,
  `email` text,
  `url` text,
  `url_app` text,
  `ecommerce_locale` text,
  `pharmacy_from_json` tinyint(2) DEFAULT '1' COMMENT '1 means existing pharmacy from system',
  `pharmacy_added_by_super_admin` tinyint(2) DEFAULT '0' COMMENT '1 means pharmacy ic created by super admin and 0 means coming from json',
  `pharmacy_active` tinyint(2) DEFAULT '1',
  `pharmacy_updated_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`pharmacy_logo_storage_path` varchar(500) DEFAULT NULL,
	`pharmacy_facebook_url` varchar(500) DEFAULT NULL,
   PRIMARY KEY (`pharmacy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `admin_user` (
  `admin_user_id` int unsigned NOT NULL AUTO_INCREMENT,
  `admin_user_ref_user_type_id` int NOT NULL,
  `admin_user_ref_pharmacy_id` int unsigned DEFAULT NULL,
  `admin_user_piva_position` int unsigned NOT NULL DEFAULT '0',
  `admin_user_name` varchar(50) NOT NULL,
  `admin_user_password_hash_value` varchar(250) NOT NULL,
  `admin_user_active` tinyint DEFAULT '1',
  `admin_user_update_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_user_id`),
  UNIQUE KEY `admin_user_name` (`admin_user_name`),
  FOREIGN KEY (`admin_user_ref_pharmacy_id`) REFERENCES `pharmacy`(`pharmacy_id`),
  FOREIGN KEY (`admin_user_ref_user_type_id`) REFERENCES `user_type` (`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `admin_user` (`admin_user_id`, `admin_user_ref_user_type_id`, `admin_user_ref_pharmacy_id`, `admin_user_piva_position`, `admin_user_name`, `admin_user_password_hash_value`, `admin_user_active`, `admin_user_update_date_time`) VALUES
(1, 1, NULL, 0, 'admin', 'sha256:1000:vRCdzr4pO1hgZfmigfeqsruwxJY9wYIl:uFnkhCsuztNevSu9bC93JogxKC7RRGnk', 1, '2017-03-29 23:03:03');

CREATE TABLE IF NOT EXISTS `app_user` (
  `app_user_id` int unsigned NOT NULL AUTO_INCREMENT,
  `ref_app_user_device_type_id` int NOT NULL,
  `app_user_device_unique_id` varchar(500) DEFAULT NULL,
  `app_user_installation_date_time`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `app_user_uninstallation_date_time` datetime DEFAULT NULL,
  `app_user_installing_location_has_value` tinyint DEFAULT '0',
  `app_user_installing_location_lat_value` FLOAT( 10, 6 ) DEFAULT '0',
  `app_user_installing_location_long_value` FLOAT( 10, 6 ) DEFAULT '0',
  `app_user_active` tinyint DEFAULT '1',
  PRIMARY KEY (`app_user_id`),
  FOREIGN KEY (`ref_app_user_device_type_id`) references device_type(`device_type_id`),
  UNIQUE KEY  (`app_user_device_unique_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `app_user_pharmacy` (
  `app_user_pharmacy_id` int unsigned NOT NULL AUTO_INCREMENT,
  `ref_app_user_pharmacy_app_user_id` int unsigned NOT NULL,
  `ref_app_user_pharmacy_pharmacy_id` int unsigned DEFAULT NULL COMMENT 'NULL MEANS NO PHARMACY IS ASSOCIATED',
  `app_user_pharmachy_add_edit_date_time`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `app_user_pharmacy_active` tinyint DEFAULT '1',
  PRIMARY KEY (`app_user_pharmacy_id`),
  FOREIGN KEY (`ref_app_user_pharmacy_app_user_id`) references app_user(`app_user_id`),
  FOREIGN KEY (`ref_app_user_pharmacy_pharmacy_id`) references pharmacy(`pharmacy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `app_user_ios` (
  `ref_app_user_ios_app_user_id` int unsigned NOT NULL,
  
  `ios_device_token` varchar(250) NOT NULL,
  `app_user_ios_active` tinyint DEFAULT '1',
   PRIMARY KEY(ref_app_user_ios_app_user_id),
  FOREIGN KEY (`ref_app_user_ios_app_user_id`) references `app_user`(`app_user_id`),
  
  UNIQUE KEY  (`ios_device_token`)
 
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

CREATE TABLE IF NOT EXISTS `app_user_android` (
  `ref_app_user_android_app_user_id` int unsigned NOT NULL,
  
  `android_device_push_token` varchar(250) NOT NULL,
  `app_user_android_active` tinyint DEFAULT '1',
   PRIMARY KEY(ref_app_user_android_app_user_id),
  FOREIGN KEY (`ref_app_user_android_app_user_id`) references `app_user`(`app_user_id`),
  
  UNIQUE KEY  (`android_device_push_token`)
 
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;




CREATE TABLE IF NOT EXISTS `app_user_details` (
  `ref_app_user_details_app_user_id` int unsigned NOT NULL,
  `app_user_ecommerce_user_name_email` varchar(250) DEFAULT NULL,
  `app_user_utente_id` varchar(250) DEFAULT NULL,
  `app_user_first_name` varchar(100) DEFAULT NULL,
  `app_user_last_name` varchar(50) DEFAULT NULL,
  `app_user_birth_date` date DEFAULT NULL,
  `app_user_sex` int DEFAULT '-1',
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


CREATE TABLE `category` (
  `codice_categoria` varchar(20) NOT NULL,
  `posizione` varchar(20) DEFAULT NULL,
  `livello` varchar(20) DEFAULT NULL,
  `descrizione` text,
  PRIMARY KEY (codice_categoria)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `event_type` (
  `event_type_id` int unsigned NOT NULL AUTO_INCREMENT,
  `event_type_name` varchar(100) NOT NULL,
  `event_description` varchar(500) DEFAULT NULL,
  `event_type_active` tinyint DEFAULT '1',
  PRIMARY KEY (`event_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


INSERT INTO `event_type` (`event_type_id`, `event_type_name`, `event_description`, `event_type_active`) VALUES
(1, "FARMA", NULL, 1),
(2, "PHARMACY", NULL, 1);


CREATE TABLE IF NOT EXISTS `events` (
  `events_id` int unsigned NOT NULL AUTO_INCREMENT,
  `ref_events_event_type_id` int unsigned NOT NULL,
  `ref_events_pharmacy_id` int unsigned DEFAULT NULL,
  `events_name` text DEFAULT NULL,
  `events_description` text DEFAULT NULL,
  `event_facebook_address` text DEFAULT NULL,
  `event_other_web_link` text DEFAULT NULL,
  `events_start_date` date NOT NULL,
  `events_start_time` time NOT NULL,
  `events_any_ending_date` tinyint DEFAULT '1',
  `events_end_date` date DEFAULT NULL,
  `events_place` text DEFAULT NULL,
  `events_end_time` time DEFAULT NULL,
  `events_image_location` text DEFAULT NULL,
  `events_edited_date_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `events_active` tinyint DEFAULT '1',
   PRIMARY KEY (`events_id`),
   FOREIGN KEY (`ref_events_event_type_id`) REFERENCES `event_type`(`event_type_id`),
   FOREIGN KEY (`ref_events_pharmacy_id`) REFERENCES `pharmacy`(`pharmacy_id`)
   
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `message_type` (
  `message_type_id` int NOT NULL AUTO_INCREMENT,
  `message_type_name` varchar(100) NOT NULL,
  `message_type_description` varchar(250) DEFAULT NULL,
  `message_type_active` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`message_type_id`),
  UNIQUE KEY `message_type_name` (`message_type_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


INSERT INTO `message_type` (`message_type_id`, `message_type_name`, `message_type_description`, `message_type_active`) VALUES
(1, 'Normal/Common', 'Normal or Common message', 1),
(2, 'Personal', 'personal message for app users', 1),
(3, 'Group', 'group message based on conditions', 1);


CREATE TABLE IF NOT EXISTS `message_from` (
  `message_from_id` int NOT NULL AUTO_INCREMENT,
  `message_from_name` varchar(100) NOT NULL,
  `message_from_description` varchar(250) DEFAULT NULL,
  `message_from_active` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`message_from_id`),
  UNIQUE KEY `message_from_name` (`message_from_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `message_from` (`message_from_id`, `message_from_name`, `message_from_description`, `message_from_active`) VALUES
(1, 'FARMA/FARVIMA', 'Message from Farma/Farvima', 1),
(2, 'Pharmacy', 'Message From Pharmacy', 1);

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int unsigned NOT NULL AUTO_INCREMENT,
  `ref_message_message_type_id` int NOT NULL,
  `ref_message_message_from_id` int NOT NULL,
  `ref_message_pharmacy_id` int unsigned DEFAULT NULL,
  `message_title` text DEFAULT NULL,
  `message_details` text DEFAULT NULL,
  `message_any_ending_date` int DEFAULT '1',
  `message_ending_date` date DEFAULT NULL,
  `message_ending_time` time DEFAULT NULL,
  `message_is_push_message` tinyint DEFAULT '0',
  `message_created_date_time` DATETIME NOT NULL,
  `message_edited_date_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message_send_now` tinyint DEFAULT '1',
  `message_send_later` tinyint DEFAULT '0',
  `message_send_later_date_time` DATETIME DEFAULT NULL,
  `message_is_already_sent` tinyint default '1',
  `message_sending_date_time` datetime DEFAULT NULL,
  `message_any_attached_file` tinyint DEFAULT '0',
  `message_active` tinyint DEFAULT '1',

  PRIMARY KEY (`message_id`),
  FOREIGN KEY (`ref_message_message_type_id`) references `message_type`(`message_type_id`),
  FOREIGN KEY (`ref_message_message_from_id`) references `message_from`(`message_from_id`),
  FOREIGN KEY (`ref_message_pharmacy_id`) references `pharmacy`(`pharmacy_id`)
  
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `personal_message` (
  `personal_message_id` int unsigned NOT NULL AUTO_INCREMENT,
  `ref_personal_message_message_id` int unsigned NOT NULL ,
  `ref_personal_message_app_user_id` int unsigned NOT NULL ,
  PRIMARY KEY (`personal_message_id`),
  FOREIGN KEY (`ref_personal_message_message_id`) references `message` (`message_id`),
  FOREIGN KEY (`ref_personal_message_app_user_id`) references `app_user` (`app_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `group_message` (
  `group_message_id` int unsigned NOT NULL AUTO_INCREMENT,
  `ref_group_message_message_id` int unsigned NOT NULL ,
  `is_condition_birth_year` int DEFAULT '0' ,
  `condition_birth_year` int DEFAULT '0' ,
  `is_condition_birth_month` int DEFAULT '0' ,
  `condition_birth_month` int DEFAULT '0' ,
  `is_condition_age_range` int DEFAULT '0' ,
  `condition_age_starting_range` int DEFAULT '0' ,
  `condition_age_ending_range` int DEFAULT '0' ,
  `is_condition_sex` int DEFAULT '0' ,
  `condition_sex` int DEFAULT '-1' ,
  `is_condition_region` int DEFAULT '0' ,
  `condition_region_name` varchar(250) DEFAULT NULL ,
  `is_condition_city` int DEFAULT '0' ,
  `condition_city_name` varchar(250) DEFAULT NULL ,
  `is_condition_post_code` int DEFAULT '0' ,
  `condition_post_code` varchar(100) DEFAULT NULL ,
  `is_condition_or_gate` int DEFAULT '0' ,
  `is_condition_and_gate` int DEFAULT '0' ,
  
  PRIMARY KEY (`group_message_id`),
  FOREIGN KEY (`ref_group_message_message_id`) references `message` (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `message_file` (
  `message_file_id` int unsigned NOT NULL AUTO_INCREMENT,
  `ref_message_file_message_id` int unsigned NOT NULL ,
  `message_file_type` varchar(250) DEFAULT NULL,
  `message_file_extension` varchar(250) DEFAULT NULL,
  `message_file_storage_location` varchar(500) NOT NULL,
  `message_file_active` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`message_file_id`),
  FOREIGN KEY (`ref_message_file_message_id`) references `message` (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `farmacisti` (
  `farmacisti_id` int unsigned NOT NULL AUTO_INCREMENT,
  `ref_farmacisti_pharmacy_id` int unsigned NOT NULL ,
  `farmacisti_first_name` text DEFAULT NULL,
  `farmacisti_last_name` text DEFAULT NULL,
  `farmacisti_job_position` text DEFAULT NULL,
  `farmacisti_photo_location` text DEFAULT NULL,
  `farmacisti_created_edited_date_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `farmacisti_active` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`farmacisti_id`),
  FOREIGN KEY (`ref_farmacisti_pharmacy_id`) references `pharmacy` (`pharmacy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int unsigned NOT NULL AUTO_INCREMENT,
  `news_title` text DEFAULT NULL ,
  `news_description` text DEFAULT NULL,
  `news_image_location` text DEFAULT NULL,
  `news_created_edited_date_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `news_active` tinyint NOT NULL DEFAULT '1',
	
 
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE `product` (
  `product_id` int unsigned NOT NULL,
  `codice_catena` text DEFAULT NULL,
  `codice_sito` text DEFAULT NULL,
  `codinterno` text DEFAULT NULL,
  `codminsan` text DEFAULT NULL,
  `codean` text DEFAULT NULL,
  `descrizione_ricerca` text DEFAULT NULL,
  `descrizione_ecommerce` text DEFAULT NULL,
  `descrizione_h1` text DEFAULT NULL,
  `descrizione_h2` text DEFAULT NULL,
  `descrizione_ditta` text DEFAULT NULL,
  `prezzo_web_netto` text DEFAULT NULL,
  `prezzo_web_lordo` text DEFAULT NULL,
  `sconto_web` text DEFAULT NULL,
  `iva` text DEFAULT NULL,
  `visualizzazione_home_page` text DEFAULT NULL,
  `visualizzazione_civetta` text DEFAULT NULL,
  `codice_monografia` text DEFAULT NULL,
  `codice_testo_immagine` text DEFAULT NULL,
  `linkImmagineProdotto` text DEFAULT NULL,
  `linkPaginaProdotto` text DEFAULT NULL,
  `tree_id_label` varchar(20) DEFAULT NULL,
  `tree_label` text DEFAULT NULL,
  `product_from_json` tinyint DEFAULT '1',
  `product_added_by_super_admin` tinyint DEFAULT '0',
  `product_active` tinyint DEFAULT '1',
  `product_updated_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(product_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `product_new` (
  `product_new_id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_new_codice_catena` text DEFAULT NULL,
  `product_new_codice_sito` text DEFAULT NULL,
  `product_new_codinterno` text DEFAULT NULL,
  `product_new_codminsan` text DEFAULT NULL,
  `product_new_codean` text DEFAULT NULL,
  `product_new_descrizione_ricerca` text DEFAULT NULL,
  `product_new_descrizione_ecommerce` text DEFAULT NULL,
  `product_new_descrizione_h1` text DEFAULT NULL,
  `product_new_descrizione_h2` text DEFAULT NULL,
  `product_new_descrizione_ditta` text DEFAULT NULL,
  `product_new_prezzo_web_netto` text DEFAULT NULL,
  `product_new_prezzo_web_lordo` text DEFAULT NULL,
  `product_new_sconto_web` text DEFAULT NULL,
  `product_new_iva` text DEFAULT NULL,
  `product_new_visualizzazione_home_page` text DEFAULT NULL,
  `product_new_visualizzazione_civetta` text DEFAULT NULL,
  `product_new_codice_monografia` text DEFAULT NULL,
  `product_new_codice_testo_immagine` text DEFAULT NULL,
  `product_new_linkImmagineProdotto` text DEFAULT NULL,
  `product_new_linkPaginaProdotto` text DEFAULT NULL,
  `product_new_tree_id_label` varchar(20) DEFAULT NULL,
  `product_new_tree_label` text DEFAULT NULL,
  `product_new_added_by_super_admin` tinyint DEFAULT '0',
  `product_new_ref_pharmacy_id` int unsigned DEFAULT NULL,
  `product_new_active` tinyint DEFAULT '1',
  `product_new_updated_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(product_new_id),
	FOREIGN KEY(product_new_ref_pharmacy_id) references `pharmacy`(`pharmacy_id`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `product_free_text` (
  `product_free_text_id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_free_text_from_farma` tinyint DEFAULT '1' COMMENT '1 means from Farma and 0 means from Pharmacy',
  `ref_product_free_text_pharmacy_id` int unsigned DEFAULT NULL,
  `product_free_text_name` text DEFAULT NULL,
  `product_free_text_description` text DEFAULT NULL,
  `product_free_text_price` text DEFAULT NULL,
  `product_free_text_image_storage_path` text DEFAULT NULL,
  `product_free_text_created_edited_date_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_free_text_active` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`product_free_text_id`),
  FOREIGN KEY (`ref_product_free_text_pharmacy_id`) references `pharmacy`(`pharmacy_id`)  
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `final_product` (
  `final_product_id` int unsigned NOT NULL AUTO_INCREMENT,
  `ref_final_product_product_id`  int unsigned DEFAULT NULL,
   `ref_final_product_product_new_id` int unsigned DEFAULT NULL,
  `ref_final_product_product_free_text_id` int unsigned DEFAULT NULL,
  `final_product_created_edited_date_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `final_product_active` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`final_product_id`),
  FOREIGN KEY (`ref_final_product_product_id`) references `product`(`product_id`),
  FOREIGN KEY (`ref_final_product_product_new_id`) references `product_new`(`product_new_id`),
  FOREIGN KEY (`ref_final_product_product_free_text_id`) references `product_free_text`(`product_free_text_id`)  
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `offer_pdf` (
  `offer_pdf_id` int unsigned NOT NULL AUTO_INCREMENT,
  `offer_pdf_from_farma` tinyint DEFAULT '1' COMMENT '1 means from Farma and 0 means from Pharmacy',
  `ref_offer_pdf_pharmacy_id` int unsigned DEFAULT NULL,
  `offer_pdf_title` text DEFAULT NULL,
  `offer_pdf_starting_date_time` DATETIME DEFAULT NULL,
  `offer_pdf_ending_date_time` DATETIME DEFAULT NULL,
  `offer_pdf_storage` text DEFAULT  NULL,
  `offer_pdf_uploading_date_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `offer_pdf_active` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`offer_pdf_id`),
  FOREIGN KEY (`ref_offer_pdf_pharmacy_id`) references `pharmacy`(`pharmacy_id`)  
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `offer_products` (
  `offer_products_id` int unsigned NOT NULL AUTO_INCREMENT,
  `offer_products_from_farma` tinyint DEFAULT '1' COMMENT '1 means from Farma and 0 means from Pharmacy',
  `offer_products_type` tinyint DEFAULT '0' COMMENT '1 means pdf and 2 means free_text_product ,0 means network product,4 means product_new',
  `ref_offer_products_offerr_pdf_id` int unsigned DEFAULT NULL,
  
  `ref_offer_products_final_product_id` int unsigned NOT NULL,
  
  `ref_offer_products_pharmacy_id` int unsigned DEFAULT NULL,
  `offer_products_starting_date_time` DATETIME DEFAULT NULL,
  `offer_products_ending_date_time` DATETIME DEFAULT NULL,
  `offer_products_normal_price` text DEFAULT NULL,
  `offer_products_offer_price` text DEFAULT NULL,
  `offer_products_creating_editing_date_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `offer_products_active` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`offer_products_id`),
  FOREIGN KEY (`ref_offer_products_offerr_pdf_id`) references `offer_pdf`(`offer_pdf_id`),
	FOREIGN KEY (`ref_offer_products_final_product_id`) references `final_product`(`final_product_id`),  
	FOREIGN KEY (`ref_offer_products_pharmacy_id`) references `pharmacy`(`pharmacy_id`)  
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `gallery_image` (
  `gallery_image_id` int unsigned NOT NULL AUTO_INCREMENT,
  `gallery_image_from_farma` tinyint DEFAULT '1' COMMENT '1 means from Farma and 0 means from Pharmacy',
  `ref_gallery_image_pharmacy_id` int unsigned DEFAULT NULL,
  `gallery_image_title` text DEFAULT NULL,
  `gallery_image_description` text DEFAULT NULL,
  `gallery_image_storage_path` text DEFAULT NULL,
  `gallery_image_uploading_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gallery_image_active` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`gallery_image_id`),
  FOREIGN KEY (`ref_gallery_image_pharmacy_id`) references `pharmacy`(`pharmacy_id`)  
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `user_orders` (
  `user_orders_id` int unsigned NOT NULL AUTO_INCREMENT,
  `ref_user_orders_app_user_id` int unsigned DEFAULT '1' COMMENT '1 means from Farma and 0 means from Pharmacy',
  `user_orders_is_delivered` tinyint  NOT NULL DEFAULT '0' comment '1 MEANS DELIVERED,0 MEANS IS NOT DELIVERED' ,
  `user_orders_is_seen_super_admin` tinyint NOT NULL DEFAULT '0' COMMENT '1 means seen,0 means not seen',
  `user_orders_is_seen_pharmacy_admin` tinyint NOT NULL DEFAULT '0' COMMENT '1 means seen,0 means not seen',
   user_orders_date_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
   user_orders_delivery_date_time TIMESTAMP DEFAULT NULL,
   user_orders_delivery_text text DEFAULT NULL,
  `user_orders_is_active` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_orders_id`),
  FOREIGN KEY (`ref_user_orders_app_user_id`) references `app_user`(`app_user_id`)  

) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `user_orders_product` (
  `user_orders_product_id` int unsigned NOT NULL AUTO_INCREMENT,
  `ref_user_orders_product_user_orders_id` int unsigned NOT NULL,
  `ref_user_orders_product_final_product_id` int unsigned NOT NULL,
  `user_orders_product_quantity` int unsigned NOT NULL DEFAULT '0' ,
   `user_orders_product_per_price` varchar(10) NOT NULL ,
  `user_orders_product_is_active` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_orders_product_id`),
  FOREIGN KEY (`ref_user_orders_product_user_orders_id`) references `user_orders`(`user_orders_id`),
  FOREIGN KEY (`ref_user_orders_product_final_product_id`) references `final_product`(`final_product_id`)  
  

) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `about_us` (
  `about_us_id` int unsigned NOT NULL AUTO_INCREMENT,
  `about_us_details` text DEFAULT NULL,
 
  PRIMARY KEY (`about_us_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

