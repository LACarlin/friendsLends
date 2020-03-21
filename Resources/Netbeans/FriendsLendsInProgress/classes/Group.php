<?php

class Group {
    private $gid;
    private $groupName;
    
    public function __construct($groupname){
        $this->groupName = $groupname;
    } 
    
    public function getGroupName(){
        return $this->groupName .PHP_EOL;
    }
    
    public function getGroupID(){
        return $this->gid .PHP_EOL;
    }
}