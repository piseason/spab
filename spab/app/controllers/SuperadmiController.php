<?php
use Phalcon\Mvc\Model\Query;
class SuperadmiController extends ControllerBase{
	public function initialize(){
		$this->view->setTemplateAfter("ace");
		$this->tidyTable();
	}

	public function indexAction(){

	}

	public function loginAction(){
		$username=$this->request->getPost("username","string");
		$password=$this->request->getPost("password","string");
		$this->view->disable();
		$sa=Superadmin::checkLogin($username,$password);
		if($sa===-1){
			$this->dataReturn(array("error"=>"用户不存在"));
			return;
		}
		if($sa===0){
			$this->dataReturn(array("error"=>"密码错误"));
			return;
		}
		if($sa){
			$this->session->set("sa",$sa);
			$this->dataReturn(array("url"=>"/superadmi/manage"));
		}
		// $this->db->begin();
		// $superadmin=new Superadmin();
		// $superadmin->username=$username;
		// $superadmin->password=$password;
		// $superadmin->save();
		// $this->db->commit();
	}

	public function manageAction(){
		$sa=$this->session->get("sa");
		if(empty($sa)){
			$this->response->redirect('/');
		}
	}

	public function getarrangeAction(){
        $this->view->disable();
        $rappliant=array();
        $rdata=array();
        $rdata_str="";
        $character=array("日","一","二","三","四","五","六");
        $time=time();
        for($i=0;$i<7;$i++){
            $time=strtotime("tomorrow",$time);
            $date=getdate($time);
            //$rdata[$i]=$date['mon']."|".$date["mday"]."|".$date["wday"];
            $form_str=$date['mon']."月".$date['mday']."日"."周".$character[$date['wday']];
            $rdata[$i]=$form_str;
            for($j=0;$j<4;$j++){
                $str=$form_str.(2*$j+8+2*($j>1?1:0)).":00~".(2*$j+8+2*($j>1?1:0)+2).":00";

                $appointment=Appointments::findFirst(array(
                    'time=?1',
                    'bind'=>array(1=>$str)
                    ));
                if($appointment){
                	if($appointment->state==0){
                		$rdata_str.="0";
                		$rappliant[$i*4+$j]=$appointment->department." ".$appointment->appliantname." ".$appointment->number."人";
                    	
                	}else if($appointment->state==1){
                		$rdata_str.="3";
                		$rappliant[$i*4+$j]=$appointment->department." ".$appointment->appliantname." ".$appointment->number."人";

                	}else{

                		if($this->checkholiday($date['wday'],$str)){ //这里可以更改休息日的条件
		                    $rdata_str.="2";
		                }else{
		                    $rdata_str.="1";
		                }	//0-审核中，3-审核通过，
                	}
                	
                    
                }else if($this->checkholiday($date['wday'],$str)){ //这里可以更改休息日的条件
                    $rdata_str.="2";
                }else{
                    $rdata_str.="1";
                }
            }
        }

        $this->dataReturn(array("date"=>$rdata,'appoints'=>$rdata_str,"appliant"=>$rappliant));
    }

    public function updatestateAction(){
    	$code=$this->request->getPost('code','int');
    	$day=$this->request->getPost('day','string');
    	$this->view->disable();
    	$this->db->begin();
    	switch($code){
    		case 0:
    		case 1:
	    		if(Appointments::checkreservate($day)){
	    			$this->dataReturn(array("error"=>"修改失败,请刷新!"));
	    			return;
	    		}
	    		$times=Times::findFirst(array(
	    			'time=?1',
	    			'bind'=>array(1=>$day)
	    			));
	    		if(!$times){
					$times=new Times();
	    		}
		    	$times->time=$day;
		    	$times->oristate=($code)?'可预定':'休息日';
		    	$times->newstate=($code)?'休息日':'可预定';
		    	$times->save();
		    	break;
		    case 2: 
		   		$appointment=Appointments::findFirst(array('time=?1','bind'=>array(1=>$day)));
		    	if(!Appointments::checkreservate($day)){
		    		$this->dataReturn(array('error'=>'修改失败,请刷新'));
		    		return;
		    	}else{
		    		$appointment->state=2;
		    		$deniedappointments=Deniedappointments::addnew($appointment);
		    		$deniedappointments->save();
		    		$appointment->delete();
		    	}
		    	break;

		    case 3:
		    	$appointment=Appointments::findFirst(array('time=?1','bind'=>array(1=>$day)));
		    	if(!Appointments::checkreservate($day)){
		    		$this->dataReturn(array('error'=>'修改失败,请刷新'));
		    		return;
		    	}else{
		    		$appointment->state=1;
		    		$appointment->save();
		    	}
		    	break;
    	}
    	$this->db->commit();
    }

    public function updatereplyAction(){
    	
    	$reply=$this->request->getPost('reply','string');
    	$detail=$this->request->getPost('detail','string');
    	$day=$this->request->getPost('day','string');
    	$this->view->disable();
    	$appointment=Appointments::findFirst(array('time=?1','bind'=>array(1=>$day)));
    	if($appointment){
    		$this->db->begin();
    		$appointment->reply=$reply;
    		$appointment->detail=$detail;
    		$appointment->save();
    		$this->db->commit();
    	}else{
    		$this->dataReturn(array("error"=>"保存失败,请刷新后重试"));
    	}
    }

    public function getrecordsAction(){
    	$code=$this->request->getPost('code','string');
    	$page=$this->request->getPost('page','int');
    	$this->view->disable();

    	$database="Appointments";
    	$condition="state=0";

		if($code=="denied"){
			$database="Deniedappointments";
		}
		$c=0;
		switch ($code) {
			case "denied": 
				$database="Deniedappointments";
				$condition="state=2";
				$query2=Deniedappointments::find(array("state = ?1","bind"=>array(1=>2)));
				$c=count($query2);
				# code...
				break;
			case "granted":
				$condition="state=1";
				$query2=Appointments::find(array("state = ?1",'bind'=>array(1=>1)));
				$c=count($query2);break;
			default:
				$query2=Appointments::find(array("state = ?1",'bind'=>array(1=>0)));
				$c=count($query2);
				# code...
				break;
		}


    	
    	$query=new Query("SELECT * FROM ".$database." WHERE ".$condition." Order By id DESC LIMIT ".($page*6).",6",$this->getDI()); 
		$appointments=$query->execute();
		$rdata=array();
		foreach($appointments as $appointment){
			$tmp=array(
				"number"=>$appointment->number,
				"time"=>$appointment->time,
				"applycode"=>$appointment->applycode,
				"appliantname"=>$appointment->appliantname,
				"appliantid"=>$appointment->appliantid,
				"telephone"=>$appointment->telephone,
				"other"=>$appointment->other,
				"department"=>$appointment->department,
				"incharge"=>$appointment->incharge
				);
			$rdata[]=$tmp;
		}

		$this->dataReturn(array('records'=>$rdata,'count2'=>$c));
    }

    public function updaterecordAction(){
    	$code=$this->request->getPost("code","string");
    	$apply=$this->request->getPost("applycode",'string');
    	$this->view->disable();

    	switch($code){
    		case "deny":
    			 $appointment=Appointments::findFirst(array('applycode=?1','bind'=>array(1=>$apply)));
		    	if(!Appointments::checkreservate2($apply)){
		    		$this->dataReturn(array('error'=>'修改失败,请刷新'));
		    		return;
		    	}else{
		    		$appointment->state=2;
		    		$deniedappointment=new Deniedappointments();
	                $deniedappointment->department=$appointment->department;
	                $deniedappointment->number=$appointment->number;
	                $deniedappointment->appliantname=$appointment->appliantname;
	                $deniedappointment->appliantid=$appointment->appliantid;
	                $deniedappointment->incharge=$appointment->incharge;
	                $deniedappointment->time=$appointment->time;
	                $deniedappointment->state=$appointment->state;
	                $deniedappointment->applycode=$appointment->applycode;
	                $deniedappointment->other=$appointment->other;
	                $deniedappointment->telephone=$appointment->telephone;
	                $deniedappointment->signuptime=$appointment->signuptime;
		    		$deniedappointment->save();
		    		//$appointment->delete();
		    	}
		    	break;
		    case "allow":
			    $appointment=Appointments::findFirst(array('applycode=?1','bind'=>array(1=>$apply)));
			    	if(!Appointments::checkreservate2($apply)){
			    		$this->dataReturn(array('error'=>'修改失败,请刷新'));
			    		return;
			    	}else{
			    		$appointment->state=1;
			    		$appointment->save();
			    	}
		    	break;

		    case "del":
		    	$deniedappointment=Deniedappointments::findFirst(array('applycode=?1','bind'=>array(1=>$apply)));

		    	if($deniedappointment){
		    		$deniedappointment->delete();
		    	}else{
		    		$this->dataReturn(array('error' =>"寻找数据出错,请刷新后重试"));
		    	}
    	}
    }


	public function dataReturn($ans){
        $this->response->setHeader("Content-Type", "text/json; charset=utf-8");
        echo json_encode($ans);
        $this->view->disable();
    }

      private function tidyTable(){
        $this->db->begin();
        $appointments=Appointments::Find();
        foreach ($appointments as $appointment) {
            # code...

            if($appointment->checkexpired()){
                $expiredappointment=new Expiredappointments();
                $expiredappointment->department=$appointment->department;
                $expiredappointment->number=$appointment->number;
                $expiredappointment->appliantname=$appointment->appliantname;
                $expiredappointment->appliantid=$appointment->appliantid;
                $expiredappointment->incharge=$appointment->incharge;
                $expiredappointment->time=$appointment->time;
                $expiredappointment->state=$appointment->state;
                $expiredappointment->applycode=$appointment->applycode;
                $expiredappointment->other=$appointment->other;
                $expiredappointment->telephone=$appointment->telephone;
                $expiredappointment->signuptime=$appointment->signuptime;
                try{
                    
                    $expiredappointment->save();
                    $appointment->delete();
                }catch( Exception $e){
                    $this->db->rollback();
                    break;
                }
            }
        }
        $deniedappointments=Deniedappointments::Find();

            foreach ($deniedappointments as $appointment) {
            # code...
            if($appointment->checkexpired()){
                
                $expiredappointment=new Expiredappointments();
                $expiredappointment->department=$appointment->department;
                $expiredappointment->number=$appointment->number;
                $expiredappointment->appliantname=$appointment->appliantname;
                $expiredappointment->appliantid=$appointment->appliantid;
                $expiredappointment->incharge=$appointment->incharge;
                $expiredappointment->time=$appointment->time;
                $expiredappointment->state=$appointment->state;
                $expiredappointment->applycode=$appointment->applycode;
                $expiredappointment->other=$appointment->other;
                $expiredappointment->telephone=$appointment->telephone;
                $expiredappointment->signuptime=$appointment->signuptime; 
                try{
                    $expiredappointment->save();
                    $appointment->delete();
                }catch( Exception $e){
                    $this->db->rollback();
                    break;
                }
            }
        }
        $this->db->commit();
    }
}