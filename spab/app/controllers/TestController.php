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
		$character=array("日","一","二","三","四","五","六");
		$strArray=array('A','B','C','D','E','F','G','H','I');
		$time=time();
		$time=strtotime("tomorrow",$time);
		$date=getdate($time);
		$inweek=strtotime("+1 week",$time);
		$inweektime=getdate($inweek);
		$objPHPExcel = new PHPExcel();
        $objActSheet = $objPHPExcel->getActiveSheet();
        $objPHPExcel->getProperties()->setTitle('北航安全体验馆未来一周安排表');
        $objPHPExcel->getProperties()->setSubject('北航安全体验馆未来一周安排表');
        /**
         * 设置单元格的值
         */
        $objActSheet->getColumnDimension('A')->setWidth(7);
        $objActSheet->getColumnDimension('B')->setWidth(10);
        $objActSheet->getColumnDimension('C')->setWidth(25);
        $objActSheet->getColumnDimension('D')->setWidth(25);
        $objActSheet->getColumnDimension('E')->setWidth(25);
        $objActSheet->getColumnDimension('F')->setWidth(25);
        $objActSheet->getColumnDimension('G')->setWidth(25);
        $objActSheet->getColumnDimension('H')->setWidth(25);
        $objActSheet->getColumnDimension('I')->setWidth(25);

        $objActSheet->getRowDimension('1')->setRowHeight(25);
        $objActSheet->getRowDimension('2')->setRowHeight(50);
        $objActSheet->getRowDimension('3')->setRowHeight(95);
        $objActSheet->getRowDimension('4')->setRowHeight(95);
        $objActSheet->getRowDimension('5')->setRowHeight(95);
        $objActSheet->getRowDimension('6')->setRowHeight(95);
        
        //设置居中
        for ($i=1; $i<7; $i++) { 
        	# code...
        	for ($j=0; $j <9 ; $j++) { 
        		# code...
                if($i>2&&$j>1){
                    $objActSheet->getStyle($strArray[$j].$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);    
                }else{
        		  $objActSheet->getStyle($strArray[$j].$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
        		}
                $objActSheet->getStyle($strArray[$j].$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        		$objActSheet->getStyle($strArray[$j].$i)->getAlignment()->setWrapText(true);
        	}
        	
        }
        //写入星期与日期
        $tem=$time;
         $index=array();
         for ($i=0; $i <7 ; $i++) { 
             $datetem=getdate($tem);
             $objActSheet->setCellValue($strArray[$i+2]."2",$datetem['mon']."月".$datetem['mday']."日\r\n星期".$character[$datetem['wday']]);
             $index[$datetem['mon']."|".$datetem['mday']]=$strArray[$i+2];
             $tem=strtotime("tomorrow",$tem);
        }

        $appointments=Appointments::Find();
        foreach ($appointments as $appointment) {
            # code...
            if($appointment->state!=1){
                continue;
            }

            $time=$appointment->time;
            $time=explode("月",$time);
            $mon=$time[0];
            $time=explode("日",$time[1]);
            $day=$time[0];
            $time=substr($time[1],6);
            $time=explode(":",$time);
            $hour=$time[0];

            switch($hour){
                case '8': $hour="3";break;
                case '10': $hour="4";break;
                case '14': $hour="5";break;
                case '16': $hour="6";break;
                default : $hour="7"; 
            }
            
            $str="部门:".$appointment->department."\r\n";
            $str.="申请人:".$appointment->appliantname."\r\n";
            $str.="联系方式:".$appointment->telephone."\r\n";
            $str.="参观人数:".$appointment->number."\r\n";
            $str.="讲解员:";

            $objActSheet->setCellValue($index[$mon."|".$day].$hour,$str);

        }

        $objActSheet->mergeCells('A1:I1');
        $objActSheet->setCellValue('A1','北航安全体验馆未来一周安排表('.$date['mon'].'月'.$date['mday'].'日'.'-'.$inweektime['mon'].'月'.($inweektime['mday']-1).'日'.')');
        $objActSheet->mergeCells('A2:B2');
        $objActSheet->mergeCells('A3:A4');
        $objActSheet->mergeCells('A5:A6');
        $objActSheet->setCellValue('A3','上午');
        $objActSheet->setCellValue('A5','下午');
        $objActSheet->setCellValue('B3',"8-10");
        $objActSheet->setCellValue('B4','10-12');
        $objActSheet->setCellValue('B5','14-16');
        $objActSheet->setCellValue('B6','16-18');
        
        
        $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
        $file_name = 'schedule.xls';
        $objWriter->save($file_name);
		 
	}

    public function testAction(){
        $this->view->setVar("info","ok");
        $deniedappointment=new Deniedappointments();
        $deniedappointment->department="123";
        $deniedappointment->number=23;
        $deniedappointment->appliantname="123";
        $deniedappointment->appliantid="123";
        $deniedappointment->incharge="123";
        $deniedappointment->time="123";
        $deniedappointment->state=23;
        $deniedappointment->applycode="123";
        $deniedappointment->other="123";
        $deniedappointment->telephone="123";
        $deniedappointment->signuptime="123";
        $deniedappointment->save();
    }
}