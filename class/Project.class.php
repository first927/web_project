<?php
class Project{
    private $id;
    private $category;
    private $title;
    private $detail;
    private $editDate;
    private $publish;

    function __construct($id){
        $res = $GLOBAL['con']->query("select *  from project where id = '$id' ");
        $row = $res->fetch(PDO::FETCH_OBJ);
        $this->category = $row->category;
        $this->title = $row->title;
        $this->detail = $row->detail;
        $this->editDate = $row->editDate;
        $this->publish = $row->publish;
        $this->id = $row->id;

    }

    // function __construct($id , $catID , $title, $detail , $editDate , $publish){
    //     $this->id = $id;
    //     $this->category = new Category($id);
    //     $this->title = $title;
    //     $this->detail = $detail;
    //     $this->editDate = $editDate;
    //     $this->publish = $publish;
    // }

    function __toString(){
        return "Project : ".$this->title;
    }

    public function getDeatail(){
        return $this->detail;
    }
}

?>