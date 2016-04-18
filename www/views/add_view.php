<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Admin" />

	<title>Add resume</title>
</head>

<body>
<p>Fields marked * most be filled.</p>

<?php 
include_once('../config.php');
include_once("../helper/validation.php");
?>


<form method="post" action="../controllers/add.php" enctype="multipart/form-data">

<p>First name*: <input type="text" name="first_name" size="20" value="<?php echo set_value('first_name');?>" /><br />
<strong><?php echo form_errorMsg('first_name');?></strong></p>

<p>Last name*: <input type="text" name="last_name" size="20" value="<?php echo set_value('last_name');?>" /><br />
<strong><?php echo form_errorMsg('last_name');?></strong></p>

<p>Keywords*: <input type="text" name="keywords" size="20" value="<?php echo set_value('keywords');?>" /><br />
<strong><?php echo form_errorMsg('keywords');?></strong></p>

<p>Resume file*:<input type="file" name="resume_file"/><br />
File most be one of formats .txt,.rtf,.doc,.docx and size should not be larger than 1MB <br />
<strong><?php echo form_errorMsg('resume_file');?></strong></p>

<p><input type="submit" name="sub_button" value="Send"/></p>

</form>

<a href="../index.htm">Back</a>

</body>
</html>