<?php

class File{
    private $fileDataArray;

    function __construct($id)
        {
            $sql = "select * from file where id = '$id' ";
           // echo $sql;
            $res = $GLOBALS['con']->query($sql);
            $row = $res->fetch(PDO::FETCH_OBJ);
            $this->fileDataArray[id] = $row->id;;
            $this->fileDataArray[projectId] = new Project($row->id_pro);;
            $this->fileDataArray[memberId] = new Member($row->id_mem);;
            $this->fileDataArray[name] = $row->name;;
            $this->fileDataArray[mime] = $row->mime;;
            $this->fileDataArray[data] = $row->data;;
            $this->fileDataArray[size] = $row->size;;
            $this->fileDataArray[uploadDate] = $row->upload_date;;
            $this->fileDataArray[tpye] = $row->type;;
            $this->fileDataArray[rank] = $row->rank;;

    }

    public function __toString(){
        return "file name : ".$this->name." size : ".$this->size;
    }

    public function getOwnerId(){
        return $member->id;
    }

    public function getElement($index){
        return $this->fileDataArray[$index];
    }

    public function setElement($index,$value){
        $this->fileDataArray[$index] = $value;
    }
    public function getType(){
        return "file";
    }


}

?>