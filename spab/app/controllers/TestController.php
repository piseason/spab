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
		$this->view->disable();
		$Sheets =PHPExcel_IOFactory::load("schedule.xlsx");
		 $dataArray = $Sheets->getSheet(0)->toArray();
		 $dataArray[2][1]="333";
		 print_r($dataArray);
		 
	}
}