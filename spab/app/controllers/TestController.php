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
		$objPHPExcel=new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getProperties()->setTitle("安全体验馆日程安排");
		$objPHPExcel->getProperties()->setSubject("安全体验馆日程安排");
		$sheet=$objPHPExcel->getActiveSheet();
		$sheet->setCellValue("A1","aaa");
		$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
        $file_name = '/aaa.xls';
        $objWriter->save($file_name);
		 
	}
}