<?php

class CheckoutController extends ControllerBase{
	public function initialize()
	{
        $this->view->setTemplateAfter('ace');
		//parent::initialize();
		//Phalcon\Tag::setTitle('主页');
		//$this->view->setTemplateAfter('base');
	}

	public function indexAction(){

	}
	public function accessAction(){

		$appointment=$this->session->get("appointment");
		$state="";

		if(!$appointment){
			
			$this->view->setVar("state",'信息验证异常!');
			$this->view->setVar("appliantname",'');
			$this->view->setVar("appliantid",'');
			$this->view->setVar("incharge",'');
			$this->view->setVar("department",'');
			$this->view->setVar("signuptime",'');
			$this->view->setVar("reply",'');
			$this->view->setVar("time",'');
			$this->view->setVar("number",'');
			$this->view->setVar("detail",'');
			$this->view->setVar("applycode",'');return;
		}
		switch($appointment->state){
			case '0': $state="审核中......";break;
			case '1': $state="审核通过!";break;
			case '2': $state="审核未通过!";break;
			default: $state="审核中......";break;
		}
		$this->view->setVar("state",$state);
		$this->view->setVar("appliantname",$appointment->appliantname);
		$this->view->setVar("appliantid",$appointment->appliantid);
		$this->view->setVar("incharge",$appointment->incharge);
		$this->view->setVar("department",$appointment->department);
		$this->view->setVar("signuptime",$appointment->signuptime);
		$this->view->setVar("reply",$appointment->reply);
		$this->view->setVar("time",$appointment->time);
		$this->view->setVar("number",$appointment->number);
		$this->view->setVar("detail",$appointment->detail);
		$this->view->setVar("applycode",$appointment->applycode);

		//$this->session->set('appointment',false);
	}

	public function inqueryAction(){
		$this->view->disable();
		$applycode=$this->request->getPost("applycode","string");

		$appointment=Appointments::findFirst(array(
			"appliantid=?1 order by id desc",
			"bind"=>array(1=>$applycode)
			));
		if($appointment){
			$this->session->set("appointment",$appointment);
			$this->dataReturn(array("url"=>"/checkout/access"));
		}else{
			$appointment=Deniedappointments::findFirst(array(
				"applycode=?1",
				"bind"=>array(1=>$applycode)
			));
			if($appointment){
				$this->session->set("appointment",$appointment);
				$this->dataReturn(array("url"=>"/checkout/access"));
			}else{$this->dataReturn(array("error"=>"您输入的申请码无效,请重新输入或联系管理员(8231 7766)"));}
			
		}
	}

	public function dataReturn($ans){
        $this->response->setHeader("Content-Type", "text/json; charset=utf-8");
        echo json_encode($ans);
        $this->view->disable();
    }

}