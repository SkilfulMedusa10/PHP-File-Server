<?php

//getting uploaded file
$file = $_FILES["file"];

//putting file in "uploads" file
move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);

//goes Back to "index.php"
header("Location: " . $_SERVER["HTTP_REFERER"]);