<?php
    $list  = new FileList();

    $p = $list->getAllFile();

    // Make sure there are some files in there
    if(count($p)<1) {
        echo '<p>There are no files in the database</p>';
    }
    else {
        // Print the top of a table
        echo '
        <div class="card">
    <div class="card-header" data-background-color="purple">
        <h4 class="title">Files</h4>
        <p class="category">All files in server</p>
    </div>
        <div class="col-sm-12 card-content table-responsive table-full-width">
        <table class="table">
        <thead class="text-danger">
                    <th><b>Name</b></th>
                    <th><b>Type</b></th>
                    <th><b>Size (bytes)</b></th>
                    <th><b>Created</b></th>
                    <th><b>&nbsp;</b></th>
                    <th><b>&nbsp;</b></th>
                </thead>
                ';
 
        // Print each file
                $i=0;
                // echo count($p);
        while($i<count($p)) {
            echo "
                <tr>
                    <td>{$p[$i]->getElement('name')}</td>
                    <td>{$p[$i]->getElement('mime')}</td>
                    <td>{$p[$i]->getElement('size')}</td>
                    <td>{$p[$i]->getElement('uploadDate')}</td>
                    <td ><a class='btn btn-sm btn-primary' href='component/getfile.inc.php?id={$p[$i]->getElement('id')}' >Download</a></td>
                    <td ><a class='btn btn-sm btn-danger' href='component/deletefile.inc.php?id={$p[$i]->getElement('id')}' >Delete</a> </td>
                </tr>";
                $i++;
        }
        // Close table
        echo '</table></div></div>';
    }
?>