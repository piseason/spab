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
		$objPHPExcel = new PHPExcel();
        $objActSheet = $objPHPExcel->getActiveSheet();
        $objPHPExcel->getProperties()->setTitle('北航安全体验馆未来一周安排表');
        $objPHPExcel->getProperties()->setSubject('北航安全体验馆未来一周安排表');
        /**
         * 设置单元格的值
         */
        $objActSheet->getColumnDimension('A')->setWidth(7);
        $objActSheet->getColumnDimension('B')->setWidth(10);
        $objActSheet->getColumnDimension('C')->setWidth(20);
        $objActSheet->getColumnDimension('D')->setWidth(20);
        $objActSheet->getColumnDimension('E')->setWidth(20);
        $objActSheet->getColumnDimension('F')->setWidth(20);
        $objActSheet->getColumnDimension('G')->setWidth(20);
        $objActSheet->getColumnDimension('H')->setWidth(20);
        $objActSheet->getColumnDimension('I')->setWidth(20);

        $objActSheet->getRowDimension('1')->setRowHeight(18);
        $objActSheet->getRowDimension('2')->setRowHeight(24);
        $objActSheet->getRowDimension('3')->setRowHeight(75);
        $objActSheet->getRowDimension('4')->setRowHeight(75);
        $objActSheet->getRowDimension('5')->setRowHeight(75);
        $objActSheet->getRowDimension('6')->setRowHeight(75);


        $objActSheet->mergeCells('A1:I1');
        $objActSheet->setCellValue('A1','北航安全体验馆未来一周安排表()');
        $objActSheet->mergeCells('A2:B2');
        $objActSheet->mergeCells('A3:A4');
        $objActSheet->mergeCells('A5:A6');
        $objActSheet->setCellValue('A3','上午');
        $objActSheet->setCellValue('A5','下午');
        $objActSheet->setCellValue('B3','8-10');
        $objActSheet->setCellValue('B4','10-12');
        $objActSheet->setCellValue('B5','14-16');
        $objActSheet->setCellValue('B6','16-18');
        //将测试人员信息导入到表中
        
        $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
        $file_name = 'examinees.xls';
        $objWriter->save($file_name);
		 
	}
}