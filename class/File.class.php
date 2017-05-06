<?php

class File{
    private $id;
    private $project;
    private $member;
    private $name;
    private $mime;
    private $size;
    private $data;
    private $path;
    private $uploadDate;
    private $type;
    private $rank;
    private $asd;

    function __construct(
        $id,
        $projectId,
        $memberId,
        $name,
        $mime,
        $size,
        $data,
        $path,
        $uploadDate,
        $type,
        $rank)
        {
            $this->id = $id;
            $this->project = new Project($projectID);
            $this->member = new Member($memberId);
            $this->name = $name;
            $this->mime = $mime;
            $this->data = $data;
            $this->uploadDate = $uploadDate;
            $this->type = $type;
            $this->rank = $rank;

    }

    public function __toString(){
        return "file name : ".$this->name;
    }


}

?>