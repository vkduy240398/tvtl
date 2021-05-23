<?php

namespace App\Controllers\Admins;
use App\Controllers\BaseController;
use App\Models\UsersModel;
class Users extends BaseController
{	
	var $control = 'users';
	var $title = "Người dùng";
	function __construct(){
		$this->UsersModel = new UsersModel();
	}
	public function index()
	{	
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$encrypter = \Config\Services::encrypter();
		$session = session();
		$NotIn = [$session->get('id')];
		$data = [
			'users' => $this->UsersModel->where_not_in($NotIn),
			'title'	=>'Quản lý '.$this->title,
			'control'=>$this->control
		];
		return view('admin/layout/'.$this->control.'/index',$data?$data:NULL);
	}
	public function add(){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
	
		$password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
		if ($this->request->getPost()) {
			$fullname =$this->request->getPost('username');
			$files = $this->request->getFile('image');
			if ($files->getClientMimeType()  =="image/png" || $files->getClientMimeType()  =="image/jpg" || $files->getClientMimeType()  =="image/jpeg") {
				$fileName = $files->getName();
				$ar_name_image = explode('.',$fileName);
				$thumbImage = $fullname.'.'.$ar_name_image[1];
				$arr =[
					'fullname' =>$this->request->getPost('fullname'),
					'username' =>$this->request->getPost('username'),
					'password' =>$password,
					'email' =>$this->request->getPost('email'),
					'address' =>$this->request->getPost('address'),
					'avatar'=>$thumbImage
				];
				// echo "<pre>";
				// print_r($arr);die;
				$result = $this->UsersModel->add($arr);
				if ($result['type'] =="success") {
					$files->move('uploads/'.$result['insertID'], $thumbImage);
					return redirect()->to('index')->with('success',ADD_SUCCESS);
				}
				else{
					return redirect()->to('index')->with('error',ADD_FAIL);
				}
			
			}
			else{
				
			}
		}
		else{
			
		}
		$data = [
			'title'	=>'Thêm mới '.$this->title,
			'control'=>$this->control
		];
		return view('admin/layout/'.$this->control.'/add',$data?$data:NULL);
	}

	function delete($id){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$qr = $this->UsersModel->find_one(array('id'=>$id));
		$result = $this->UsersModel->delete_where(array('id'=>$id));
		if ($result) {
			if ($qr !=null) {
				$fileName = 'uploads/'.$id.'/'.$qr['avatar'];
				$html = 'uploads/'.$id.'/index.html';
				$path_dir = 'uploads/'.$id;
				if ($qr['avatar'] !='') {
					if (file_exists($fileName)) {
						unlink($fileName);
						unlink($html);
						rmdir($path_dir);
					}
				}
			}
			return redirect()->to(base_url(ADMIN.$this->control.'/index'))->with('success','Xóa thành công');
		}
	}
	function edit($id){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$datas = $this->UsersModel->find_one(array('id'=>$id));
		$fileImage = $datas['avatar'];
		if ($this->request->getPost()) {
			$files = $this->request->getFile('image');
			$password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
			if ($_FILES['image']['name']) {
				$filename ='uploads/'.$datas['id'].'/'.$datas['avatar'].'';
				$fullname =$this->request->getPost('username');
				// echo $filename;die;
				if ($datas['avatar'] !='') {
					if (file_exists($filename)) {
						unlink($filename);
					}
				}
				if ($files->getClientMimeType()  =="image/png" || $files->getClientMimeType()  =="image/jpg" || $files->getClientMimeType()  =="image/jpeg") {
					$fileName = $files->getName();
					$ar_name_image = explode('.',$fileName);
					$thumbImage = $fullname.'.'.$ar_name_image[1];
					// echo $thumbImage;die;
					$files->move('uploads/'.$datas['id'], $thumbImage);
					
				}
			}
			else{
				$thumbImage = $datas['avatar'];
			}
			$arr =[
				'fullname' =>$this->request->getPost('fullname'),
				'username' =>$this->request->getPost('username'),
				'email' =>$this->request->getPost('email'),
				'address' =>$this->request->getPost('address'),
				'avatar'=>$thumbImage
			];
			$result = $this->UsersModel->edit($arr,array('id'=>$id));
			if ($result) {
				return redirect()->to(base_url(ADMIN.'users/index'))->with('success',EDIT_SUCCESS);
			}
			else{
				return redirect()->to(base_url(ADMIN.'users/index'))->with('error',EDIT_FAIL);
			}
		}
		$data = [
			'datas'	=> $datas,
			'title'	=>'Cập nhật dữ liệu '.$this->title,
			'control'=>$this->control
		];
		return view('admin/layout/'.$this->control.'/edit',$data?$data:NULL);
	}
	function checkglobals(){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$id = $this->request->getPost('id');
		$global = $this->request->getPost('global');
		$properties = $this->request->getPost('properties');
		$dataUpdate[$properties] = $global;
		$result = $this->UsersModel->edit($dataUpdate,array('id'=>$id));
		if ($result) {
			echo json_encode($result);
		}
	}
	function deleteAll(){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$list_id = $this->request->getPost('list_id');
		// echo $list_id;die;
		$list_id_delete = explode(',',$list_id);
		foreach($list_id_delete as $key => $val){
			$qr = $this->UsersModel->find_one(array('id'=>$val));
			if ($qr !=null) {
				$fileName = 'uploads/'.$val.'/'.$qr['avatar'];
				echo $fileName;
				$html = 'uploads/'.$val.'/index.html';
				$path_dir = 'uploads/'.$val;
				if ($qr['avatar'] !='') {
					unlink($fileName);
					unlink($html);
					rmdir($path_dir);
				}
				
				$result =$this->UsersModel->delete_where(array('id'=>$val));
				if ($result) {
					echo json_encode("success");
				}
			}
		}
	}

}
