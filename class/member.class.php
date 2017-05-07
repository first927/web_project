<?php
class Member{
    private $memberArray;
    // private $id;
    // private $username;
    // private $password;
    // private $name;
    // private $surname;
    // private $tel;
    // private $email;
    // private $type;

    // function __construct($id , $username ,$password , $name, $surname , $tel , $email , $type){
    //     $this->id = $id ;
    //     $this->username = $username;
    //     $this->password = $password;
    //     $this->name = $name;
    //     $this->surname = $surname;
    //     $this->tel = $tel;
    //     $this->type = $type;

    // }

    function __construct($id){
        $sql = "select * from member where id = '$id' ";
        //echo $sql;
        $res = $GLOBALS['con']->query($sql);
        $row = $res->fetch(PDO::FETCH_OBJ);
        $this->memberArray[id] = $row->id ;
        $this->memberArray[username] = $row->username;
        $this->memberArray[password] = $row->password;
        $this->memberArray[name] = $row->name;
        $this->memberArray[surname] = $row->surname;
        $this->memberArray[tel] = $row->tel;
        $this->memberArray[type] = $row->type;

    }

    public function __toString(){
        return "name : ".$this->name." surname : ".$this->surname;
    }
    public function getType(){
        return "member";
    }
    public function getElement($index){
        return $this->memberArray[$index];
    }

    public function setElement($index,$value){
        $this->memberArray[$index] = $value;
    }

   public  function update(){
    $GLOBAL['con']->exec("UPDATE `member` SET 
        `username`= {$this->username},
        `password`={$this->password},
        `name`= {$this->name},
        `surname`={$this->surname},
        `tel`= {$this->tel},
        `email`={$this->email},
        `type`= {$this->type} 
        WHERE id = {$this->id} ");
    }
    public function save(){
        $GLOBAL['con']->exec("INSERT INTO `member`
        (`username`, `password`, `name`, `surname`, `tel`, `email`, `type`) 
        VALUES 
        (
            {$this->username},
            {$this->password},
            {$this->name},
            {$this->surname},
            {$this->tel},
            {$this->email},
            {$this->type}
        )"
        );
    }
    public function getUpdateSql(){
        return  "UPDATE `member` SET 
        `username`= {$this->username},
        `password`={$this->password},
        `name`= {$this->name},
        `surname`={$this->surname},
        `tel`= {$this->tel},
        `email`={$this->email},
        `type`= {$this->type} 
        WHERE id = {$this->id} ";
    }
    public function getInsertSql(){
        return "INSERT INTO `member`
        (`username`, `password`, `name`, `surname`, `tel`, `email`, `type`) 
        VALUES 
        (
            {$this->username},
            {$this->password},
            {$this->name},
            {$this->surname},
            {$this->tel},
            {$this->email},
            {$this->type}
        )" ;
    }
    public static function addNewMember(
        $username,
        $password,
        $name,
        $surname,
        $tel,
        $email,
        $type
    ){
      $sql = "INSERT INTO `member`
      (`username`, `password`, `name`, `surname`, `tel`, `email`, `type`) 
        VALUES 
        (
            $username,
            $password,
            $name,
            $surname,
            $tel,
            $email,
            $type
        )";
        echo $sql;
         $GLOBAL['con']->exec($sql);
    }

}
?>
