<?php

class Deniedappointments extends \Phalcon\Mvc\Model 
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

    public static function addnew($appointment){
        $deniedappointment=new Deniedappointments();
        $deniedappointment->department=$appointment->department;
        $deniedappointment->number=$appointment->number;
        $deniedappointment->appliantname=$appointment->appliantname;
        $deniedappointment->appliantid=$appointment->appliantid;
        $deniedappointment->incharge=$appointment->incharge;
        $deniedappointment->time=$appointment->time;
        $deniedappointment->state=2;
        $deniedappointment->applycode=$appointment->applycode;
        $deniedappointment->other=$appointment->other;
        $deniedappointment->telephone=$appointment->telephone;
        $deniedappointment->signuptime=date("l dS \of F Y T G:i:s A");

        return $deniedappointment;
    }

}