<?php

class ControllerBase extends \Phalcon\Mvc\Controller
{
	public function initialize() {
		Phalcon\Tag::prependTitle('PhalconDemo | ');
		$this->response->setHeader("Content-Type", "text/html; charset=utf-8");
	}

	public function checkholiday($date,$str){
	$times=Times::findFirst(array(
			"time=?1",
			"bind"=>array(1=>$str)
		));
	if($times){
		return ($times->newstate=='休息日');
	}
	if($date==6||$date==0){
		return true;
	}

	$str_trim=split("周", $str);
	$str_trim=split(":", $str_trim[1]);
	$str_trim=substr($str_trim[0], 1);
	echo $str_trim;
	if($date==4&&($str_trim=="14"||$str_trim=="16")){
		return true;
	}

}
}