<?php
function doUpload(){
	// Check if a file has been uploaded
if(isset($_FILES['uploaded_file'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
        // Connect to the database
        $dbLink = new mysqli('localhost', 'WAD_06', 'WAD_06', 'WAD_06');
        // $con = new PDO("mysql:host=158.108.207.4;dbname=WAD_06","WAD_06","WAD_06");
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
        // Gather all required data
        $name = $dbLink->real_escape_string($_FILES['uploaded_file']['name']);
        $mime = $dbLink->real_escape_string($_FILES['uploaded_file']['type']);
        $data = $dbLink->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $size = intval($_FILES['uploaded_file']['size']);
        // Create the SQL query
        $query = "
            INSERT INTO `file` (
                `id_pro`, `id_mem`, `name`, `mime`, `size`, `data`, `upload_date`
            )
            VALUES (
                '1','1','{$name}', '{$mime}', {$size}, '{$data}', NOW()
            )";
 
        // Execute the query
        $result = $dbLink->query($query);
 
        // Check if it was successfull
        if($result) {
            echo 'Success! Your file was successfully added!';
        }
        else {
            echo 'Error! Failed to insert the file'
               . "<pre>{$dbLink->error}</pre>";
        }
    }
    else {
        echo 'An error accured while the file was being uploaded. '
           . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    }
 
    // Close the mysql connection
    $dbLink->close();
}
else {
    echo 'Error! A file was not sent!';
}
}
?>

<form action="" method="POST" role="form" enctype="multipart/form-data">
	<div class="form-group">
		<input type="file" class="form-control"  name="uploaded_file"><br>
		<input onclick="doUpload" class="form-control" type="submit" value="Upload file">
	</div>        
</form>



