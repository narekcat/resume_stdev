<?php

include_once("../config.php");
include_once("../models/resume_model.php");
include_once("../helper/validation.php");

class search
{
    private $first_name,$last_name,$keywords;
    private $resume_mod;
    
    public function __construct($dbcnx)
    {
        $this->resume_mod = new resume_model($dbcnx);
        $this->first_name = is_valid_text('first_name');
        $this->last_name = is_valid_text('last_name');
        $this->keywords = is_valid_text('keywords');
    }
    
    public function run()
    {
        if($this->first_name || $this->last_name || $this->keywords)
        {
            return $this->resume_mod->get_resume($this->first_name,$this->last_name,$this->keywords);
        }
        else
        {
            echo "One of the keys must be full.<br />";
            return NULL;
        }
    }
}

$search_obj = new search($dbcnx);
$res_arr = array();
$res_arr = $search_obj->run();
include_once("../views/search_view.php");

?>