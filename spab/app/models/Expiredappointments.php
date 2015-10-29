<?php

class Expiredappointments extends \Phalcon\Mvc\Model 
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
}
