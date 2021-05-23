<?php

namespace App\Controllers\Admins;
use App\Controllers\BaseController;
use App\Models\LogoModels;
class Logo extends BaseController
{	
	var $control = 'logo';
	var $title = "Logo";
	function __construct(){
		$this->LogoModels = new LogoModels();
	}
	public function index()
	{	
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$datas = $this->LogoModels->find_one(array('type'=>'logo'));	
		if ($this->request->getPost()) {
			
			$files = $this->request->getFile('avatar');
			$filename ='uploads/logo/'.$datas['image'].'';
			if ($_FILES['avatar']['name']) {
				if ($datas['image'] != '') {
					if (file_exists($filename)) {
						unlink($filename);
					}
				}
				if ($files->getClientMimeType()  =="image/png" || $files->getClientMimeType()  =="image/jpg" || $files->getClientMimeType()  =="image/jpeg") {
					$fileName = $files->getName();
					$ar_name_image = explode('.',$fileName);
					$thumbImage = 'logo.'.$ar_name_image[1];
					$files->move('uploads/logo/', $thumbImage);
					$arr = array(
						'name'	=> $this->request->getPost('name'),
						'image'	=> $thumbImage,
						'title'	=> $this->request->getPost('title'),
						'created_at'	=> gmdate('Y-m-d H:i:s',time()+7*3600)
					);
					}
				}
				else{
					$arr = array(
						'name'	=> $this->request->getPost('name'),
						'title'	=> $this->request->getPost('title'),
						'image'	=> $datas['image'],
						'created_at'	=> gmdate('Y-m-d H:i:s',time()+7*3600)
					);
				}
				$result = $this->LogoModels->edit($arr,array('type'=>'logo'));
				if ($result) {
					return redirect()->to('index')->with('success',ADD_SUCCESS);
				}
			}
		$data = [
			'datas'	=> $datas,
			'title'	=>'Quản lý '.$this->title,
		];
		return view('admin/layout/'.$this->control.'/index',$data?$data:NULL);
	}
	function edit(){
		
	}

}
