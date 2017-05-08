<?php
class Project{
    private $arrayData;

    function __construct($id){
        $sql = "select *  from project where id = '$id' ";
        //echo $sql;
        $res = $GLOBALS['con']->query($sql);
        $row = $res->fetch(PDO::FETCH_OBJ);
        $this->arrayData[category] = new Category($row->id_category);
        $this->arrayData[title] = $row->title;
        $this->arrayData[detail] = $row->detail;
        $this->arrayData[editDate] = $row->edit_date;
        $this->arrayData[publish] = $row->publish;
        $this->arrayData[id] = $row->id;

    }
    public function getType(){
        return "project";
    }
    public function getElement($index){
        return $this->arrayData[$index];
    }

    public function setElement($index,$value){
        $this->arrayData[$index] = $value;
    }
    function __toString(){
        return "Project : ".$this->arrayData["title"];
    }
    public function getCoPerson(){
        $result = array();
        $id = $this->arrayData["id"];
        $sql = "select * from member_project where id_project = '$id' ";
        //echo $sql;
        $res = $GLOBALS['con']->query($sql);
        for ($i=0; $i < $res->rowCount(); $i++) { 
            $row = $res->fetch(PDO::FETCH_OBJ);
            $result[$i] = new Member($row->	id_member);
            # code...
        }
        return $result;
    }
    public function getLocalFile(){
         $result = array();
        $id = $this->arrayData["id"];
        $sql = "select * from file where id_pro = '$id' ";
        //echo $sql;
        $res = $GLOBALS['con']->query($sql);
        for ($i=0; $i < $res->rowCount(); $i++) { 
            $row = $res->fetch(PDO::FETCH_OBJ);
            $result[$i] = new File($row->id);
            # code...
        }
        return $result;
    }
    public function getInsertSql(){
        return "INSERT INTO `project`
        (`id_category`, `title`, `detail`, `edit_date`, `publish`) 
        VALUES 
        (
            {$this->publish},
            {$this->category},
            {$this->title},
            {$this->detail},
            {$this->editDate}
        )";
    }

    public function getUpdateSql(){
        return "UPDATE `project` 
         SET 
        `id_category`={$this->$category},
        `title`={$this->title},
        `detail`= {$this->detail},
        `edit_date`={$this->editDate},
        `publish`={$this->piblish} 
        WHERE id = '{$project->id}";
    }
    public static function addNewProject($caiID,$title,$detail,$editDate,$publish){
        $sql = "INSERT INTO `project`
        (`id_category`, `title`, `detail`, `edit_date`, `publish`) 
        VALUES 
        (
            '$caiID',
            '$title',
            '$detail',
            '$editDate',
            '$publish'

        )";
        echo $sql;
        $GLOBALS['con']->exec($sql);

    }

}

?>