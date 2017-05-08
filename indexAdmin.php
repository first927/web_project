<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Project Master 007</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>
    <link href="documentation/css/demo-documentation.css" rel="stylesheet" />

    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>

    <style>
        #myCard{
            overflow:auto;
            width: 90%;
            height:500px;
            font-size: 14px;
            margin-left: 5%;
            margin-right: 5%;
        }
        pre.prettyprint{
            background-color: #eee;
            border: 0px;
            margin-bottom: 60px;
            margin-top: 30px;
            padding: 20px;
            text-align: left;
        }
        .atv, .str{
            color: #05AE0E;
        }
        .tag, .pln, .kwd{
            color: #3472F7;
        }
        .atn{
            color: #2C93FF;
        }
        .pln{
            color: #333;
        }
        .com{
            color: #999;
        }
        .space-top{
            margin-top: 50px;
        }
        .area-line{
            border: 1px solid #999;
            border-left: 0;
            border-right: 0;
            color: #666;
            display: block;
            margin-top: 20px;
            padding: 8px 0;
            text-align: center;
        }
        .area-line a{
            color: #666;
        }
        .container-fluid{
            padding-right: 15px;
            padding-left: 15px;
        }
        .modal-header, h3, .close {
            background-color: #7b1fa2;
            color:white !important;
            text-align: center;
            font-size: 30px;
        }

    </style>
</head>
<body>
<?php
require "connectDB_func/connect.php";
require "component/navbarAdmin.inc.php";
//require "component/table.inc.php";
require "component/searchBar.inc.php";
require "connectDB_func/get-set.inc.php";
require "connectDB_func/helper_function.php";

$list = DB_getAllProject();
$i = 0;
?>
<h1 style="margin-left:10%">Project</h1>
<div id="myCard"><?php
    for ($i=0; $i < count($list); $i++) {
        $id = $list[$i]->getElement("id");
        $title = $list[$i]->getElement("title");
        $date = $list[$i]->getElement("publish");?>

        <div class='col-md-4' onclick="Redirect('<?php echo $id;?>');">
            <div class='card'>
                <div class='card-header card-chart' data-background-color='orange'>
                    <div class='ct-chart' id='dailySalesChart'></div>
                </div>
                <div class='card-content'>
                    <h4 class='title' id='myTitle' ><?php echo $title; ?></h4>
                    <p class='category'><span class='text-success'><i class='fa fa-long-arrow-up'></i> 55%  </span> increase in today sales.</p>
                </div>
                <div class='card-footer'>
                    <div class='stats'>
                        <i class='material-icons'>access_time</i> sice <?php echo $date; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        # code...
    }
    ?>
</div>
</body>
<script>
    function Redirect(id)
    {
        window.location="projectContent.php?id="+id;
    }
</script>
<script>
    function myFunction() {
        // Declare variables
        var input , myText , myCard ,detail, text, i , j;
        input = document.getElementById("search");
        myText = input.value.toUpperCase();

        myHeadCard = document.getElementById("myCard");

        myCard = myHeadCard.getElementsByTagName("div");

        for(i = 0 ; i < myCard.length; i+=7){
            //alert(myCard.length);
            detail = myCard[i].getElementsByTagName("div");
            //alert(detail.length);
            text = detail[3].getElementsByTagName("h4");
            //text.innerHTML = "AAA";
            //alert(text.innerHTML);
            //alert(text[0].innerHTML);
            //alert(text.innerHTML);
            if(text[0].innerHTML.toUpperCase().indexOf(myText) > -1){
                //alert("myCard555555");
                myCard[i].style.display="";
            }
            else{
                //alert("myCard55555566666");
                myCard[i].style.display = "none";
            }
        }
    }
</script>
<!--   Core JS Files   -->
<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

<script>
    var header_height;
    var fixed_section;
    var floating = false;

    $().ready(function(){
        suggestions_distance = $("#suggestions").offset();
        pay_height = $('.fixed-section').outerHeight();
        $('.modal').appendTo("body");
        $(window).on('scroll', md.checkScrollForTransparentNavbar);
        demo.initDocumentationCharts();
    });
</script>
</html>