<?php
namespace App\Models;


use App\Models\MyModel;
class CI_encrypts extends MyModel {


	function genRndDgt($length = 8, $specialCharacters = true) {
		$digits = '';
		$chars = "abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789";
		if($specialCharacters === true)
			$chars .= "!?=/&+,.";
			for($i = 0; $i < $length; $i++) {
			$x = mt_rand(0, strlen($chars) -1);
			$digits .= $chars{$x};
		}
		return $digits;
	}
	function genRndSalt() {
		return $this->genRndDgt(8, true);
	}
	function encryptUserPwd($pwd, $salt) {
		return sha1(md5($pwd) . $salt);
	}
}
