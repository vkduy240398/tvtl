<?php

namespace App\Controllers\Admins;
use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\LogoModels;
class Slide extends BaseController
{	
	var $control = 'slide';
	var $title = "slide";
	function __construct(){
		$this->UsersModel = new UsersModel();
		$this->LogoModels = new LogoModels();
	}
	public function index()
	{	
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$data = [
			'users' => $this->LogoModels->Select_array(NULL,array('type'=>'slide')),
			'title'	=>'Quản lý '.$this->title,
			'control'=>$this->control
		];
		return view('admin/layout/'.$this->control.'/index',$data?$data:NULL);
	}
	public function add(){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		if ($this->request->getPost()) {
			$name =$this->request->getPost('name');
			$files = $this->request->getFile('avatar');
			if ($files->getClientMimeType()  =="image/png" || $files->getClientMimeType()  =="image/jpg" || $files->getClientMimeType()  =="image/jpeg") {
				$fileName = $files->getName();
				$ar_name_image = explode('.',$fileName);
				$thumbImage = $name.'.'.$ar_name_image[1];
				$arr =[
					'name' =>$this->request->getPost('name'),
					'image'=>$thumbImage,
					'type'	=> 'slide',
					'created_at'	=> gmdate('Y-m-d H:i:s',time()+7*3600)
				];
				// echo "<pre>";
				// print_r($arr);die;
				$result = $this->LogoModels->add($arr);
				if ($result['type'] =="success") {
					$files->move('uploads/slide/'.$result['insertID'], $thumbImage);
					return redirect()->to('index')->with('success',ADD_SUCCESS);
				}
				else{
					return redirect()->to(base_url($this->control.'index'))->with('error',ADD_FAIL);
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
		$qr = $this->LogoModels->find_one(array('id'=>$id));
		$result = $this->LogoModels->delete_where(array('id'=>$id));
		if ($result) {
			if ($qr !=null) {
				$fileName = 'uploads/slide/'.$id.'/'.$qr['image'];
				$html = 'uploads/slide/'.$id.'/index.html';
				$path_dir = 'uploads/slide/'.$id;
				if ($qr['image'] !='') {
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
		$datas = $this->LogoModels->find_one(array('id'=>$id));
		$fileImage = $datas['image'];
		if ($this->request->getPost()) {
			$files = $this->request->getFile('avatar');
			$password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
			if ($_FILES['avatar']['name']) {
				$filename ='uploads/slide/'.$datas['id'].'/'.$datas['image'].'';
				$name =$this->request->getPost('name');
				if ($datas['image'] !='') {
					if (file_exists($filename)) {
						unlink($filename);
					}
				}
				if ($files->getClientMimeType()  =="image/png" || $files->getClientMimeType()  =="image/jpg" || $files->getClientMimeType()  =="image/jpeg") {
					$fileName = $files->getName();
					$ar_name_image = explode('.',$fileName);
					$thumbImage = $name.'.'.$ar_name_image[1];
					$files->move('uploads/slide/'.$datas['id'], $thumbImage);
					
				}
			}
			else{
				$thumbImage = $datas['image'];
			}
			$arr =[
				'name' =>$this->request->getPost('name'),
				'image'=>$thumbImage,
				'type'	=> 'slide',
				'updated_at'	=> gmdate('Y-m-d H:i:s',time()+7*3600)
			];
			$result = $this->LogoModels->edit($arr,array('id'=>$id));
			if ($result) {
				return redirect()->to(base_url(ADMIN.$this->control.'/index'))->with('success',EDIT_SUCCESS);
			}
			else{
				return redirect()->to(base_url(ADMIN.$this->control.'/index'))->with('error',EDIT_FAIL);
			}
		}
		$data = [
			'datas'	=> $datas,
			'title'	=>'Cập nhật dữ liệu '.$this->title,
			'control'=>$this->control
		];
		return view('admin/layout/'.$this->control.'/edit',$data?$data:NULL);
	}
	function deleteAll(){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$list_id = $this->request->getPost('list_id');
		// echo $list_id;die;
		$list_id_delete = explode(',',$list_id);
		foreach($list_id_delete as $key => $val){
			$qr = $this->LogoModels->find_one(array('id'=>$val));
			if ($qr !=null) {
				$fileName = 'uploads/slide/'.$val.'/'.$qr['image'];
				echo $fileName;
				$html = 'uploads/slide/'.$val.'/index.html';
				$path_dir = 'image/slide/'.$val;
				if ($qr['avatar'] !='') {
					unlink($fileName);
					unlink($html);
					rmdir($path_dir);
				}
				
				$result =$this->LogoModels->delete_where(array('id'=>$val));
				if ($result) {
					echo json_encode("success");
				}
			}
		}
	}

}
