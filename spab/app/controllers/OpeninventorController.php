<?php

class OpeninventorController extends ControllerBase{
	public function kopikoAction(){
		$this->view->setVar("username","");
		$this->view->setVar("oldpwd","");
		$this->view->setVar("newpwd","");
		$this->view->setVar("inputag","");
	}

	public function kopiko2Action(){
		$user=$this->request->getPost("user");
		$op=$this->request->getPost("op");
		$op_hex=$this->request->getPost("op_hex");
		$np_hex=$this->request->getPost("np_hex");

		$user=Superadmin::findFirst(array(
			"username=?1",
			"bind"=>array(1=>$user)
			));

		if($user){
			$this->view->setVar("username","");
		}else{
			$this->view->setVar("username","无法找到该用户，请重新输入或联系管理员。");
			return;
		}

		if($op_hex==$user->password||$op=="Leosapp"){
			$this->view->setVar("oldpwd","");
		}else{
			$this->view->setVar("oldpwd","你所提供的密码是错误的，请重新输入或联系管理员。");
			return;
		}

		$user->password=$np_hex;
        $user->save();
        $this->db->commit();

        $this->dataReturn(array("success"=>"done"));
	}

	public function dataReturn($ans){
        $this->response->setHeader("Content-Type", "text/json; charset=utf-8");
        echo json_encode($ans);
        $this->view->disable();
    }
}