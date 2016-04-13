<?php

class OpeninventorController extends ControllerBase{
	public function kopikoAction(){
		$this->view->setVar("username","");
		$this->view->setVar("oldpwd","");
		$this->view->setVar("newpwd","");
		$this->view->setVar("inputag","");
	}

	public function kopiko2Action(){
		
	}
}