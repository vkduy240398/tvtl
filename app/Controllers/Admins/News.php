<?php

namespace App\Controllers\Admins;
use App\Controllers\BaseController;
use App\Models\BranchModels;
use App\Models\NewsModels;
class News extends BaseController
{	
	var $control = 'news';
	var $title = "bài viết";
	var $path_dir = 'uploads/news/';
	function __construct(){
		$this->BranchModels = new BranchModels();
		$this->NewsModels = new NewsModels();
		
	}
	public function index()
	{	
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$news = $this->NewsModels->select_array();
		foreach($news as $key => $val){
			$name_cate = "-----";
			$infocate = $this->BranchModels->select_row_array_where('name cate_name',array('id'=>$val['id_branch']));
			$name_cate = $infocate['cate_name'];
			if ($infocate !=NULL) {
				$news[$key]['name_cate'] =$name_cate;
			}
		}
		// echo "<pre>";
		// print_r($news);
		$data = [
			'datas' => $news,
			'title'	=>'Quản lý '.$this->title,
			'control'=>$this->control
		];
		return view('admin/layout/'.$this->control.'/index',$data?$data:NULL);
	}
	public function add(){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$branch = $this->BranchModels->select_array('*',array('parentid'=>0));
		foreach($branch as $key => $val){
			$branch[$key]['child'] = $this->BranchModels->select_array('*',array('parentid'=>$val['id']));
		}
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			
			$title = $data_post['title'];
			$files = $this->request->getFile('image');
			// print_r($files);
			if ($files->getClientMimeType()  =="image/png" || $files->getClientMimeType()  =="image/jpg" || $files->getClientMimeType()  =="image/jpeg") {
				$fileName = $files->getName();
				$ar_name_image = explode('.',$fileName);
				$thumbImage = $title.'.'.$ar_name_image[1];
				$data_post['publish']?$publish = 1:$publish = 0;
				$data_post['publish'] = $publish;
				$data_post['image'] = $thumbImage;
				$data_post['created_at'] = gmdate("Y-m-d H:i:s",time()+7*3600);
				
				$result = $this->NewsModels->add($data_post);
				if ($result['type'] =="success") {
					$files->move('uploads/news/'.$result['insertID'], $thumbImage);
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
			'path_dir'	=> $this->path_dir,
			'branch'	=> $branch,
			'title'		=>'Thêm mới '.$this->title,
			'control'	=>$this->control
		];
		return view('admin/layout/'.$this->control.'/add',$data?$data:NULL);
	}

	function delete($id){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$qr = $this->NewsModels->find_one(array('id'=>$id));
		$result = $this->NewsModels->delete_where(array('id'=>$id));
		if ($result) {
			if ($qr !=null) {
				$fileName = 'uploads/news/'.$id.'/'.$qr['image'];
				$html = 'uploads/news/'.$id.'/index.html';
				$path_dir = 'uploads/news/'.$id;
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
		$branch = $this->BranchModels->select_array('*',array('parentid'=>0));
		foreach($branch as $key => $val){
			$branch[$key]['child'] = $this->BranchModels->select_array('*',array('parentid'=>$val['id']));
		}
		$datas = $this->NewsModels->find_one(array('id'=>$id));
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			if ($_FILES['image']['name']) {
				$files = $this->request->getFile('image');
				$filename ='uploads/news/'.$datas['id'].'/'.$datas['image'].'';
				$title = $data_post['title'];
				// echo $filename;die;
				if ($datas['image'] !='') {
					if (file_exists($filename)) {
						unlink($filename);
					}
				}
				if ($files->getClientMimeType()  =="image/png" || $files->getClientMimeType()  =="image/jpg" || $files->getClientMimeType()  =="image/jpeg") {
					$fileName = $files->getName();
					$ar_name_image = explode('.',$fileName);
					$thumbImage = $title.'.'.$ar_name_image[1];
					// echo $thumbImage;die;
					$files->move('uploads/news/'.$datas['id'], $thumbImage);
					
				}
			}
			else{
				$thumbImage = $datas['image'];
			}
			$data_post = $this->request->getPost('data_post');
			$data_post['publish']?$publish = 1:$publish = 0;
			$data_post['publish'] = $publish;
			$data_post['image'] = $thumbImage;
			$data_post['updated_at'] = gmdate("Y-m-d H:i:s",time()+7*3600);	
			$result = $this->NewsModels->edit($data_post,array('id'=>$id));
			if ($result) {
				return redirect()->to(base_url(ADMIN.$this->control.'/index'))->with('success',EDIT_SUCCESS);
			}
			else{
				return redirect()->to(base_url(ADMIN.$this->control.'/index'))->with('error',EDIT_FAIL);
			}
		}
		$data = [
			'path_dir'	=> $this->path_dir,
			'branch'	=> $branch,
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
		$result = $this->NewsModels->edit($dataUpdate,array('id'=>$id));
		if ($result) {
			echo json_encode($result);
		}
	}
	public function sort()
	{
		if (!session('logged_in') == true) {return redirect()->to(base_url('cpanel/adminlogin.html'));}
		$id = $_POST['id'];
		$sort = $_POST['sort'];
		$data_update['sort'] = $sort;
		$result = $this->NewsModels->edit($data_update, array('id' => $id));
		if ($result > 0) {
			echo json_encode(array('rs' => 1));
		}
	}
	function deleteAll(){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$list_id = $this->request->getPost('list_id');
		// echo $list_id;die;
		$list_id_delete = explode(',',$list_id);
		foreach($list_id_delete as $key => $val){
			$qr = $this->NewsModels->find_one(array('id'=>$val));
			if ($qr !=null) {
				$fileName = 'uploads/news/'.$val.'/'.$qr['image'];
				echo $fileName;
				$html = 'uploads/news/'.$val.'/index.html';
				$path_dir = 'uploads/news/'.$val;
				if ($qr['avatar'] !='') {
					unlink($fileName);
					unlink($html);
					rmdir($path_dir);
				}
				
				$result =$this->NewsModels->delete_where(array('id'=>$val));
				if ($result) {
					echo json_encode("success");
				}
			}
		}
	}

}
