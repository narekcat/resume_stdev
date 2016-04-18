<?php

class resume_model
{
    private $dbconnect;
    
    public function __construct($dbcnx)
    {
        $this->dbconnect = $dbcnx;
    }
    
    public function set_resume($first_name,$last_name,$keywords,$file_name)
    {
        $query="INSERT INTO resume VALUES(NULL,'$first_name','$last_name','$keywords','$file_name')";
        //echo "$query<br />";
        if(!mysql_query($query,$this->dbconnect))
        {
            return false;
        }
        $id = mysql_insert_id($this->dbconnect);
        return true;
    }
    
    public function get_resume($first_name,$last_name,$keywords)
    {
        $result_arr;
        $query="SELECT * FROM resume WHERE first_name LIKE '%$first_name%' AND last_name LIKE '%$last_name%' AND keywords LIKE '%$keywords%'";
        if(!empty($first_name)) $query.=" ";
        if(!empty($last_name)) $query.=" ";
        if(!empty($keywords)) $query.=" ";
        if($res = mysql_query($query,$this->dbconnect))
        {
            if(($num = mysql_num_rows($res)))
            {
                while($num != 0)
                {
                    $result_arr[] = mysql_fetch_assoc($res);
                    $num--;
                }
                return $result_arr;
            }
            else 
            {
                return false;
            }
        }
        else
        { 
            return false;
        }
    }
}

?>