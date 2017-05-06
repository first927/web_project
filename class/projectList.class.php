<?php

class ProjectList{
    private $project;

    function __construct(){
        $res = $GLOBAL['con']->query("select *  from project");
        $i = 0;
        
        for ($i=0; $i < $res->rowCount() ; $i++) { 
            $row = $res->fetch(PDO::FETCH_OBJ);
            $project[$i] = new project($i+1);
            # code...
        }
    }

    public function getAllProject(){
        return $project;
    }

}

?>