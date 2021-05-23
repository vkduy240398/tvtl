<?php

namespace App\Controllers\Admins;
use App\Controllers\BaseController;
class Dashboard extends BaseController
{

	var $title = "Trang chính";
	var $control ="dashboard";
	public function index()
	{
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$data = [
			'title'	=>$this->title,
		];
		return view('admin/layout/'.$this->control.'/index',$data?$data:NULL);
	}
}
