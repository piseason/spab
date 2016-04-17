<?php

class ControllerBase extends \Phalcon\Mvc\Controller
{
	public function initialize() {
		Phalcon\Tag::prependTitle('PhalconDemo | ');
		$this->response->setHeader("Content-Type", "text/html; charset=utf-8");
	}

	public function checkholiday($date,$order,$str){
	$times=Times::findFirst(array(
			"time=?1",
			"bind"=>array(1=>$str)
		));
	if($times){
		//return ($times->newstate=='休息日');
		return 0;
	}

	//休息日条件，返回值为0，前端呈现为内部培训
	if($date==6||$date==0){
		return 0;
	}
	//行前教育条件，返回值为1，前端呈现为行前教育
	if($date==4&&$order>1){
		return 1;
	}
}
}