<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nhansu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('nhansu_model');
		$ketqua = $this->nhansu_model->getAllData();
		$ketqua  = [
		    'mangketqua' => $ketqua
		];
		$this->load->view('nhansu_view', $ketqua);
		/*$this->load->view('nhansu_view');*/
	}
	public function nhansu_add()
	{
		// echo "ten:$ten, tuoi:$tuoi, link: $linkfb, dt:$dt,sodonhang:$sodonhang";


		//uploadfile


		$target_dir = "FileUpload/";
		$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
		  if($check !== false) {
		    echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// Check if file already exists
		// if (file_exists($target_file)) {
		//   echo "file đã tồn tại.";
		//   $uploadOk = 0;
		// }

		// Check file size
		if ($_FILES["anhavatar"]["size"] > 50000000) {
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  echo "Chỉ nhận ảnh";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  echo "Không upload được.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
		    // echo "The file ". htmlspecialchars( basename( $_FILES["anhavatar"]["name"])). " has been uploaded.";
		  } else {
		    //echo "Sorry, there was an error uploading your file.";
		  }
		}
		$anhavatar =  base_url()."FileUpload/" .$_FILES["anhavatar"]["name"] ;
		$ten=$this->input->post('ten');
		$tuoi=$this->input->post('tuoi');
		$linkfb=$this->input->post('linkfb');
		$sdt=$this->input->post('sdt');
		$sodonhang=$this->input->post('sodonhang');

		$this->load->model('nhansu_model');
		$trangthai = $this->nhansu_model->insertDataToMysql($ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang);
		if($trangthai) $this->load->view('Thanhcong_view');
	}
	public function sua_nhansu($idnhan)
	{
		$this->load->model('nhansu_model');
		$ketqua = $this->nhansu_model->GetDataByID($idnhan);
		$ketqua = [
		    'dulieukq' => $ketqua
		];
		$this->load->view('Sua_nhansu_view', $ketqua);
	}
	public function xoa_nhansu($idnhan)
	{
		$this->load->model('nhansu_model');
		$this->nhansu_model->RemoveDataByID($idnhan);
		$this->load->view('Thanhcong_view');
	}
	public function update_nhansu()
	{
		$id=$this->input->post('id');
		//$anhavatar=$this->input->post('anhavatar');
		$ten=$this->input->post('ten');
		$tuoi=$this->input->post('tuoi');
		$sdt=$this->input->post('sdt');
		$linkfb=$this->input->post('linkfb');
		$sodonhang=$this->input->post('sodonhang');
		/////
		$target_dir = "FileUpload/";
		$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
		  if($check !== false) {
		    //echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		   //echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// Check if file already exists
		// if (file_exists($target_file)) {
		//   echo "file đã tồn tại.";
		//   $uploadOk = 0;
		// }

		// Check file size
		if ($_FILES["anhavatar"]["size"] > 50000000) {
		  //echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  //echo "Chỉ nhận ảnh";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  // echo "Không upload được.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
		    //echo "The file ". htmlspecialchars( basename( $_FILES["anhavatar"]["name"])). " has been uploaded.";
		  } else {
		    //echo "Sorry, there was an error uploading your file.";
		  }
		}
		$anhavatar =  base_url()."FileUpload/" .$_FILES["anhavatar"]["name"] ;
		if($uploadOk==0) 
		{
			$anhavatar=$this->input->post('anhavatar2');
		}
		$this->load->model('nhansu_model');
	    $this->nhansu_model->UpdateByID($id,$ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang);
		$this->load->view('Thanhcong_view');
	}
	public function AddByAjax()
	{
		$anhavatar =  'https://cdn.24h.com.vn/upload/2-2021/images/2021-05-07/2-1620379400-929-width660height370.jpg' ;
		$ten=$this->input->post('ten');
		$tuoi=$this->input->post('tuoi');
		$linkfb=$this->input->post('linkfb');
		$sdt=$this->input->post('sdt');
		$sodonhang=$this->input->post('sodonhang');

		$this->load->model('nhansu_model');
		$trangthai = $this->nhansu_model->insertDataToMysql($ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang);
		if($trangthai) 
		{
			echo 'Thành công';
		}
		else 
		{
			echo 'thất bại';
		}
	}
}

/* End of file nhansu_controller.php */
/* Location: ./application/controllers/nhansu_controller.php */