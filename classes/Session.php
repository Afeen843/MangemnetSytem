<?php
include_once('DB.class.php');
include_once ('./config.in.php');

/**
 * Class session
 */
class Session
{
    var $db;
    var $username;
    var $password;
    var $valid;

    /**
     * constuctor
     */
    function __construct(
    )
    {
        $this->db=new DB;
    }

    function auth()
    {
        $rows = $this->db->select('users');
        foreach ($rows as $row) {
            if ($row['username'] == $this->username){
                if ($row['password'] == $this->password) {
                    $this->valid = true;
                    self::addSession();
                } else {
                    $this->valid = false;
                }
            }else{
                $this->valid=false;
            }
            return $this->valid;
        }
    }

    /**
     * Getter username
     * @return mixed
     */

    public function getUserName()
    {
        return $this->username;
    }

    /**
     * Getter password
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $username
     * @return void
     */
    public function setUserName($username)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function addSession(){

        $_SESSION['username']=$this->username;
        $_SESSION['password']=$this->password;
        $_SESSION['login']=true;

    }
}