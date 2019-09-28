<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : ANWAR HOSSAIN
EMAIL ADDRESS: anwar.hossain.suman@gmail.com
*/

class App_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	
	public function search_pharmacy_by_address($search_string)
	{
		$sql="SELECT * FROM pharmacy WHERE (ragione_sociale LIKE '%".$search_string."%' OR indirizzo LIKE '%".$search_string."%' OR citta LIKE '%".$search_string."%') AND pharmacy_active=1 ";
		
		$query=$this->db->query($sql);
		
		if($query->num_rows()==0)
		{
			$query=$this->db->get_where('pharmacy',array('pharmacy_active'=>1));
			return $query->result_array();
		}
		else
		{
			return $query->result_array();
		}

	}
	
	
	public function get_all_product_list()
	{
		$query=$this->db->get_where('product',array('product_active'=>1));
		return $query->result_array();
	}
	
	public function get_all_product_list_by_limit($app_user_id,$starting_limit)
	{
		$sql="Select * from product where product_active=1 LIMIT $starting_limit,50 ";
		
		$query=$this->db->query($sql);
		
		return $query->result_array();
	}
	
	public function get_all_product_list_by_limit_app_user_id($app_user_id,$starting_limit)
	{
		
		
		//Find app_user pharmacy
		$query=$this->db->get_where('app_user_pharmacy',array('ref_app_user_pharmacy_app_user_id'=>$app_user_id,'app_user_pharmacy_active'=>1));
		
		if($query->num_rows()==0)
		{
			$pharmacy_id=NULL;
		}
		else
		{
			$row=$query->row_array();
			$pharmacy_id=$row['ref_app_user_pharmacy_pharmacy_id'];
			
			
			
		}
		
		if(is_null($pharmacy_id))
		{
			$sql="SELECT * FROM final_product 
			LEFT JOIN product ON (final_product.ref_final_product_product_id=product.product_id) 
			LEFT JOIN product_free_text ON (final_product.ref_final_product_product_free_text_id=product_free_text.product_free_text_id AND product_free_text.product_free_text_from_farma=1) 
			LEFT JOIN product_new ON (final_product.ref_final_product_product_new_id=product_new.product_new_id AND product_new.product_new_ref_pharmacy_id IS NULL)
			WHERE final_product.final_product_active=1
			LIMIT $starting_limit,".APP_PRODUCT_LIMIT;
		}
		else
		{
			
			
			$sql="SELECT * FROM final_product 
			LEFT JOIN product ON (final_product.ref_final_product_product_id=product.product_id) 
			LEFT JOIN product_free_text ON (final_product.ref_final_product_product_free_text_id=product_free_text.product_free_text_id AND (product_free_text.ref_product_free_text_pharmacy_id IS NULL OR product_free_text.ref_product_free_text_pharmacy_id=".$pharmacy_id." ) )
			LEFT JOIN product_new ON (final_product.ref_final_product_product_new_id=product_new.product_new_id AND (product_new.product_new_ref_pharmacy_id IS NULL  OR product_new.product_new_ref_pharmacy_id=".$pharmacy_id." ) )
			WHERE final_product.final_product_active=1
			LIMIT $starting_limit,".APP_PRODUCT_LIMIT;
		}
		
		
		$query=$this->db->query($sql);
		
		return $query->result_array();
	}
	
	
	public function get_all_category_product_list_by_limit_app_user_id_category_id($app_user_id,$category_id,$starting_limit)
	{
		$query=$this->db->get_where('app_user_pharmacy',array('ref_app_user_pharmacy_app_user_id'=>$app_user_id,'app_user_pharmacy_active'=>1));
		
		if($query->num_rows()==0)
		{
			$pharmacy_id=NULL;
		}
		else
		{
			$row=$query->row_array();
			$pharmacy_id=$row['ref_app_user_pharmacy_pharmacy_id'];
		}
		
		$query_app_user_pharmacy=$this->db->get_where('app_user_pharmacy',array('ref_app_user_pharmacy_app_user_id'=>$app_user_id));
		
		if(is_null($pharmacy_id))
		{
			$sql="SELECT * FROM final_product 
			LEFT JOIN product ON (final_product.ref_final_product_product_id=product.product_id AND product.tree_id_label=".$category_id.") 
			
			LEFT JOIN product_new ON (final_product.ref_final_product_product_new_id=product_new.product_new_id AND product_new.product_new_ref_pharmacy_id IS NULL AND product_new.product_new_tree_id_label=".$category_id."  ) 
			WHERE final_product.final_product_active=1 
			AND (product.tree_id_label=".$category_id." OR product_new.product_new_tree_id_label=".$category_id.")
			LIMIT $starting_limit,".APP_PRODUCT_LIMIT;
		}
		else
		{
			
			
			
			$sql="SELECT * FROM final_product 
			LEFT JOIN product ON (final_product.ref_final_product_product_id=product.product_id AND product.tree_id_label=".$category_id.")
			
			LEFT JOIN product_new ON (final_product.ref_final_product_product_new_id=product_new.product_new_id AND
			product_new.product_new_tree_id_label=".$category_id." AND
			(product_new.product_new_ref_pharmacy_id IS NULL  OR product_new.product_new_ref_pharmacy_id=".$pharmacy_id." ) )
			WHERE final_product.final_product_active=1
			AND (product.tree_id_label=".$category_id." OR product_new.product_new_tree_id_label=".$category_id.")
			LIMIT $starting_limit,".APP_PRODUCT_LIMIT;
		}
		
		
		$query=$this->db->query($sql);
		
		return $query->result_array();
	}
	
	public function associate_pharmacy_with_app_user($app_user_id,$pharmacy_id)
	{
		$this->db->trans_start();
		
		$query_app_user_pharmacy=$this->db->get_where('app_user_pharmacy',array('ref_app_user_pharmacy_app_user_id'=>$app_user_id));
		
		if($query_app_user_pharmacy->num_rows()==0)
		{
			//Insert
			$data=array('ref_app_user_pharmacy_app_user_id'=>$app_user_id,
					   'ref_app_user_pharmacy_pharmacy_id'=>$pharmacy_id);
			
			$inserted_id=$this->db->insert('app_user_pharmacy',$data);
		}
		else if($query_app_user_pharmacy->num_rows()==1)
		{
			//Update
			$row=$query_app_user_pharmacy->row_array();
			
			$app_user_pharmacy_id=$row['app_user_pharmacy_id'];
			
			$data_app_user_pharmacy=array('ref_app_user_pharmacy_pharmacy_id'=>$pharmacy_id);
			$where_app_user_pharmacy="app_user_pharmacy_id =$app_user_pharmacy_id";
			$str_app_user_pharmacy = $this->db->update_string('app_user_pharmacy', $data_app_user_pharmacy, $where_app_user_pharmacy); 
			$this->db->query($str_app_user_pharmacy);
		}
		else
		{
			//Delete and insert
			$this->db->where('ref_app_user_pharmacy_app_user_id', $app_user_id);
			$this->db->delete('app_user_pharmacy');
			
			//Insert
			$data=array('ref_app_user_pharmacy_app_user_id'=>$app_user_id,
					   'ref_app_user_pharmacy_pharmacy_id'=>$pharmacy_id);
			
			$inserted_id=$this->db->insert('app_user_pharmacy',$data);
			
			

		}
		
		
		$this->db->trans_complete();
		
		$query_pharmacy=$this->db->get_where('pharmacy',array('pharmacy_id'=>$pharmacy_id));
		
		if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
		{ 
			return 0;
		}
		else
		{
			return $query_pharmacy->row_array();
		}
	}
	
	
	public function get_news_list($starting_limit)
	{
		//$query=$this->db->get_where('news',array('news_active'=>1));
		
		$sql="SELECT * from news where news_active=1 order by  news_id DESC limit $starting_limit,".APP_ROW_LIMIT;
		$query=$this->db->query($sql);
		
		return $query->result_array();
	}
	
	
	public function get_message_list($app_user_id,$starting_limit)
	{
		//Find app_user pharmacy
		$query=$this->db->get_where('app_user_pharmacy',array('ref_app_user_pharmacy_app_user_id'=>$app_user_id,'app_user_pharmacy_active'=>1));
		$row=$query->row_array();
		$pharmacy_id=$row['ref_app_user_pharmacy_pharmacy_id'];
		//echo $pharmacy_id;exit();
		
		if(is_null($pharmacy_id))
		{
			//Show Farma message
			$sql="SELECT * from message where  ref_message_pharmacy_id IS NULL order by  message_id DESC limit $starting_limit,".APP_ROW_LIMIT;
			
			
		}
		else
		{
			
			$sql="SELECT * from message where ref_message_pharmacy_id=$pharmacy_id or ref_message_pharmacy_id IS NULL order by  message_id DESC limit $starting_limit,".APP_ROW_LIMIT;
			
		}
		
		$query_msg=$this->db->query($sql);
		
		return $query_msg->result_array();
		
	}
	
	public function get_image_list($app_user_id,$starting_limit)
	{
		//Find app_user pharmacy
		$query=$this->db->get_where('app_user_pharmacy',array('ref_app_user_pharmacy_app_user_id'=>$app_user_id,'app_user_pharmacy_active'=>1));
		$row=$query->row_array();
		$pharmacy_id=$row['ref_app_user_pharmacy_pharmacy_id'];
		//echo $pharmacy_id;exit();
		
		if(is_null($pharmacy_id))
		{
			//Show Farma message
			$sql="SELECT * from gallery_image where  gallery_image_from_farma=1 and gallery_image_active=1 order by  gallery_image_id DESC limit $starting_limit,".APP_ROW_LIMIT;
			
			
		}
		else
		{
			
			$sql="SELECT * from gallery_image where ref_gallery_image_pharmacy_id=$pharmacy_id and gallery_image_active=1 order by  gallery_image_id DESC limit $starting_limit,".APP_ROW_LIMIT;
			
			$q=$this->db->query($sql);
			if($q->num_rows()==0)
			{
				$sql="SELECT * from gallery_image where  gallery_image_from_farma=1 and gallery_image_active=1 order by  gallery_image_id DESC limit $starting_limit,".APP_ROW_LIMIT;
				
			}
			
		}
		
		$query_msg=$this->db->query($sql);
		
		
		
		return $query_msg->result_array();
		
	}
	
	public function get_event_list($app_user_id,$starting_limit)
	{
		
		//Find app_user pharmacy
		$query=$this->db->get_where('app_user_pharmacy',array('ref_app_user_pharmacy_app_user_id'=>$app_user_id,'app_user_pharmacy_active'=>1));
		$row=$query->row_array();
		$pharmacy_id=$row['ref_app_user_pharmacy_pharmacy_id'];
		
		
		if(is_null($pharmacy_id))
		{
			//Show Farma message
			$sql="SELECT *,
		TIMESTAMP(events_start_date,events_start_time) as events_starting_date_time,
		TIMESTAMP(events_end_date,events_end_time) as events_ending_date_time 
		 FROM events 
		WHERE events_active=1 AND ref_events_pharmacy_id IS NULL
		order by  events_id DESC limit $starting_limit,".APP_ROW_LIMIT;
			
			
		}
		else
		{
			
			$sql="SELECT *,
		TIMESTAMP(events_start_date,events_start_time) as events_starting_date_time,
		TIMESTAMP(events_end_date,events_end_time) as events_ending_date_time 
		 FROM events 
		WHERE events_active=1 AND (ref_events_pharmacy_id IS NULL OR ref_events_pharmacy_id=$pharmacy_id)
		order by  events_id DESC limit $starting_limit,".APP_ROW_LIMIT;
			
			
			
		}
		
		
		
		
		$query=$this->db->query($sql);
		
		return $query->result_array();
		
	}
	
	
	
	
	
	public function get_about_us_text()
	{
		$query=$this->db->get('about_us');
		
		return $query->row_array();
	}
	
	
	public function get_all_categories()
	{
		$query=$this->db->get('category');
		
		return $query->result_array();
	}
	
	public function get_pharmacy_details($pharmacy_id)
	{
		$query_pharmacy=$this->db->get_where('pharmacy',array('pharmacy_id'=>$pharmacy_id));
		
		return $query_pharmacy->row_array();
	}
	
	public function search_products($product_name,$codice_ministeriale,$categoria_merciologica)
	{
		/*$sql='SELECT * FROM final_product JOIN product ON (final_product.ref_final_product_product_id=product.product_id) 
		WHERE final_product_active=1 AND (product.descrizione_ricerca LIKE "%'.$product_name.'%" OR product.tree_label LIKE "%'.$categoria_merciologica.'%" OR product.codminsan LIKE "%'.$codice_ministeriale.'%")';*/
		
		$sql='SELECT * FROM final_product JOIN product ON (final_product.ref_final_product_product_id=product.product_id AND (product.descrizione_ricerca LIKE "%'.$product_name.'%" OR product.tree_label LIKE "%'.$categoria_merciologica.'%" OR product.codminsan LIKE "%'.$codice_ministeriale.'%")) 
		WHERE final_product_active=1  ';
		
		
		$query=$this->db->query($sql);
		
		return $query->result_array();
		
		
	}
	
	public function search_products_by_app_user_id($product_name,$codice_ministeriale,$categoria_merciologica,$app_user_id)
	{
		
		//Find app_user pharmacy
		$query=$this->db->get_where('app_user_pharmacy',array('ref_app_user_pharmacy_app_user_id'=>$app_user_id,'app_user_pharmacy_active'=>1));
		
		if($query->num_rows()==0)
		{
			$pharmacy_id=NULL;
		}
		else
		{
			$row=$query->row_array();
			$pharmacy_id=$row['ref_app_user_pharmacy_pharmacy_id'];
		}
		
		
		
		if(is_null($pharmacy_id))
		{
			$sql='SELECT * FROM final_product JOIN product ON (final_product.ref_final_product_product_id=product.product_id AND (product.descrizione_ricerca LIKE "%'.$product_name.'%" OR product.tree_label LIKE "%'.$categoria_merciologica.'%" OR product.codminsan LIKE "%'.$codice_ministeriale.'%"))
			LEFT JOIN product_free_text ON (final_product.ref_final_product_product_free_text_id=product_free_text.product_free_text_id AND product_free_text.product_free_text_from_farma=1 AND product_free_text.product_free_text_name LIKE "%'.$product_name.'%") 
			LEFT JOIN product_new ON (final_product.ref_final_product_product_new_id=product_new.product_new_id AND product_new.product_new_ref_pharmacy_id IS NULL AND (product_new.product_new_descrizione_ricerca LIKE "%'.$product_name.'%" OR product_new.product_new_tree_label LIKE "%'.$categoria_merciologica.'%" OR product_new.product_new_codminsan LIKE "%'.$codice_ministeriale.'%"))
			WHERE final_product_active=1  ';
		}
		else
		{
			$sql='SELECT * FROM final_product JOIN product ON (final_product.ref_final_product_product_id=product.product_id AND (product.descrizione_ricerca LIKE "%'.$product_name.'%" OR product.tree_label LIKE "%'.$categoria_merciologica.'%" OR product.codminsan LIKE "%'.$codice_ministeriale.'%"))
			LEFT JOIN product_free_text ON (final_product.ref_final_product_product_free_text_id=product_free_text.product_free_text_id AND product_free_text.product_free_text_from_farma=1 AND product_free_text.product_free_text_name LIKE "%'.$product_name.'%") 
			LEFT JOIN product_new ON (final_product.ref_final_product_product_new_id=product_new.product_new_id AND product_new.product_new_ref_pharmacy_id IS NULL AND (product_new.product_new_descrizione_ricerca LIKE "%'.$product_name.'%" OR product_new.product_new_tree_label LIKE "%'.$categoria_merciologica.'%" OR product_new.product_new_codminsan LIKE "%'.$codice_ministeriale.'%"))
			WHERE final_product_active=1  ';
			
		}
		
		
		$query=$this->db->query($sql);
		
		return $query->result_array();
		
		
	}
	
	public function get_offer_pdf_list($app_user_id)
	{
		//Find app_user pharmacy
		$query=$this->db->get_where('app_user_pharmacy',array('ref_app_user_pharmacy_app_user_id'=>$app_user_id,'app_user_pharmacy_active'=>1));
		
		if($query->num_rows()==0)
		{
			$pharmacy_id=NULL;
		}
		else
		{
			$row=$query->row_array();
			$pharmacy_id=$row['ref_app_user_pharmacy_pharmacy_id'];
		}
		
		
		
		if(is_null($pharmacy_id))
		{
			$sql="SELECT * FROM offer_pdf where (offer_pdf_from_farma=1 AND ref_offer_pdf_pharmacy_id IS NULL) AND offer_pdf_ending_date_time >=CURDATE() AND offer_pdf_active=1";
		}
		else
		{
			$sql="SELECT * FROM offer_pdf where (offer_pdf_from_farma=0 OR ref_offer_pdf_pharmacy_id=".$pharmacy_id." OR ref_offer_pdf_pharmacy_id IS NULL)  AND offer_pdf_ending_date_time >=CURDATE() AND offer_pdf_active=1";
		}
		
		$query=$this->db->query($sql);
		 
		return $query->result_array();
	}
	
	public function app_offer_pdf_products($offer_pdf_id)
	{
	
		$sql="SELECT * FROM final_product 
			LEFT JOIN product ON (final_product.ref_final_product_product_id=product.product_id) 
			LEFT JOIN product_free_text ON (final_product.ref_final_product_product_free_text_id=product_free_text.product_free_text_id) 
			LEFT JOIN product_new ON (final_product.ref_final_product_product_new_id=product_new.product_new_id)
            
            JOIN offer_products ON (final_product.final_product_id=offer_products.ref_offer_products_final_product_id AND offer_products.ref_offer_products_offerr_pdf_id=".$offer_pdf_id.")
			WHERE final_product.final_product_active=1 ";
		
		$query=$this->db->query($sql);
		
		return $query->result_array();
	}
	
	 
	public function all_offer_products($app_user_id)
	{
		//Find app_user pharmacy
		$query=$this->db->get_where('app_user_pharmacy',array('ref_app_user_pharmacy_app_user_id'=>$app_user_id,'app_user_pharmacy_active'=>1));
		
		if($query->num_rows()==0)
		{
			$pharmacy_id=NULL;
		}
		else
		{
			$row=$query->row_array();
			$pharmacy_id=$row['ref_app_user_pharmacy_pharmacy_id'];
		}
		
		if(is_null($pharmacy_id))
		{
			$sql="SELECT * FROM final_product 
			LEFT JOIN product ON (final_product.ref_final_product_product_id=product.product_id) 
			LEFT JOIN product_free_text ON (final_product.ref_final_product_product_free_text_id=product_free_text.product_free_text_id) 
			LEFT JOIN product_new ON (final_product.ref_final_product_product_new_id=product_new.product_new_id)
            
            JOIN offer_products ON (final_product.final_product_id=offer_products.ref_offer_products_final_product_id AND offer_products.offer_products_ending_date_time >=CURDATE() AND offer_products.offer_products_active=1 AND offer_products.offer_products_from_farma=1)
			WHERE final_product.final_product_active=1 ";
		}
		else
		{
			$sql="SELECT * FROM final_product 
			LEFT JOIN product ON (final_product.ref_final_product_product_id=product.product_id) 
			LEFT JOIN product_free_text ON (final_product.ref_final_product_product_free_text_id=product_free_text.product_free_text_id) 
			LEFT JOIN product_new ON (final_product.ref_final_product_product_new_id=product_new.product_new_id)
            
            JOIN offer_products ON (final_product.final_product_id=offer_products.ref_offer_products_final_product_id AND offer_products.offer_products_ending_date_time >=CURDATE() AND offer_products.offer_products_active=1 AND (offer_products.offer_products_from_farma=1 OR offer_products.ref_offer_products_pharmacy_id=".$pharmacy_id."))
			WHERE final_product.final_product_active=1 ";
			
		}
		
		$query=$this->db->query($sql);
		 
		return $query->result_array();
		 
	}
	
	public function category_offer_products($app_user_id,$category_id)
	{
		//Find app_user pharmacy
		$query=$this->db->get_where('app_user_pharmacy',array('ref_app_user_pharmacy_app_user_id'=>$app_user_id,'app_user_pharmacy_active'=>1));
		
		if($query->num_rows()==0)
		{
			$pharmacy_id=NULL;
		}
		else
		{
			$row=$query->row_array();
			$pharmacy_id=$row['ref_app_user_pharmacy_pharmacy_id'];
		}
		
		if(is_null($pharmacy_id))
		{
			$sql="SELECT * FROM final_product 
			LEFT JOIN product ON (final_product.ref_final_product_product_id=product.product_id AND product.tree_id_label=".$category_id.") 
			 
			LEFT JOIN product_new ON (final_product.ref_final_product_product_new_id=product_new.product_new_id AND product_new.product_new_tree_id_label=".$category_id.")
            
            JOIN offer_products ON (final_product.final_product_id=offer_products.ref_offer_products_final_product_id AND offer_products.offer_products_ending_date_time >=CURDATE() AND offer_products.offer_products_active=1 AND offer_products.offer_products_from_farma=1)
			WHERE final_product.final_product_active=1 AND (product.tree_id_label=".$category_id." OR product_new.product_new_tree_id_label=".$category_id.")";
			
		}
		else
		{
			$sql="SELECT * FROM final_product 
			LEFT JOIN product ON (final_product.ref_final_product_product_id=product.product_id AND product.tree_id_label=".$category_id.") 
			
			LEFT JOIN product_new ON (final_product.ref_final_product_product_new_id=product_new.product_new_id AND product_new.product_new_tree_id_label=".$category_id.")
            
            JOIN offer_products ON (final_product.final_product_id=offer_products.ref_offer_products_final_product_id AND offer_products.offer_products_ending_date_time >=CURDATE() AND offer_products.offer_products_active=1 AND (offer_products.offer_products_from_farma=1 OR offer_products.ref_offer_products_pharmacy_id=".$pharmacy_id."))
			WHERE final_product.final_product_active=1 AND (product.tree_id_label=".$category_id." OR product_new.product_new_tree_id_label=".$category_id.")";
			
		}
		
		
		$query=$this->db->query($sql);
		 
		return $query->result_array();
		 
	}
	
	
	public function get_all_pharmacist_list_by_app_user_id($app_user_id)
	{
		//Find app_user pharmacy
		$query=$this->db->get_where('app_user_pharmacy',array('ref_app_user_pharmacy_app_user_id'=>$app_user_id,'app_user_pharmacy_active'=>1));
		
		if($query->num_rows()==0)
		{
			$pharmacy_id=NULL;
			
			return NULL;
		}
		else
		{
			$row=$query->row_array();
			$pharmacy_id=$row['ref_app_user_pharmacy_pharmacy_id'];
			
			$query_pharmacist=$this->db->get_where('farmacisti',array('ref_farmacisti_pharmacy_id'=>$pharmacy_id,'farmacisti_active'=>1));
			
			return $query_pharmacist->result_array();
		}
	}
	
	public function get_pharmacy_details_by_app_user_id($app_user_id)
	{
		//Find app_user pharmacy
		$query=$this->db->get_where('app_user_pharmacy',array('ref_app_user_pharmacy_app_user_id'=>$app_user_id,'app_user_pharmacy_active'=>1));
		
		if($query->num_rows()==0)
		{
			$pharmacy_id=NULL;
			$return_array['pharmacy_details']=NULL;
			
			$return_array['total_offers']=0;
			
			$return_array['events']=NULL;
			
			return $return_array;
		}
		else
		{
			$row=$query->row_array();
			$pharmacy_id=$row['ref_app_user_pharmacy_pharmacy_id'];
			
			$query_pharmacy=$this->db->get_where('pharmacy',array('pharmacy_id'=>$pharmacy_id));
			$return_array['pharmacy_details']= $query_pharmacy->row_array();
			
			
			
			
			$sql="SELECT * FROM final_product 
			LEFT JOIN product ON (final_product.ref_final_product_product_id=product.product_id) 
			LEFT JOIN product_free_text ON (final_product.ref_final_product_product_free_text_id=product_free_text.product_free_text_id) 
			LEFT JOIN product_new ON (final_product.ref_final_product_product_new_id=product_new.product_new_id)
            
            JOIN offer_products ON (final_product.final_product_id=offer_products.ref_offer_products_final_product_id AND offer_products.offer_products_ending_date_time >=CURDATE() AND offer_products.offer_products_active=1 AND (offer_products.offer_products_from_farma=1 OR offer_products.ref_offer_products_pharmacy_id=".$pharmacy_id."))
			WHERE final_product.final_product_active=1 ";
			$query_total_offer=$this->db->query($sql);
			
			$return_array['total_offers']=$query_total_offer->num_rows();
			
			
			$sql="SELECT *,
			TIMESTAMP(events_start_date,events_start_time) as events_starting_date_time,
			TIMESTAMP(events_end_date,events_end_time) as events_ending_date_time 
			FROM events 
			WHERE events_active=1 AND (ref_events_pharmacy_id IS NULL OR ref_events_pharmacy_id=$pharmacy_id)
			order by  events_id DESC limit 0,5";
			
			$query_events=$this->db->query($sql);
			
			$return_array['events']=$query_events->result_array();
			
			return $return_array;
			
	
			
		}
	}
	
	
	public function search_near_by_function($lat,$lng)
	{
		$sql="SELECT pharmacy.*, 111.045 * DEGREES(ACOS(COS(RADIANS($lat))
		* COS(RADIANS(lat))
		* COS(RADIANS(lng) - RADIANS($lng))
		+ SIN(RADIANS($lat))
		* SIN(RADIANS(lat))))
		AS distance_in_km
		FROM pharmacy 
		HAVING distance_in_km < 50 
		ORDER BY distance_in_km ASC";
		
		$query=$this->db->query($sql);
		 return $query->result_array();
	}
		
}
	
	
	
	
	
	
	
	
	
