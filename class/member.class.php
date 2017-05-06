<?php
class member{

    private $id;
    private $username;
    private $password;
    private $name;
    private $surname;
    private $tel;
    private $email;
    private $type;

    function __construct($id , $username ,$password , $name, $surname , $tel , $email , $type){
        $this->id = $id ;
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->tel = $tel;
        $this->type = $type;

    }
    public function __toString(){
        return "name : ".$this->name." surname : ".$this->surname;
    }

    public function getname(){
        return $name;
    }

}
?>
