<?php

namespace App\Controllers;
use App\Models\NewsModels;
use App\Controllers\BaseController;
use App\Models\BranchModels;
use App\Models\LogoModels;
class Home extends BaseController
{
	var $title = "Trang chính";
	function __construct(){
		$this->NewsModels = new NewsModels();
		$this->LogoModels = new LogoModels();
		$this->BranchModels = new BranchModels();
	}
	public function index()
	{
		$logo = $this->LogoModels->find_one();
		$menu = $this->BranchModels->select_array('*',array('parentid'=>0),'sort asc,id desc');
		foreach($menu as $key => $val){
			$menu[$key]['child'] = $this->BranchModels->select_array('*',array('parentid'=>$val['id']),'id desc');
		}
		
		$datas = $this->NewsModels->select_array('*',array('publish'=>1),'sort asc ,id desc');
		$data = array(
			'logo'	=> $logo,
			'menu'	=> $menu,
			'datas' => $datas,
			'title'=>$this->title
		);
		return view('users/layout/dashboard/index',$data?$data:NULL);
	}
	public function detail($id){
		$logo = $this->LogoModels->find_one();
		$menu = $this->BranchModels->select_array('*',array('parentid'=>0),'sort asc,id desc');
		foreach($menu as $key => $val){
			$menu[$key]['child'] = $this->BranchModels->select_array('*',array('parentid'=>$val['id']),'id desc');
		}
		$NotIn = [];
		$NotIn = array($id);
		$news =  $this->NewsModels->where_not_in($NotIn);
		$datas =  $this->NewsModels->find_one_row('*',array('id'=>$id));
		$data = array(
			'logo'	=> $logo,
			'news'	=> $news,
			'datas' => $datas,
			'menu'	=> $menu,
		);
		return view('users/layout/dashboard/detail',$data?$data:NULL);
	}
}
