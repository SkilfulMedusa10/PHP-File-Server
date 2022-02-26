<?php

//Deletes the file
unlink($_GET["name"]);

// goes back to "index.php"
header("Location: " . $_SERVER["HTTP_REFERER"]);