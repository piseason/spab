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
		$Sheets =PHPExcel_IOFactory::load("schedule.xlsx");
		 $dataArray = $Sheets->getSheet(0)->toArray();
		 print_r($dataArray);
		 
	}
}