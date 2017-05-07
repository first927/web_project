<?php 

class Category{
    private $id;
    private $name;
    function  __construct($id){
        $sql = "select * from category where id = '$id' ";
        //echo $sql;
        $res = $GLOBALS['con']->query($sql);
        $row = $res->fetch(PDO::FETCH_OBJ);
        $this->id = $row->id;
        $this->name = $row->name;
    }

    public function getName(){
        return $this->name;
    }
    public function getId(){
        return $this->id;
    }
    public function getType(){
        return "category";
    }

    public static function addNewCat($name){
        $sql = "INSERT INTO `category`(`name`) VALUES ($name)";
        echo $sql;
        $GLOBAL['con']->exec($sql);
    }
}
?>