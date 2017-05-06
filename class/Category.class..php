<?php 

class Cetegoty{
    private $id;
    private $name;
    function  __construct($name , $id){
        $this->id = $id;
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
    public function getId(){
        return $this->id;
    }
}
?>