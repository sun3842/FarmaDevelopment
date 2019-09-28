<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {
	
	public $views_folder_name;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_model');
		$this->load->model('events_model');
		$this->load->helper(array('form', 'url'));
		$this->load->model('common_model');
		$this->load->library('session');
		$this->load->library('image_lib');
		
		if($this->session->userdata('login')!=1)
		{
			redirect(base_url());
		}
		
		if($this->session->userdata('language'))
		{
			if($this->session->userdata('language')==LANG_EN)
			{
				$this->lang->load('menu_en','english');
				$this->lang->load('gallery_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('gallery_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('gallery_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('gallery_it','italian');
		}
		
	}
	
	
	public function create_gallery()
	{
		$data['content'] ='gallery/upload_photos';
		$data['title'] = $this->lang->line('upload_photo_title');
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('image_id', 'Upload image ', 'trim|required|xss_clean');
		$this->form_validation->set_rules('image_name', 'Image Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('image_description', 'Image Description', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		}
		else
		{
			$image_id =	$this->input->post('image_id');
			$image_name = $this->input->post('image_name');
			$image_description = $this->input->post('image_description');
			
			$query_data = array(
			'gallery_image_title' => $image_name,
			'gallery_image_description' => $image_description,
			
			);
			//Transfering data to Model
			$return_id=$this->gallery_model->gallery_update($query_data,$image_id);
			
			$data['message'] = $this->lang->line('photo_upload_success');
			//$this->session->set_flashdata('msg', $msg);
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		}

		
	}
	
		public function edit_album_ajax()
	{
		
		$image_album_name=$_POST["image_album_name"];
		$image_album_description=$_POST["image_album_description"];
		$image_id2=$_POST["image_id2"];
		$album_id=$_POST["album_id"];
		
		$image_album_created_user_id = $this->common_model->get_login_user_id();
		$image_album_created_date_time =	date("Y-m-d H:i:s");
		$image_album_active = 1;
		
		$query_data = array(
		'image_album_name' => $image_album_name,
		'image_album_description' => $image_album_description,
		'image_album_created_user_id' => $image_album_created_user_id,
		'image_album_created_date_time' => $image_album_created_date_time,
		'image_album_active' => $image_album_active,
		
		);
		//Transfering data to Model
		$return_id=$this->gallery_model->album_edit($query_data,$album_id);
		
		
		$query_data = array(
		'ref_image_image_album_id' => $album_id,		
		);
		
		foreach($image_id2 as $val):
		$this->gallery_model->gallery_update($query_data,$val);
		endforeach;
	
	}

		
	public function update_album($id)
	{
	$data['content'] ='gallery/update_album_form';
	$data['title'] = $this->lang->line('edit_album');
	$edit_query_result=$this->gallery_model->get_album_by_id($id);
	$edit_query_result= $edit_query_result->result();
	$data['edit_query_result'] = $edit_query_result[0];
	$this->load->vars($data);
	$this->load->view('layout/switchy_main');
			
	}
	
	
	public function create_album_ajax()
	{
		
		$image_album_name=$_POST["image_album_name"];
		$image_album_description=$_POST["image_album_description"];
		$image_id2=$_POST["image_id2"];
		
		$image_album_created_user_id = $this->common_model->get_login_user_id();
		$image_album_created_date_time =	date("Y-m-d H:i:s");
		$image_album_active = 1;
		
		$query_data = array(
		'image_album_name' => $image_album_name,
		'image_album_description' => $image_album_description,
		'image_album_created_user_id' => $image_album_created_user_id,
		'image_album_created_date_time' => $image_album_created_date_time,
		'image_album_active' => $image_album_active,
		
		);
		//Transfering data to Model
		$return_id=$this->gallery_model->album_insert($query_data);
		
		
		$query_data = array(
		'ref_image_image_album_id' => $return_id,		
		);
		
		foreach($image_id2 as $val):
		$this->gallery_model->gallery_update($query_data,$val);
		endforeach;
		
	//	echo "album created successfully";
		

		
	}	
	public function create_album()
	{
		$data['content'] ='gallery/add_album_by_plus_sign';
		$this->load->vars($data);
		$this->load->view('layout/switchy_main'); 
	}
	
	
	
	
	public function upload_images()
	{
		
	}
	
	
	
	
	
		
	public function do_download()
	{
		if(isset($_GET['filename']))
			{
			$fileName=$_GET['filename'];
			$fileName=str_replace("..",".",$fileName); //required. if somebody is trying parent folder files
			$file = "uploads/".$fileName;
			$file = str_replace("..","",$file);
			if (file_exists($file)) {
				$fileName =str_replace(" ","",$fileName);
				header('Content-Description: File Transfer');
				header('Content-Disposition: attachment; filename='.$fileName);
				header('Content-Transfer-Encoding: binary');
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($file));
				ob_clean();
				flush();
				readfile($file);
				exit;
			}
			}
	}
	
	 
	
	public function do_delete()
	{
		
		$original_image_dir = "all_images/image_gallery/original_image/";
		$ldpi_image_dir = "all_images/image_gallery/android/ldpi/";
		$mdpi_image_dir = "all_images/image_gallery/android/mdpi/";
		$hdpi_image_dir = "all_images/image_gallery/android/hdpi/";
		$xhdpi_image_dir = "all_images/image_gallery/android/xhdpi/";
		$xxhdpi_image_dir = "all_images/image_gallery/android/xxhdpi/";
		$xxxhdpi_image_dir = "all_images/image_gallery/android/xxxhdpi/";
		
			if(isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name']))
			{
				$fileName =$_POST['name'];
				$id =$_POST['id'];
				$delete_image_result=$this->gallery_model->delete_image_by_id($id);
				$fileName=str_replace("..",".",$fileName); //required. if somebody is trying parent folder files

				if (file_exists($original_image_dir.$fileName)) 
					unlink($original_image_dir.$fileName);
				
				if (file_exists($ldpi_image_dir.$fileName)) 
					unlink($ldpi_image_dir.$fileName);
				
				if (file_exists($mdpi_image_dir.$fileName)) 
					unlink($mdpi_image_dir.$fileName);
				
				if (file_exists($hdpi_image_dir.$fileName)) 
					unlink($hdpi_image_dir.$fileName);
				
				if (file_exists($xhdpi_image_dir.$fileName)) 
					unlink($xhdpi_image_dir.$fileName);
				
				if (file_exists($xxhdpi_image_dir.$fileName)) 
					unlink($xxhdpi_image_dir.$fileName);
				
				if (file_exists($xxxhdpi_image_dir.$fileName)) 
					unlink($xxxhdpi_image_dir.$fileName);
	
				
				echo $this->lang->line('create_album')." ".$fileName."<br>";
			}
	}
	
	
	/**
     * Function is for replace space or special chrecter to underscore( _ )
     */	
	function avoid_space_and_special_charecter($string)
	{
	$new_str="";
	$string=ucwords($string);
	$arr=preg_split("/[-,_,#,\s]+/", $string);
	foreach($arr as $data):
	$new_str.=ucwords($data);
	endforeach;

	return	$new_str;	

	}
	
	
    /**
     * Multiple upload functionality will fallback to CodeIgniters default do_upload() 
     * method so configuration is backwards compatible between do_upload() and the new do_multi_upload() 
     * method provided by Multi File Upload extension.
     *
     */
    public function do_upload()
	{
    
       $output_dir = "all_images/image_gallery/original_image/";
	   $album_id=$_POST["album_id"];
	   $type=$_POST["type"];
		if(isset($_FILES["myfile"]))
		{
			
			
			$error =$_FILES["myfile"]["error"];
			//You need to handle  both cases
			//If Any browser does not support serializing of multiple files using FormData() 
			if(!is_array($_FILES["myfile"]["name"])) //single file
			{
				$fileName = $_FILES["myfile"]["name"];
				$fileName =$this->avoid_space_and_special_charecter($fileName);
				$rename_fileName = time()."_".$fileName;
				$target_fileName_with_folder = $output_dir.$rename_fileName;
				move_uploaded_file($_FILES["myfile"]["tmp_name"],$target_fileName_with_folder);
				$image_id=$this->file_insert_to_database($album_id,$fileName,$rename_fileName,$target_fileName_with_folder);
				//$this->resize_image($target_fileName_with_folder,$rename_fileName );
				
				if($type=="gallery")
				{
					$ret[]= $fileName;
					$ret["arr_data"]= '<input type="hidden" name="image_id" value="'.$image_id.'" ><input type="hidden" name="file_name" value="'.$rename_fileName.'" >';
				}
				elseif($type=="album")
				{
					$ret[]= $fileName;
					$ret["arr_data"]= '<input type="hidden" name="image_id2[]" value="'.$image_id.'" ><input type="hidden" name="file_name2[]" value="'.$rename_fileName.'" >';
					$ret["f_name"]=$rename_fileName;
					$ret["f_id"]=$image_id;
				}
				else
					$ret[]= $fileName;
				
				
			}
			else  //Multiple files, file[]
			{
			  $fileCount = count($_FILES["myfile"]["name"]);
			  for($i=0; $i < $fileCount; $i++)
			  {
				$fileName = $_FILES["myfile"]["name"][$i];
				$rename_fileName = time()."_".$fileName;
				$target_fileName_with_folder = $output_dir.$rename_fileName;
				move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$target_fileName_with_folder);
				$image_id=$this->file_insert_to_database($album_id,$fileName,$rename_fileName,$target_fileName_with_folder);
				$this->resize_image($target_fileName_with_folder,$rename_fileName );
				$ret[]= $fileName;
				//$arr_data.= '<input type="hidden" name="image_id" value="'.$image_id.'" ><input type="hidden" name="file_name" value="'.$rename_fileName.'" >';
				
			  }
			
			}
			echo json_encode($ret);
		 }
		 
		
 
    }
	
	
	
	/*
	this funtion is for insert image info to database
	*/
	public function file_insert_to_database($album_id,$fileName,$rename_fileName,$target_fileName_with_folder)
	{
	$array = explode('.', $fileName);
	$extension = end($array);
	$path_android="all_images/image_gallery/android";
	$path_ios="all_images/image_gallery/ios";
		
	$user_type=$this->session->userdata('user_type');
	$query_data = array(
		'gallery_image_from_farma' => $user_type==USER_TYPE_SUPER_ADMIN?1:0,
		'ref_gallery_image_pharmacy_id'=> $user_type==USER_TYPE_SUPER_ADMIN?NULL:$this->session->userdata('pharmacy_id'),
		'gallery_image_title' => $fileName,
		'gallery_image_description' => $fileName,
		'gallery_image_storage_path' =>"all_images/image_gallery/original_image/".$rename_fileName,
			
			);
			//Transfering data to Model
			$return_id=$this->gallery_model->image_insert($query_data);
			
			return	$return_id;
	
	}
	
	
	/*
	this funtion is for resize image for iphone and android folder
	*/
	public function resize_image($target_fileName_with_folder,$rename_fileName )
	{
	$path_android="all_images/image_gallery/android/";
	$data = getimagesize($target_fileName_with_folder);
	//$width = (int)$data[0];
	//$height = (int)$data[1];
	$width = 320;
	$height = 240;
	$xxxhdpi_width=$width;
	$mdpi_width=(int)($xxxhdpi_width/4);
	$ldpi_width=(int)($mdpi_width * .75);
	$hdpi_width=(int)($mdpi_width * 1.5);
	$xhdpi_width=(int)($mdpi_width * 2);
	$xxhdpi_width=(int)($mdpi_width * 3);
	
	$xxxhdpi_height=$height;
	$mdpi_height=(int)($xxxhdpi_height/4);
	$ldpi_height=(int)($mdpi_height * .75);
	$hdpi_height=(int)($mdpi_height * 1.5);
	$xhdpi_height=(int)($mdpi_height * 2);
	$xxhdpi_height=(int)($mdpi_height * 3);
	

	$this->resizeImgByDevice($target_fileName_with_folder,$path_android.'ldpi/'.$rename_fileName,$ldpi_width,$ldpi_height);
	$this->resizeImgByDevice($target_fileName_with_folder,$path_android.'mdpi/'.$rename_fileName,$mdpi_width,$mdpi_height);
	$this->resizeImgByDevice($target_fileName_with_folder,$path_android.'hdpi/'.$rename_fileName,$hdpi_width,$hdpi_height);
	$this->resizeImgByDevice($target_fileName_with_folder,$path_android.'xhdpi/'.$rename_fileName,$xhdpi_width,$xhdpi_height);
	$this->resizeImgByDevice($target_fileName_with_folder,$path_android.'xxhdpi/'.$rename_fileName,$xxhdpi_width,$xxhdpi_height);
	$this->resizeImgByDevice($target_fileName_with_folder,$path_android.'xxxhdpi/'.$rename_fileName,$xxxhdpi_width,$xxxhdpi_height);
	
	}
	
	
	
   function resizeImgByDevice($source,$target,$width,$height)
   {
   
   //$source_image = base_url().'pic2.jpg';
   $source_image = $source;
   $config['image_library'] = 'gd2';
   $config['source_image']  = $source_image;
   $config['new_image'] = $target;
   $config['maintain_ratio'] = true;
   $config['width']  = $width;
   $config['height']  = $height;
   
  
   $this->image_lib->clear();
   $this->image_lib->initialize($config);
   $this->image_lib->resize();
   }
	

	public function edit_album($id)
	{
		$data['content'] ='gallery/edit_album_form';
		$data['title'] = $this->lang->line('edit_album');
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('image_album_name', $this->lang->line('album_name'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('image_album_description', $this->lang->line('album_desc'), 'trim|required|xss_clean');
		
		$edit_query_result=$this->gallery_model->get_album_by_id($id);
		$edit_query_result= $edit_query_result->result();
		$data['edit_query_result'] = $edit_query_result[0];
		if ($this->form_validation->run() == FALSE) 
		{
			
			
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		} 
		else 
		{
			
			$image_album_name =	$this->input->post('image_album_name');
			$image_album_description = $this->input->post('image_album_description');
			$image_album_edited_user_id = $this->common_model->get_login_user_id();
			$image_album_active = 1;
			
			$query_data = array(
			'image_album_name' => $image_album_name,
			'image_album_description' => $image_album_description,
			'image_album_edited_user_id' => $image_album_edited_user_id,
			'image_album_active' => $image_album_active,
			
			);
			//Transfering data to Model
			$this->gallery_model->album_edit($query_data,$id);
			$data['message'] = $this->lang->line('edit_album_success');
			
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		}

	
	}
	
	
	
	
	
	public function get_album_photo($id)
	{
		$data['content'] ='gallery/get_album_photo';
		$album_name=$this->gallery_model->get_album_name_by_album_id($id);
		
		$data['title'] = $this->lang->line('photo_by_album').$album_name;
		$offset=0;
		$limit=8;
		$data['query_result']=$this->gallery_model->get_all_photo_by_album_id($id,$offset,$limit);
		$data['album_id']=$id;
		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}	
	
	public function gallery_admin()
	{
		$data['content'] ='gallery/gallery_admin';
		$data['title'] = $this->lang->line('photo_title');
		
		$per_page=8;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->gallery_model->get_all_gallery_list($limit,$per_page);	/* for view all data to admin */
		//$data['query_album']=$this->gallery_model->get_all_album_with_image_list($limit,$per_page);	/* for view all data to admin */
		

		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
		
		
	public function all_photos_by_lazy_load()
	{
		$offset=$_GET['offset'];
		$album_id=$_GET['album_id'];
		
		$limit=8;
		
		if(isset($album_id) && $album_id>0)
			$query_result=$this->gallery_model->get_all_photo_by_album_id($album_id,$offset,$limit);
		else
			$query_result=$this->gallery_model->get_all_photo_list($offset,$limit);
		
		$str='';
		$i=0;
		$str.='<tr>';
		foreach($query_result as $row):
		if($i%4==0)
		$str.="</tr><tr>";
		$url=base_url().$row->image_storage_base_path_android."/xhdpi/".$row->image_name_as_saved;
		$base_url_with_asstes=base_url()."assets";
		$base_url_with_gallery=base_url()."gallery";
		$base_url_with_all_images=base_url()."all_images";
		$close_button=$this->lang->line('close_button');
		
		$str.=<<<EOF
		
<td class="col-lg-3 col-md-4 col-xs-6 thumb">
                <span class="thumbnail" >
					 <a  href="$base_url_with_gallery/do_delete_by_url?page=photo&op=delete&name=$row->image_name_as_saved&id=$row->image_id">
						<i id="rmv" style="display:none;" class="glyphicon glyphicon-remove"></i>
					 </a>
					 <a href="" data-toggle="modal" data-target="#popup_$row->image_id ">
					 <img  src="$base_url_with_asstes/timthumb.php?src=$url&q=100&w=240&h=180" alt="">
					 </a>
					
                </span>
				
								
			<div class="modal fade" id="popup_$row->image_id">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  </div>
				  <div class="modal-body">
					<p>	Album:$row->image_album_name </p>
					<figure>
					   <img src="$base_url_with_all_images/image_gallery/original_image/$row->image_name_as_saved" class="img-responsive" alt=""> 
					  <figcaption>$row->image_name</figcaption>
					</figure>
					

				  </div>
				  <div class="modal-footer">
					<button type = "button" class = "btn btn-danger" data-dismiss = "modal">
					   $close_button
					</button>
					
				  </div>
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
            </td>
			
	
			
EOF;
		++$i;
		endforeach;
		$str.='</tr>';
		$str.=<<<EOF
		<script>
			 $("span.thumbnail").hover(function()
				 {
					 
					$(this).children("a").children("i").css({"display":"block","font-size":"20px","left":"5px","position":"absolute","top":"5px"});
					$(this).children('div.caption').slideDown(250); //.fadeIn(250)
				 }, 
				 function()
				{
				$(this).children("a").children("i").css("display","none");
				$(this).children('div.caption').slideUp(250); //.fadeOut(205)
				});
		</script>		
EOF;
		
		if($i==0)
			$str='';
		
		echo $str;

	}
	
		
	public function album_admin()
	{
		$data['content'] ='gallery/album_admin';
		$data['title'] = $this->lang->line('album_manage');
		
		$per_page=POST_PER_PAGE;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->gallery_model->get_all_album_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->gallery_model->no_of_rows_album_list();	/* get the total rows from the query */
		$url=base_url()."album/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
	
	public function delete_album($id,$event_status) 
	{
    
		$result=$this->gallery_model->delete_album_by_id($id);
		$msg=$result>0?$this->lang->line('album_deleted'):$this->lang->line('album_not_deleted');
		$this->session->set_flashdata('msg', $msg);
		redirect($event_status);
			
	}
	
	
	public function view_album($id)
	{
	
		$data['content'] ='gallery/single_album_view';
		$data['title'] = $this->lang->line('view_album');
		$query_result=$this->gallery_model->get_album_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
	/*
	FUNCTION NAME : delete_image_by_method()
	it will delete the  photo by method*/	 
	
	public function delete_image_by_method($id,$fileName)
	{
		
		$original_image_dir = "all_images/image_gallery/original_image/";
		$ldpi_image_dir = "all_images/image_gallery/android/ldpi/";
		$mdpi_image_dir = "all_images/image_gallery/android/mdpi/";
		$hdpi_image_dir = "all_images/image_gallery/android/hdpi/";
		$xhdpi_image_dir = "all_images/image_gallery/android/xhdpi/";
		$xxhdpi_image_dir = "all_images/image_gallery/android/xxhdpi/";
		$xxxhdpi_image_dir = "all_images/image_gallery/android/xxxhdpi/";

		$delete_image_result=$this->gallery_model->delete_image_by_id($id);
		$fileName=str_replace("..",".",$fileName); //required. if somebody is trying parent folder files

				if (file_exists($original_image_dir.$fileName)) 
					unlink($original_image_dir.$fileName);
				
				if (file_exists($ldpi_image_dir.$fileName)) 
					unlink($ldpi_image_dir.$fileName);
				
				if (file_exists($mdpi_image_dir.$fileName)) 
					unlink($mdpi_image_dir.$fileName);
				
				if (file_exists($hdpi_image_dir.$fileName)) 
					unlink($hdpi_image_dir.$fileName);
				
				if (file_exists($xhdpi_image_dir.$fileName)) 
					unlink($xhdpi_image_dir.$fileName);
				
				if (file_exists($xxhdpi_image_dir.$fileName)) 
					unlink($xxhdpi_image_dir.$fileName);
				
				if (file_exists($xxxhdpi_image_dir.$fileName)) 
					unlink($xxxhdpi_image_dir.$fileName);
	
			
	}
	
	
			/*
	FUNCTION NAME : do_delete_by_url($offset,$limit)
	it will delete te  photo by id*/	 
	
	public function do_delete_by_url() 
	{
		
		$original_image_dir = "all_images/image_gallery/original_image/";
		$ldpi_image_dir = "all_images/image_gallery/android/ldpi/";
		$mdpi_image_dir = "all_images/image_gallery/android/mdpi/";
		$hdpi_image_dir = "all_images/image_gallery/android/hdpi/";
		$xhdpi_image_dir = "all_images/image_gallery/android/xhdpi/";
		$xxhdpi_image_dir = "all_images/image_gallery/android/xxhdpi/";
		$xxxhdpi_image_dir = "all_images/image_gallery/android/xxxhdpi/";
		
			if(isset($_GET["op"]) && $_GET["op"] == "delete" && isset($_GET['name']))
			{
				$fileName =$_GET['name'];
				$id =$_GET['id'];
				$delete_image_result=$this->gallery_model->delete_image_by_id($id);
				$fileName=str_replace("..",".",$fileName); //required. if somebody is trying parent folder files

				if (file_exists($original_image_dir.$fileName)) 
					unlink($original_image_dir.$fileName);
				
				if (file_exists($ldpi_image_dir.$fileName)) 
					unlink($ldpi_image_dir.$fileName);
				
				if (file_exists($mdpi_image_dir.$fileName)) 
					unlink($mdpi_image_dir.$fileName);
				
				if (file_exists($hdpi_image_dir.$fileName)) 
					unlink($hdpi_image_dir.$fileName);
				
				if (file_exists($xhdpi_image_dir.$fileName)) 
					unlink($xhdpi_image_dir.$fileName);
				
				if (file_exists($xxhdpi_image_dir.$fileName)) 
					unlink($xxhdpi_image_dir.$fileName);
				
				if (file_exists($xxxhdpi_image_dir.$fileName)) 
					unlink($xxxhdpi_image_dir.$fileName);
	
				
				//echo "Deleted File ".$fileName."<br>";
				redirect('gallery');
			}
			
	}
	
	
    public function album_delete_by_url()
	{
	$album_id =$_GET['id'];
	$all_images=$this->gallery_model->get_images_by_album_id($album_id);
	
	foreach($all_images as $data):
	$id=$data->image_id;
	$fileName=$data->image_name_as_saved;
	$this->delete_image_by_method($id,$fileName);
	endforeach;
	
	$delete_images=$this->gallery_model->delete_image_by_album_id($album_id);
	$delete_album=$this->gallery_model->delete_album_by_id($album_id);
	redirect('gallery');
	
		
		
	}
	
	
	
}
	
	