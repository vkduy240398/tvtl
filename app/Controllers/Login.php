<?php

namespace App\Controllers;
use App\Models\RoleModels;
use App\Models\User_thirdModels;
use App\Controllers\BaseController;

class Login extends BaseController
{
	function __construct(){
		$this->RoleModels = new RoleModels();
		$this->User_thirdModels = new User_thirdModels();
	}
	public function index()
	{
		if (session('loggeduser_in') == true) {return redirect()->to(base_url('/'));}
		if ($this->request->getPost()) {
			$session = session();
			$username = $this->request->getPost('username');
			$password_input = $this->request->getPost('password');
			$data = $this->User_thirdModels->find_one(array('username'=>$username));
			if ($data) {
				$password = $data['password'];
				if (password_verify($password_input,$password)) {
					$sess_data = array(
						'id' =>	$data['id'],
						'username' =>	$data['username'],
						'loggeduser_in' =>	true,
					);
					$session->set($sess_data);
					return redirect()->to('/');
				}
				else{
					return redirect()->to('login.html')->with('error',"Tài khoản hoặc mật khẩu sai");
				}
			}
			else{
				return redirect()->to('login.html')->with('error',"Tài khoản không tồn tại");
			}
		}
		return view('users/layout/login');
	}
	public function register(){
		if (session('loggeduser_in') == true) {return redirect()->to(base_url('/'));}
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			$imagename = $data_post['username'];
			$files = $this->request->getFile('avatar');
			if ($files) {
				if ($files->getClientMimeType()  =="image/png" || $files->getClientMimeType()  =="image/jpg" || $files->getClientMimeType()  =="image/jpeg") {
					$fileName = $files->getName();
					$ar_name_image = explode('.',$fileName);
					$thumbImage = $imagename.'.'.$ar_name_image[1];
					$data_post['avatar'] = $thumbImage;
					$data_post['password'] = password_hash($data_post['password'],PASSWORD_DEFAULT);
					$data_post['created_at'] =gmdate('Y-m-d H:i:s',time()+7*3600);
					$result =$this->User_thirdModels->add($data_post);
					if ($result['type']="success") {
						$files->move('uploads/users_third/'.$result['insertID'], $thumbImage);
						return redirect()->to('register.html')->with('success',"Đăng ký thành công");
					}
				}
				else{
					return redirect()->to('register.html')->with('error',"Ảnh không đúng định dạng");
				}
			}
			else{
				return redirect()->to('register.html')->with('error',"Chưa có ảnh");
			}
			
		}
		$data = array(
			'role' => $this->RoleModels->select_array(),
		);
		return view('users/layout/register',isset($data)?$data:NULL);
	}
	function logout(){
		$session = session();
        $session->destroy();
        return redirect()->to('/login.html');
	}
	function check_user(){
		$username = $this->request->getPost('username');
		$us = trim($username);
		$result = $this->User_thirdModels->find_one(array('username'=>$username));
		if ($result > 1) {
			echo  1;
		}
		else{
			
		}
	}
}
