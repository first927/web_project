<?php

class FileList{
    private $filelist;

    function __construct(){
        $res = $GLOBALS['con']->query("select * from file");
        for ($i=0; $i < $res->rowCount() ; $i++) { 
            $row = $res->fetch(PDO::FETCH_OBJ);
            $this->filelist[$i] = new File($row->id);
        }
    }

    public function getByMember($memberId){
        $result;
        for ($i=0; $i < count($file); $i++) {
            if($file[$i]->getOwnerId() == $memberId){
                $result[$i] = $this->filelist[$i];
            }
        }
        return $result ;
    }
    public function getAllFile(){

        return $this->filelist;
    }

}
?>