<?php

include_once("../config.php");
include_once("../helper/validation.php");
include_once("../models/resume_model.php");

class add
{
    private $first_name,$last_name,$keywords,$file_name;
    private $resume_mod;
    
    public function __construct($dbcnx)
    {
        $this->resume_mod = new resume_model($dbcnx);
        $this->first_name = is_valid_text('first_name');
        $this->last_name = is_valid_text('last_name');
        $this->keywords = is_valid_text('keywords');
        $this->file_name = is_valid_file('resume_file');
    }
    
    public function run()
    {
        if($this->first_name && $this->last_name && $this->keywords && $this->file_name)
        {
            if($this->resume_mod->set_resume($this->first_name,$this->last_name,$this->keywords,$this->file_name))
            {
                if(!copy($_FILES['resume_file']['tmp_name'],"../resume_files/".$this->file_name))
                {
                    exit("File isn't loaded");
                }
                echo "Your resume is successfully added.";
            }            
        }
    }
}

$add_obj=new add($dbcnx);
$add_obj->run();
include_once("../views/add_view.php");

?>