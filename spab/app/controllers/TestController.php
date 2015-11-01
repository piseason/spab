<?php

use Phalcon\Mvc\Model\Query;
class TestController extends ControllerBase{

	public function initialize()
	{
        //$this->view->setTemplateAfter('ace');
		//parent::initialize();
		//Phalcon\Tag::setTitle('主页');
		//$this->view->setTemplateAfter('base');
	}
	public function indexAction(){

		$this->view->disable();
		$query=new Query("SELECT * FROM Appointments LIMIT 0,10",$this->getDI()); 
		$appointments=$query->execute(array('top'=>10));
		echo $appointments[0]->time;
	}
}