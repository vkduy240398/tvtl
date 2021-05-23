<?php

namespace App\Controllers;
use App\Models\NewsModels;
use App\Models\BranchModels;
use App\Models\LogoModels;
use App\Controllers\BaseController;

class News extends BaseController
{
	function __construct(){
		$this->NewsModels = new NewsModels();
		$this->BranchModels = new BranchModels();
		$this->LogoModels = new LogoModels();
	}
	public function index($id)
	{
		$datas = $this->NewsModels->select_array('*',array('publish'=>1,'id_branch'=>$id),'sort asc ,id desc');
		$menu = $this->BranchModels->select_array('*',array('parentid'=>0),'sort asc,id desc');
		foreach($menu as $key => $val){
			$menu[$key]['child'] = $this->BranchModels->select_array('*',array('parentid'=>$val['id']),'id desc');
		}
		$logo = $this->LogoModels->find_one();
		$data = array(
			'menu'	=> $menu,
			'datas' => $datas,
		);
		return view('users/layout/news/index',$data?$data:NULL);
	}
}
