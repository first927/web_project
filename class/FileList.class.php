<?php

class FileList{
    private $file;

    function __construct(){
        $res = $GLOBAL['con']->query("select * from file");

        $i = 0;
        
        for ($i=0; $i < $res->rowCount() ; $i++) { 
            $row = $res->fetch(PDO::FETCH_OBJ);
            $file[$i] = new File($i+1);
            # code...
        }
    }

    public function getByMember($memberId){
        $result;
        $i = 0;
        for ($i=0; $i < count($file); $i++) {
            if($file[$i]->getOwnerId() == $memberId){
                $result[$i] = file[$i];
            }
            
            # code...
        }
        return $result ;
    }

}
?>