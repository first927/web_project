<?php

class ProjectList{
    private $project ;

    function __construct(){
        $pArray = DB_getAllProject();
        echo $pArray[0];
        echo $pArray[1];
       $this->project =$pArray;

    }

    public function getAllProject(){
        return $this->project;
    }

    public function getProject($index){
        return $this->project[$index];
    }
    public function getCount(){
        return count($project);
    }

}

?>