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
        $objPHPExcel->getProperties()->setTitle('测试人员excel');
        $objPHPExcel->getProperties()->setSubject('测试人员excel');
        /**
         * 设置单元格的值
         */
        $objActSheet->setCellValue('A1','用户名');
        $objActSheet->setCellValue('B1','密码');
        $objActSheet->setCellValue('C1','姓名');
        $objActSheet->setCellValue('D1','性别');
        $objActSheet->setCellValue('E1','籍贯');
        $objActSheet->setCellValue('F1','学历');
        $objActSheet->setCellValue('G1','学位');
        $objActSheet->setCellValue('H1','出生日期');
        $objActSheet->setCellValue('I1','政治面貌');
        $objActSheet->setCellValue('J1','职称');
        $objActSheet->setCellValue('K1','班子/系统');
        $objActSheet->setCellValue('L1','工作单位');
        $objActSheet->setCellValue('M1','部门');
        $objActSheet->setCellValue('N1','职务');
        $objActSheet->setCellValue('O1','教育经历');
        $objActSheet->setCellValue('P1','工作经历');
        //将测试人员信息导入到表中
        
        $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
        $file_name = 'examinees.xls';
        $objWriter->save($file_name);
		 
	}
}