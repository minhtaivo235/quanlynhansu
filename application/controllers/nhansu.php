<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'UploadHandler.php';

class nhansu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('nhansu_model');
		$ketqua = $this->nhansu_model->getAllData();
		$ketqua = array('mangketqua' => $ketqua );
		$this->load->view('nhansu_view', $ketqua);
	}
	public function nhansu_add()
	{
		# code...
		

		// xử lý upload file

		$target_dir = "file_upload/";
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
		if (file_exists($target_file)) {
		  //echo "Sorry, file already exists.";
		  $uploadOk = 0;
		}

		// Check file size
		if ($_FILES["anhavatar"]["size"] > 500000) {
		  //echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  //echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
		    //echo "The file ". basename( $_FILES["anhavatar"]["name"]). " has been uploaded.";
		  } else {
		    //echo "Sorry, there was an error uploading your file.";
		  }
		}

		$ten = $this->input->post('ten');
		$tuoi = $this->input->post('tuoi');
		$sodonhang = $this->input->post('sodonhang');
		$linkfb = $this->input->post('linkfb');
		$sdt = $this->input->post('sdt');
		$anhavatar = base_url()."file_upload/". basename($_FILES["anhavatar"]["name"]);

		// gọi model
		$this->load->model('nhansu_model');
		if($this->nhansu_model->insertData($ten, $tuoi, $sdt, $anhavatar, $linkfb, $sodonhang))
		{
			$this->load->view('themthanhcong_view.php');
		}
		else 
		{
			echo "Không thành công";
		}
	}
	public function nhansu_edit($id)
	{
		# code...
		$this->load->model('nhansu_model');
		$result = $this->nhansu_model->getDataById($id); // lấy ra dữ liệu thông qua model
		// biến dữ liệu thành mảng
		$result = array('mangkq' => $result );
		// truyền dữ liệu vào view
		$this->load->view('sua_nhanvien_view', $result, FALSE);
	}
	public function nhansu_delete($id)
	{
		# code...

		$this->load->model('nhansu_model');
		if($this->nhansu_model->removeById($id)){

			$this->load->view('xoathanhcong_view');
		}else {
			echo 'xóa thất bại';
		}
	}

	public function update_nhansu()
	{
		$id = $this->input->post('id');
		$ten = $this->input->post('ten');	
		$tuoi = $this->input->post('tuoi');
		$sodonhang = $this->input->post('sodonhang');
		$sdt = $this->input->post('sdt');
		$linkfb = $this->input->post('linkfb');

		// xử lý upload file

		$target_dir = "file_upload/";
		$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
		  if($check !== false) {
		   // echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		   // echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// Check if file already exists
		if (file_exists($target_file)) {
		 // echo "Sorry, file already exists.";
		  $uploadOk = 0;
		}

		// Check file size
		if ($_FILES["anhavatar"]["size"] > 500000) {
		 // echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		 // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  //echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
		    //echo "The file ". basename( $_FILES["anhavatar"]["name"]). " has been uploaded.";
		  } else {
		    //echo "Sorry, there was an error uploading your file.";
		  }
		}

		$anhavatar = base_url()."file_upload/". basename($_FILES["anhavatar"]["name"]);
		// kiểm tra điều kiện nếu có upload thì lấy tên đó
		if ($anhavatar != base_url()."file_upload/") { // nếu có ảnh upload thì in ra anhavatar
			$anhavatar = base_url()."file_upload/". basename($_FILES["anhavatar"]["name"]);
		}
		else{ // neu không có upload thì lấy đường link cũ
			$anhavatar = $this->input->post('anhavatar2');
			//echo $anhavatar;
		}

		// gọi model xử lý dữ liệu nhận được
		$this->load->model('nhansu_model');
		if($this->nhansu_model->updateById($id, $ten, $tuoi, $sdt, $anhavatar, $linkfb, $sodonhang)){
			$this->load->view('themthanhcong_view');
		}else {
			echo 'thất bại';
		}

		
	}

	public function ajax_add()
	{
		$ten = $this->input->post('ten');
		$tuoi = $this->input->post('tuoi');
		$sodonhang = $this->input->post('sodonhang');
		$linkfb = $this->input->post('linkfb');
		$sdt = $this->input->post('sdt');
		$anhavatar = 'http://localhost:8001/quanlynhansu/file_upload/c.jpg';
		//$anhavatar = base_url()."file_upload/". basename($_FILES["anhavatar"]["name"]);

		// gọi model
		$this->load->model('nhansu_model');
		$ketqua = $this->nhansu_model->insertData($ten, $tuoi, $sdt, $anhavatar, $linkfb, $sodonhang);
		if($ketqua)
		{
			echo "thành công";
		}
		else 
		{
			echo "Không thành công";
		}
		
	}

	public function uploadfile()
	{
		$uploadfile = new UploadHandler();
	}

	

}

/* End of file nhansu.php */
/* Location: ./application/controllers/nhansu.php */