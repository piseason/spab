<?php

class Appointments extends \Phalcon\Mvc\Model 
{

    /**
     * @var integer
     *
     */
    public $id;

    /**
     * @var string
     *
     */
    public $department;

    /**
     * @var string
     *
     */
    public $number;

    /**
     * @var string
     *
     */
    public $appliantname;

    /**
     * @var string
     *
     */
    public $appliantid;

    public $time;

    public $incharge;

    public $applycode;

    public $state;

    public $other;

    public $telephone;

    public $signuptime;

    public static function checkreservate($day){
        $appointment=self::findFirst(array(
                "time=?1",
                "bind"=>array(1=>$day)
            ));

        if(!$appointment){
            return false;
        }else if($appointment->state==2){
            return false;
        }

        return true;
    }

    public static function checkreservate2($applycode){
        $appointment=self::findFirst(array(
                "applycode=?1",
                "bind"=>array(1=>$applycode)
            ));

        if(!$appointment){
            return false;
        }else if($appointment->state==2){
            return false;
        }

        return true;
    }

    //判断预约是否过期，过期返回true
    public function checkexpired(){
            $time=time();
            $time=strtotime("tomorrow",$time);
            $date=getdate($time);
            $target_month=intval($date['mon']);
            $target_day=intval($date['mday']);

            $time=$this->time;

            $months=explode("月", $time);
            $month=intval($months[0]);
            $flag=true;
            if($month>$target_month){
                $flag=false;
            }else if($month==$target_month){

                $day=explode("日", $months[1])[0];
                $day=intval($day);
                if($day>=$target_day){
                    $flag=false;
                }
            }
            return $flag;
    }
}