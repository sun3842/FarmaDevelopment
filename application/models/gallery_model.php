<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : ANWAR HOSSAIN
EMAIL ADDRESS: anwar.hossain.suman@gmail.com
*/

class Gallery_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
		
	/*
	FUNCTION NAME : get_all_album_with_image_list($limit,$per_page)
	it will retun all  image withalbum name */
	public function get_all_album_with_image_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select image_table.*, image_album.image_album_id,image_album.image_album_name,image_album.image_album_description
			from (select * from image GROUP BY `ref_image_image_album_id` desc ) AS image_table,image_album  
			WHERE image_table.ref_image_image_album_id = image_album.image_album_id and
			image_table.ref_image_image_album_id != 2
			and image_table.ref_image_image_album_id != 1
			order by  image_id DESC limit ".$limit.",$per_page";
		
	
		 
		$query=$this->db->query($sql);
		return $query->result_object();
	}
		
	/*
	FUNCTION NAME : get_all_photo_by_album_id($album_id,$offset,$limit)
	it will retun all  photo by album_id*/
	public function get_all_photo_by_album_id($album_id,$offset,$limit)
	{	
		$sql="select image.*, image_album.image_album_name,image_album.image_album_description
			from image,image_album 
			WHERE image.ref_image_image_album_id = image_album.image_album_id and
			image.ref_image_image_album_id = $album_id
			order by  image_id DESC limit ".$offset.",$limit"; 
			
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
			
	/*
	FUNCTION NAME : get_all_photo_list($offset,$limit)
	it will retun all  photo by limit*/
	public function get_all_photo_list($offset,$limit)
	{
		
		$sql="select image.*, image_album.image_album_name,image_album.image_album_description
			from image,image_album  
			WHERE image.ref_image_image_album_id = image_album.image_album_id
			order by  image_id DESC limit ".$offset.",$limit";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
			
	/*
	FUNCTION NAME : get_all_photo_list($offset,$limit)
	it will retun all  photo by limit*/
	public function get_album_name_by_album_id($id)
	{
		
		$sql="select image_album_name	from image_album  
			WHERE image_album_id = $id";
			//echo $sql;die();
		$query=$this->db->query($sql);
		$result=$query->result_object();
		
		return	$result[0]->image_album_name;
		 
	}
	
	
	
	
	/*
	FUNCTION NAME : get_all_gallery_list($limit,$per_page)
	it will retun all  gallery list*/
	public function get_all_gallery_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="Select * from gallery_image where gallery_image_from_farma=1 and gallery_image_active=1
			order by  gallery_image_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_gallery_list()
	it will retun total no of row of  gallery list*/
	public function no_of_rows_gallery_list()
	{
		
		$sql="select image.*, image_album.image_album_name,image_album.image_album_description
			from image,image_album  
			WHERE image.ref_image_image_album_id = image_album.image_album_id
			order by  image_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}	
	
	/*
	FUNCTION NAME : get_all_album_list($limit,$per_page)
	it will retun all  album list*/
	public function get_all_album_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from image_album	WHERE image_album_active = 1 order by  image_album_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_album_list()
	it will retun total no of row of album list*/
	public function no_of_rows_album_list()
	{
		
		$sql="select * from image_album	WHERE image_album_active = 1 order by  image_album_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}
	
	
	/*
	FUNCTION NAME : album_insert($data)
	it will insert a album deatails 
	*/
	function album_insert($data)
	{
	$this->db->insert('image_album', $data);
	return $this->db->insert_id();
	}
	
		
	/*
	FUNCTION NAME : get_album_by_id()
	it will return a album by  id */
	public function get_album_by_id($id)
	{
		$query = $this->db->get_where('image_album', array('image_album_id ' => $id));
		return $query;
	}
	
	
		
	/*
	FUNCTION NAME : album_update($data,$id)
	it will update a album deatails 
	*/
	function album_edit($data,$id)
	{
	$this->db->where('image_album_id', $id);
	$this->db->update('image_album', $data);
	}
	
		
	/*
	FUNCTION NAME : gallery_update($data,$id)
	it will update a gallery deatails 
	*/
	function gallery_update($data,$id)
	{
		$this->db->trans_start();
	$this->db->where('gallery_image_id', $id);
	$this->db->update('gallery_image', $data);
		$this->db->trans_complete();
	}
	
	
	
	/*
	FUNCTION NAME : delete_album_by_id($id)
	it will delete the album by album id */
	public function delete_album_by_id($id)
	{
		$this->db->trans_start();
		
		$this->db->where('image_album_id', $id);
		$this->db->delete('image_album');
		
		//Inser Data into delete album from local database
		$data=array('image_album_table_deleting_id'=>$id);
		$this->db->insert('image_album_table_deleting',$data);
		
		$this->db->trans_complete();
  
       if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
      {
        return 0;
      }
      else
     {
      return 1;
      }
		
	}
	
		
	/*
	FUNCTION NAME : delete_image_by_name($fileName)
	it will delete the image by image name */
	public function delete_image_by_id($id)
	{
		$this->db->trans_start();
		
		$this->db->where('gallery_image_id', $id);
		$this->db->delete('gallery_image');
		/*
		$data=array('image_table_deleting_id'=>$id);
		$this->db->insert('image_table_deleting',$data);
		*/
		
		$this->db->trans_complete();
  
       if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
      {
        return 0;
      }
      else
     {
      return 1;
      }
	}
	
	
		/*
	FUNCTION NAME : image_insert($data)
	it will insert a image deatails 
	*/
	function image_insert($data)
	{
	$this->db->insert('gallery_image', $data);
	return $this->db->insert_id();
	}
	
	
	
	
	/*
	FUNCTION NAME : get_images_by_album_id()
	it will return all images by album_id */
	public function get_images_by_album_id($album_id)
	{	
		
		$query = $this->db->get_where('image', array('ref_image_image_album_id ' => $album_id));
		return $query->result_object();
	}
	
	/*
	FUNCTION NAME : delete_image_by_album_id($album_id)
	it will delete the image by album_id */
	public function delete_image_by_album_id($album_id)
	{
		$this->db->trans_start();
		
		//Get all image id for this album
		
		$query=$this->db->get_where('image',array('ref_image_image_album_id'=>$album_id));
		$all_image=$query->result_array();
		
		$this->db->where('ref_image_image_album_id', $album_id);
		$this->db->delete('image');
		
		//Inser Data into delete album from local database
		foreach($all_image as $image)
		{
			$data=array('image_table_deleting_id'=>$image['image_id']);
		    $this->db->insert('image_table_deleting',$data);
		}
		
		$this->db->trans_complete();
  
       if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
      {
        return 0;
      }
      else
     {
      return 1;
      }
		
		
		
	}
		
	
	
}
	