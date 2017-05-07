<?php
//member----------------------------------------------------------------------
function DB_getAllMember(){
    $res = $GLOBALS['con']->query("select * from member");
    $i = 0;
    for ($i=0; $i < $res->rowCount(); $i++) {
        $row = $res->fetch(PDO::FETCH_OBJ);
        $result[$i] = new member($row->id);
        # code...
    }
    return $result;
} 

function DB_getMemberById($id){
    $res = $GLOBALS['con']->query("select * from member wwhere id = '$id' ");
    $row = $res->fetch(PDO::FETCH_OBJ);
    return new member($row->id);
}

function DB_delMember(){
    $res = $GLOBALS['con']->exec("DELETE FROM `member` WHERE id = '$id' ");
}



//Project----------------------------------------------------------------------
function DB_getAllProject(){
    $result ;
     $res = $GLOBALS['con']->query("select * from project");
    $i = 0;
    for ($i=0; $i < $res->rowCount(); $i++) {
        $row = $res->fetch(PDO::FETCH_OBJ);
        $result[$i] = new Project($row->id);
        # code...
    }
    return $result;
}

function DB_getProjectById($id){
    $res = $GLOBALS['con']->query("select * from project wwhere id = '$id' ");
    $row= $res->fetch(PDO::FETCH_OBJ);
    return new Project($row->id);
}

function DB_getProjectByMemberId($mid){
    $res = $GLOBALS['con']->query("select id_project from member_project where id_member = '$mid' ");
    $row=$res->fetch(PDO::FETCH_OBJ);
    return new Project($row->id_project);
}

function DB_delProject(){
    $res = $GLOBALS['con']->exec("DELETE FROM `project` WHERE id = '$id' ");
}



//file----------------------------------------------------------------------
function DB_getAllFile(){
     $res = $GLOBALS['con']->query("select * from file");
    $i = 0;
    for ($i=0; $i < $res->rowCount(); $i++) {
        $row = $res->fetch(PDO::FETCH_OBJ);
        $result[$i] = new File($row->id);
        # code...
    }
    return $result;
}

function DB_getFileById($id){
    $sql = "select * from file where id = '$id' ";
    //echo $sql;
    $res = $GLOBALS['con']->query($sql);
    $row = $res->fetch(PDO::FETCH_OBJ);
    return new File($row->id);
}

function DB_delFile($id){
    $res = $GLOBALS['con']->exec("DELETE FROM `file` WHERE id = '$id' ");
}

//category----------------------------------------------------------------------
function DB_getCatByProjectId($pid){
    $res = $GLOBALS['con']->query("select * from category wwhere id = '$pid' ");
    $row = $res->fetch(PDO::FETCH_OBJ);
    return new Category($row->id);
}
function DB_getAllCat(){
    $GLOBAL['con']->query("select * from category");
    $i = 0;
    for ($i=0; $i < $res->rowCount(); $i++) {
        $row = $res->fetch(PDO::FETCH_OBJ);
        $result[$i] = new Category($row->id);
        # code...
    }
    return $result;
}
function DB_delCat($id){
     $GLOBAL['con']->exec("DELETE FROM `category` WHERE id = '$id' ");
}

//default----------------------------------------------------------------------

function update($obj){
    $sql = $obj->getUpdateSql();
    echo $sql;
    $GLOBAL['con']->exec($sql);


}
?>