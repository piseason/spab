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
		 $dataArray = $Sheets->getActiveSheet()->setCellValue('A1', 'qqq');
		 $eee=$Sheets->getSheets(0)->toArray();
		 echo $eee[1][1];
		 
	}
}