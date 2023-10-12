<?php

class deletePositionController extends deletePosition{
    private $role_id;


    public function __construct($role_id){
        $this->role_id = $role_id;

    }
    public function deletePositionFunc(){
        $this->deletePositionData($this->role_id);
    }

}