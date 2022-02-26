<?php
//gets the old and new name, and the file extintion
$newFileName = $_POST['rename1'];
$oldFileName = $_POST['oldFileName'];
$fileExt = $_POST['fileExt'];

//grabs the old name, renames in, puts it into "uploads" folder, and adds the file extintion to the end 
rename("uploads/$oldFileName.$fileExt", "uploads/$newFileName.$fileExt"); 

//goes back to "index.php"
header("Location: " . $_SERVER["HTTP_REFERER"]);
