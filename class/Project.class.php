<?php
class Project{
    private $id;
    private $category;
    private $title;
    private $detail;
    private $editDate;
    private $publish;

    function __construct($id , $catID , $title, $detail , $editDate , $publish){
        $this->id = $id;
        $this->category = new Category($id);
        $this->title = $title;
        $this->detail = $detail;
        $this->editDate = $editDate;
        $this->publish = $publish;
    }

    function __toString(){
        return "Project : ".$this->title;
    }
}

?>