<?php
class Member{
    private $memberArray;

    function __construct($id){
        $sql = "select * from member where id = '$id' ";
        //echo $sql;
        $res = $GLOBALS['con']->query($sql);
        $row = $res->fetch(PDO::FETCH_OBJ);
        $this->memberArray['id'] = $row->id ;
        $this->memberArray['username'] = $row->username;
        $this->memberArray['password'] = $row->password;
        $this->memberArray['name'] = $row->name;
        $this->memberArray['surname'] = $row->surname;
        $this->memberArray['tel'] = $row->tel;
        $this->memberArray['type'] = $row->type;
        $this->memberArray['email'] = $row->email;

    }

    public function __toString(){
        return "name : ".$this->memberArray["name"]." surname : ".$this->memberArray[surname];
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
       $sql = "UPDATE `member` SET 
        `username`= '{$this->memberArray['username']}',
        `password`='{$this->memberArray['password']}',
        `name`= '{$this->memberArray['name']}',
        `surname`='{$this->memberArray['surname']}',
        `tel`= '{$this->memberArray['tel']}',
        `email`='{$this->memberArray['email']}',
        `type`= '{$this->memberArray['type']}' 
        WHERE `id` = '{$this->memberArray['id']}' ";
        echo $sql;
    $GLOBALS['con']->exec($sql);
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
            '$username',
            '$password',
            '$name',
            '$surname',
            '$tel',
            '$email',
            '$type'
        )";
        echo $sql;
         $GLOBALS['con']->exec($sql);
    }

}
?>
