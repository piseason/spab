<?php

class Superadmin extends \Phalcon\Mvc\Model 
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
    public $username;

    /**
     * @var string
     *
     */
    public $password;

    
    public static function checkLogin($username,$password)
    {
        $manager = self::findFirst(array(
            "username = :str:",
            "bind" => array("str" => $username)
        ));
        if (!$manager) {
            return -1;
        }
        if ($password == $manager->password) {
            $manager->last_login = date("Y-m-d H:i:s");
            $manager->save();
            return $manager;
        } else {
            return 0;
        }
    }

    public static function checkUsername($username)
    {
        $manager = self::findFirst(array(
            "username=:username:",
            "bind" => array("username" => $username)
        ));
        return $manager;
    }



}