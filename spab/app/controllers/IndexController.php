<?php

class IndexController extends ControllerBase
{
    
	public function initialize()
	{
        $this->view->setTemplateAfter('ace');

        $info=$this->tidyTable();
        $this->view->setVar("info",$info);
		//parent::initialize();
		//Phalcon\Tag::setTitle('主页');
		//$this->view->setTemplateAfter('base');
	}

	public function indexAction() {
		$this->view->setVar('test','ddddd');
	}

    public function logoutAction(){
        $this->view->disable();
        $this->session->remove("sa");
    }

    public function applyAction(){
        $localurl="localhost";
        $auth=$this->session->get("auth");
        if(!$auth){
            $this->response->redirect("http://".$localurl.":5001");
        }

        $flag=$this->checkreserved($auth['uid']);
        
            if(!$flag){
                $this->response->redirect("http://".$localurl.":5000/index/error");
            }
        $this->view->setVar("uid",$auth['uid']);
        $this->view->setVar("applyname",$auth['displayName']);
    }

    public function errorAction(){

    }

    public function postdataAction(){
        $auth=$this->session->get("auth");
        if(!$auth){
            $this->dataReturn(array('error'=>true));
            return;
        }

        $flag=$this->checkreserved($auth['uid']);
        if(!$flag){
            $this->dataReturn(array('error'=>true));
            return;
        }

        date_default_timezone_set('Asia/Shanghai'); 
        $this->view->disable();
        $department=$this->request->getPost("department","string");
        $number=$this->request->getPost("number","string");
        $appliantname=$this->request->getPost("appliantname","string");
        $appliantid=$this->request->getPost("appliantid","string");
        $incharge=$this->request->getPost("incharge","string");
        $time=$this->request->getPost("time","string");
        $other=$this->request->getPost("other","string");
        $telephone=$this->request->getPost("telephone","string");

        $this->db->begin();
        $appointment=new Appointments();
        $appointment->department=$department;
        $appointment->number=$number;
        $appointment->appliantname=$appliantname;
        $appointment->appliantid=$appliantid;
        $appointment->incharge=$incharge;
        $appointment->time=$time;
        $appointment->state=0;
        $applycode=$appliantid.rand(0,9).rand(0,9).rand(0,9).rand(0,9);
        $appointment->applycode=$applycode;
        $appointment->other=$other;
        $appointment->telephone=$telephone;
        $appointment->signuptime=date("l dS \of F Y T G:i:s A"); 
        try{
            $appointment->save();
            $this->db->commit();
            $this->dataReturn(array("applycode"=>$applycode));
        }catch( Exception $e){
            $this->dataReturn(array("error"=>true));
        }

    }

    public function checkreserved($uid){
        $appointments=Appointments::find(array(
                "appliantid=?1",
                "bind"=>array(1=>$uid)
            ));

        
        $flag=true;
        foreach ($appointments as $appointment) {
            # code...
            //如果存在一条未过期的预约，那么认为该用户是有预约的
            if(!$appointment->checkexpired()) $flag=false;
        }
            return $flag;
}

    public function gettimeAction(){
        $this->view->disable();
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
                if(Appointments::checkreservate($str)){
                    $rdata_str.="0";
                }else if($this->checkholiday($date['wday'],$str)){ //这里可以更改休息日的条件
                    $rdata_str.="2";
                }else{
                    $rdata_str.="1";
                }
            }
        }

        $this->dataReturn(array("date"=>$rdata,'appoints'=>$rdata_str));
    }

    public function dataReturn($ans){
        $this->response->setHeader("Content-Type", "text/json; charset=utf-8");
        echo json_encode($ans);
        $this->view->disable();
    }

	public function jqgridAction()
	{
		$this->view->setTemplateAfter('ace');
	}

	public function listAction()
	{
        $builder = $this->modelsManager->createBuilder()
                                       ->from('User');
        $sidx = $this->request->getQuery('sidx','string');
        $sord = $this->request->getQuery('sord','string');
        if ($sidx != null)
            $sort = $sidx;
        else
            $sort = 'id';
        if ($sord != null)
            $sort = $sort.' '.$sord;
        $builder = $builder->orderBy($sort);
        $this->datareturnforuser($builder);
	}

	public function updateAction()
	{
		$oper = $this->request->getPost('oper', 'string');
        if ($oper == 'edit') {
            $id = $this->request->getPost('id', 'int');
            $manager = User::findFirst($id);
            $manager->username = $this->request->getPost('username', 'string');
            $manager->password = $this->request->getPost('password', 'string');
            $manager->name = $this->request->getPost('name', 'string');
            $manager->email = $this->request->getPost('email', 'email');
            if (!$manager->save()) {
                foreach ($manager->getMessages() as $message) {
                    echo $message;
                }
            }
        }
        if ($oper == 'del') {
            $id = $this->request->getPost('id', 'int');
            $manager = Manager::findFirst($id);
            if (!$manager->delete()) {
                foreach ($manager->getMessages() as $message) {
                    echo $message;
                }
            }
        }
	}

	public function datareturnforuser($builder)
    {
        $this->response->setHeader("Content-Type", "application/json; charset=utf-8");
        $limit = $this->request->getQuery('rows', 'int');
        $page = $this->request->getQuery('page', 'int');
        if (is_null($limit)) $limit = 10;
        if (is_null($page)) $page = 1;
        $paginator = new Phalcon\Paginator\Adapter\QueryBuilder(array("builder" => $builder,
                                                                      "limit" => $limit,
                                                                      "page" => $page));
        $page = $paginator->getPaginate();
        //print_r($page->items);
        $ans = array();
        $ans['total'] = $page->total_pages;
        $ans['page'] = $page->current;
        $ans['records'] = $page->total_items;
        foreach ($page->items as $key => $item)
        {
            $item->password = '***';
            $ans['rows'][$key] = $item;
        }
        echo json_encode($ans);
        $this->view->disable();
    }


    public function ExceljsonAction(){
    	$name=$this->readExcel('name.xlsx',0);
    	$name=$this->turnname($name);

    	$data=$this->readExcel('index-factor-title.xlsx',2);
    	$test="1+2-3/2";
    	$ttt=strtok($test, '+');

    	$this->view->setVar("a",$ttt[1]);

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
            if($deniedappointments->checkexpired()){
                
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

	function turnname($name){
		$temp=array();
		for ($i=1;$i < sizeof($name)+1; $i++) { 
			$temp[$name[$i][1]]=$name[$i][2];
		}
		return $temp;
	}

    function readExcel($path,$which){
        //引入PHPExcel类库
    
     $Sheets =PHPExcel_IOFactory::load($path);  
    
    //开始读取上传到服务器中的Excel文件，返回一个二维数组
    $dataArray = $Sheets->getSheet($which)->toArray();
    return $dataArray;
	}
}

