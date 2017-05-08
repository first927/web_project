<div class="col-md-4"></div>
<form action="" method="POST" role="form" enctype="multipart/form-data">
	<div class="form-group col-md-4">
		<input type="file" class="form-control"  name="uploaded_file">
        <div class="input-group">
              <input type="text" readonly="" class="form-control" placeholder="Placeholder w/file chooser...">
                <span class="input-group-btn input-group-sm">
                  <button type="button" class="btn btn-fab btn-fab-mini">
                    <i class="material-icons">attach_file</i>
                  </button>
                </span>
            </div>
		
	</div>        
    <div>
    <br>
        <input class="btn btn-round btn-info col-sm-1" type="submit" value="Upload file">
    </div>
</form>
<div class="container"></div>
<script type="text/javascript">

<?php
	// Check if a file has been uploaded
if(isset($_FILES['uploaded_file'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
        // Connect to the database
        $dbLink = new mysqli('localhost', 'WAD_06', 'WAD_06', 'WAD_06');

        // }
        // Gather all required data
        
        $name = $dbLink->real_escape_string($_FILES['uploaded_file']['name']);
        $mime = $dbLink->real_escape_string($_FILES['uploaded_file']['type']);
        $data = $dbLink->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $size = intval($_FILES['uploaded_file']['size']);

        $result = DB_uploadFile($idPodject,$idMem,$name,$mime,$size,$data,date("Y-m-d H:i:s"));
 
        // Execute the query

 
        // Check if it was successfull
        if($result) {
            echo "alert('Success! Your file was successfully added!');";

        }
        else {
            echo "alert('Error! Failed to insert the file');";
        }
    }
    else {
        // echo "alert('An error accured while the file was being uploaded. '
        //    . 'Error code: '. intval($_FILES['uploaded_file']['error'])');";
        echo "alert('Error! A file was not sent!');";
    }
 
    // Close the mysql connection
    $dbLink->close();
}
else {
    // echo "alert('Error! A file was not sent!');";
}
?>



</script>


