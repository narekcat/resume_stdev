<?php

$error_msg=array();

function is_valid_text($field_name)
{
    global $error_msg;
    $text=$_POST[$field_name];
    $text=trim($text);
    if(!empty($text))
    {
        $text=htmlspecialchars($text);
        $text=stripslashes($text);
        $error_msg[$field_name]="";
        return $text;            
    }
    else
    {
        $error_msg[$field_name]="Field '$field_name' must be filled.";
        return false;
    }        
}
    
function is_valid_file($field_name)
{
    global $error_msg;
    $file_name=$_FILES[$field_name]["name"];
    if(!empty($file_name))
    {
        $format=strrchr($file_name,'.');
        if($format==".txt" || $format==".rtf" || $format==".doc" || $format==".docx")
        {
            $error_msg[$field_name]="";
            return $file_name;
        }
        else
        {
            $error_msg[$field_name] = "Field '$field_name' have incorect format.";
            return false;
        }
    }
    else
    {
        $error_msg[$field_name]="Field '$field_name' must be filled.";
        return false;
    }
}

function set_value($field_name)
{
    if(isset($_POST[$field_name]))
    return $_POST[$field_name];
    else return NULL;
}

function set_file_name($field_name)
{
    if(isset($_FILES[$field_name]["name"]))
    return $_FILES[$field_name]["name"];
    else return NULL;
}

function form_errorMsg($filed_name)
{
    global $error_msg;
    if(isset($error_msg[$filed_name]))
    return $error_msg[$filed_name];
    else return null;
}

?>