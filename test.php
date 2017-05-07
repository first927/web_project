<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <?php
      require "connectDB_func/connect.php";
    //require "component/navbar.inc.php";
   // require "component/table.inc.php";
    require "connectDB_func/get-set.inc.php";
    require "connectDB_func/helper_function.php";

    // $projectList = new ProjectList();

    // echo $projectList->getAtIndex(0);


    // $p = new Project(1);
    // echo "2";
    // echo $p->getElement("id");
    // echo "2";

    $file = DB_getFileById(1);

    echo $file->getElement("name");


    

    ?>
    </body>
</html>


