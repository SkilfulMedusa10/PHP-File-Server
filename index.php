<!-- Software by Roman Wills see LICENSE for details -->
<!-- This is the text at the top of the website -->
<head>
  <title>Change This</title>
</head>

<body>
	<p>Change this to what ever you like!</p>
	<p> </p>
</body>

<!--Sends the file/submit command to "upload.php"-->
<form method="POST" action="upload.php" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload">
	<p> </p>
</form>
<!--The search bar-->	
<form method="POST" enctype="multipart/form-data">
	<input type=text name="text1">
    <input type=submit value= "Search" name="Search">
	<input type=submit value="List All" name="ListAll">
</form>

<?php
// set global variables
$dir='uploads'; //upload directory name

//Search Button Clicked
if(isset($_POST['Search']))
{	
//Sets up the Search Bar to use the input in it
$searchTerm=$_POST['text1'];

//check if search term is empty
if(empty($searchTerm))
{
	echo("Please enter a search term");
}else
{
echo("Results for: ".$searchTerm);
echo("<br>");
$files = scandir($dir);
//Sets up the array
for ($i = 2; $i < count($files); $i++)
{
$pathParts = pathinfo($files[$i]);
	//check and list file if filename contains search term
	if (stripos($pathParts['filename'], $searchTerm) !== false) 
	{
	?>
	<br>
    <table>
		<tr>
			<td><img style="width:200px;height:150px" src="uploads/<?php echo $files[$i]; ?>"></td>
			<td style="width:75px;padding:10px"><?php echo $pathParts['filename']; ?></td>
			<td style="width:50px;padding:10px"><a href="uploads/<?php echo $files[$i]; ?>" download="<?php echo $files[$i]; ?>">Download</a></td>
			<td style="width:50px;padding:10px"><a href="delete.php?name=uploads/<?php echo $files[$i]; ?>" style="color: red;">Delete</a></td>
			
			<td> <form method="POST" action="rename.php" enctype="multipart/form-data">
				<input type="text" name="rename1">
				<input type="submit" value="Rename" name="Rename">
				<input type="hidden" value=<?php echo $pathParts['filename']; ?> name="oldFileName">
				<input type="hidden" value=<?php echo $pathParts['extension']; ?> name="fileExt">
			</form> </td>
		
		</tr>
	</table>
	<?php
	}
}
}
}

// List All Button Clicked
if(isset($_POST['ListAll']))
{	
echo("All files listed below");
echo("<br><br>");
$files = scandir($dir);
//Sets up the array
for ($i = 2; $i < count($files); $i++)
{
$pathParts = pathinfo($files[$i]);    
	?>
	<table>
		<tr>
			<td><img style="width:200px;height:150px" src="uploads/<?php echo $files[$i]; ?>"></td>
			<td style="width:75px;padding:10px"><?php echo $pathParts['filename']; ?></td>
			<td style="width:50px;padding:10px"><a href="uploads/<?php echo $files[$i]; ?>" download="<?php echo $files[$i]; ?>">Download</a></td>
			<td style="width:50px;padding:10px"><a href="delete.php?name=uploads/<?php echo $files[$i]; ?>" style="color: red;">Delete</a></td>
			
			<td> <form method="POST" action="rename.php" enctype="multipart/form-data">
				<input type="text" name="rename1">
				<input type="submit" value="Rename" name="Rename">
				<input type="hidden" value=<?php echo $pathParts['filename']; ?> name="oldFileName">
				<input type="hidden" value=<?php echo $pathParts['extension']; ?> name="fileExt">
			</form> </td>
		
		</tr>
	</table>
   	<?php
}
}
?>
