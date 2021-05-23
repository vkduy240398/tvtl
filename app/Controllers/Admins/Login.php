<?php

namespace App\Controllers\Admins;
use App\Models\UsersModel;
use App\Controllers\BaseController;

class Login extends BaseController
{
	public function index()
	{	
		if (session('logged_in') == true) {return redirect()->to(base_url(ADMIN.'dashboard'));}
		$UsersModel = new UsersModel();
		if ($this->request->getPost()) {
			$session = session();
			$username = $this->request->getPost('username');
			$password_input = $this->request->getPost('password');
			$data = $UsersModel->find_one(array('username'=>$username));
			if ($data) {
				$password = $data['password'];
				if (password_verify($password_input,$password)) {
					$ses_data = [
						'id'     	 	 => $data['id'],
						'username'    	 => $data['username'],
						'logged_in'      => TRUE
					];
					$session->set($ses_data);
					return redirect()->to(ADMIN.'dashboard/index');
				}
				else{
					return redirect()->to('/login.html')->with('error','Mật khẩu hoặc tài khoản chưa chính xác');
				}
			}
			else{
				return redirect()->to('/adminlogin.html')->with('error','Tài khoản không tồn tại');
			}

		}
		return view('admin/layout/login');
	}
	function logout(){
		$session = session();
        $session->destroy();
        return redirect()->to('/adminlogin.html');
	}
}
