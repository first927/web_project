<?php

class MemberProject{
    private $id;
    private $member;
    private $project;
    private $position;
    private $percent;

    function __construct($id , $memberId , $projectId,$position,$percent ){
        $this->id = $id;
        $this->member = new Member($memberId);
        $this->project = new Project($projectId);
        $this->position = $position;
        $this->percent = $percent;
    }

    public function __toString(){
        return "member : ".member->getName()." work for : ".$project ;
    }
}

?>