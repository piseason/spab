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
	if($date==0||$date==6){
		return true;
	}
}
}