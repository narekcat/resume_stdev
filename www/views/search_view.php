<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Admin" />

	<title>Untitled 5</title>
</head>

<body>

<?php
include_once("../config.php");
include_once("../helper/validation.php");
?>

<form method="post" action="../controllers/search.php" name="search_form">
<p>You can search using one of the keys.<br />
First name:<input type="text" name="first_name" value="<?php echo set_value('first_name');?>"/>&nbsp;
Last name:<input type="text" name="last_name" value="<?php echo set_value('last_name');?>"/>&nbsp;
Keywords:<input type="text" name="keywords" value="<?php echo set_value('keywords');?>"/></p>

<input type="submit" name="search_button" value="Search"/>
</form><br />

<?php

/*echo "<pre>";
print_r($res_arr);
echo "</pre>";*/
    
if(isset($_POST['search_button']) && isset($res_arr))
{
    /*echo "<pre>";
    print_r($res_arr);
    echo "</pre>";*/
    
    if(!empty($res_arr))
    {
        echo "<table border='2px'>
        <tr><th>First name</th>
        <th>Last name</th>
        <th>Keywords</th>
        <th>Resume file</th></tr>";
        foreach($res_arr as $item)
        {
            echo "<tr><td>{$item[first_name]}</td>";
            echo "<td>{$item[last_name]}</td>";
            echo "<td>{$item[keywords]}</td>";
            echo "<td><a href='../resume_files/{$item[resume_file]}'>{$item[resume_file]}</a></td></tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "No result.<br />";
    }
}

?>
<br />
<a href="../index.htm">Back</a>
</body>
</html>