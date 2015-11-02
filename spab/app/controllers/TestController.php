<?php

include '../app/classes/PHPExcel.php';            
include '../app/classes/PHPExcel/IOFactory.php';
class TestController extends ControllerBase{

	public function initialize()
	{
        //$this->view->setTemplateAfter('ace');
		//parent::initialize();
		//Phalcon\Tag::setTitle('主页');
		//$this->view->setTemplateAfter('base');
	}
	public function indexAction(){

		$Sheets =PHPExcel_IOFactory::load("schedule.xls");
		$dataArray=$Sheets->getSheets(0)->toArray(); 
		$this->view->setVar("info",$dataArray[1][1]); 
	}
}