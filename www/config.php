<?php

$server="localhost";
$username = "resume_user";
$password = "NrdnFDetYzUchuHM";
$dbname = "resume_db";

$dbcnx = @mysql_connect($server,$username,$password);
if(!$dbcnx)
{
    exit("Sorry, we have a problem whith data base connection, please try later.");
}
else
{
    if(!mysql_select_db($dbname,$dbcnx))
    {
        exit("Sorry, but we have a problem with databe, please try later.");
    }
}

?>
