<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

require_once '../config/db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit;
}

?>
<!DOCTYPE html>

<head>
    <title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Basic_table :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script
        type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="../css/style.css" rel='stylesheet' type='text/css' />
    <link href="../css/style-responsive.css" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="../css/font.css" type="text/css" />
    <link href="../css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <script src="../js/jquery2.0.3.min.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

    <!-- DataTables Responsive CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

    <!-- Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
</head>

<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">

                <a href="index.html" class="logo">
                    VISITORS
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->

            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-success">8</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <li>
                                <p class="">You have 8 pending tasks</p>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info clearfix">
                                        <div class="desc pull-left">
                                            <h5>Target Sell</h5>
                                            <p>25% , Deadline 12 June’13</p>
                                        </div>
                                        <span class="notification-pie-chart pull-right" data-percent="45">
                                            <span class="percent"></span>
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info clearfix">
                                        <div class="desc pull-left">
                                            <h5>Product Delivery</h5>
                                            <p>45% , Deadline 12 June’13</p>
                                        </div>
                                        <span class="notification-pie-chart pull-right" data-percent="78">
                                            <span class="percent"></span>
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info clearfix">
                                        <div class="desc pull-left">
                                            <h5>Payment collection</h5>
                                            <p>87% , Deadline 12 June’13</p>
                                        </div>
                                        <span class="notification-pie-chart pull-right" data-percent="60">
                                            <span class="percent"></span>
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info clearfix">
                                        <div class="desc pull-left">
                                            <h5>Target Sell</h5>
                                            <p>33% , Deadline 12 June’13</p>
                                        </div>
                                        <span class="notification-pie-chart pull-right" data-percent="90">
                                            <span class="percent"></span>
                                        </span>
                                    </div>
                                </a>
                            </li>

                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-important">4</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <li>
                                <p class="red">You have 4 Mails</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="../images/3.png"></span>
                                    <span class="subject">
                                        <span class="from">Jonathan Smith</span>
                                        <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hello, this is an example msg.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="../images/1.png"></span>
                                    <span class="subject">
                                        <span class="from">Jane Doe</span>
                                        <span class="time">2 min ago</span>
                                    </span>
                                    <span class="message">
                                        Nice admin template
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="../images/3.png"></span>
                                    <span class="subject">
                                        <span class="from">Tasi sam</span>
                                        <span class="time">2 days ago</span>
                                    </span>
                                    <span class="message">
                                        This is an example msg.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="../images/2.png"></span>
                                    <span class="subject">
                                        <span class="from">Mr. Perfect</span>
                                        <span class="time">2 hour ago</span>
                                    </span>
                                    <span class="message">
                                        Hi there, its a test
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                    <!-- notification dropdown start-->
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="fa fa-bell-o"></i>
                            <span class="badge bg-warning">3</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <li>
                                <p>Notifications</p>
                            </li>
                            <li>
                                <div class="alert alert-info clearfix">
                                    <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                    <div class="noti-info">
                                        <a href="#"> Server #1 overloaded.</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="alert alert-danger clearfix">
                                    <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                    <div class="noti-info">
                                        <a href="#"> Server #2 overloaded.</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="alert alert-success clearfix">
                                    <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                    <div class="noti-info">
                                        <a href="#"> Server #3 overloaded.</a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </li>
                    <!-- notification dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder=" Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="../images/2.png">
                            <span class="username">
                                <?= $_SESSION['username']; ?>
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="../Logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->

                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <?php

$parentStmt = $conn->prepare("
    SELECT *
    FROM assdt_sidebar
    WHERE parent_id = 0
    AND is_active = 1
    ORDER BY tab_order ASC
");

$parentStmt->execute();

$parents = $parentStmt->fetchAll(PDO::FETCH_ASSOC);

$currentPage = basename($_SERVER['PHP_SELF']);

?>

        <aside>
            <div id="sidebar" class="nav-collapse">

                <div class="leftside-navigation">

                    <ul class="sidebar-menu" id="nav-accordion">

                        <?php foreach($parents as $parent): ?>

                        <?php

                    $childStmt = $conn->prepare("
                        SELECT *
                        FROM assdt_sidebar
                        WHERE parent_id = ?
                        AND is_active = 1
                        ORDER BY tab_order ASC
                    ");

                    $childStmt->execute([
                        $parent['sidebar_id']
                    ]);

                    $children =
                        $childStmt->fetchAll(PDO::FETCH_ASSOC);

                    ?>

                        <?php if(count($children) > 0): ?>

                        <li class="sub-menu">

                            <a href="javascript:;">

                                <i class="<?= $parent['tab_icon_class']; ?>"></i>

                                <span>
                                    <?= htmlspecialchars($parent['tab_name']); ?>
                                </span>

                            </a>

                            <ul class="sub">

                                <?php foreach($children as $child): ?>

                                <li>

                                    <a href="./<?= $child['link_url']; ?>">

                                        <?= htmlspecialchars($child['tab_name']); ?>

                                    </a>

                                </li>

                                <?php endforeach; ?>

                            </ul>

                        </li>

                        <?php else: ?>

                        <li>

                            <a href="	<?= $parent['link_url']; ?>">

                                <i class="<?= $parent['tab_icon_class']; ?>"></i>

                                <span>
                                    <?= htmlspecialchars($parent['tab_name']); ?>
                                </span>

                            </a>

                        </li>

                        <?php endif; ?>

                        <?php endforeach; ?>

                    </ul>

                </div>

            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Responsive Table
                        </div>
                        <div class="row w3-res-tb" style="">
                            <form id='frmdateWise' method="POST">

                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label for="" class="col-form-label">From Date <span
                                                style="color:red;">*</span></label>
                                        <input type='date' class="form-control" id="lstFromDate" name="lstFromDate">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label for="" class="col-form-label">To Date</label>
                                        <input type='date' class="form-control" id="lstToDate" name="lstToDate">
                                    </div>
                                    <div class="col-md-2 mt-4 col-sm-12">
                                        <input type='submit' class="btn btn-primary" value="Show">
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="row w3-res-tb">



                        </div>

                        <div class="row w3-res-tb">

                            <div class="table-responsive">
                                <table class='table table-bordered' id='tblcampaigndata'>

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User Id</th>
                                            <th>Scode</th>
                                            <th>Service Name</th>
                                            <th>Service Type</th>
                                            <th>Transamt</th>
                                            <th>Chargeamt</th>
                                            <th>Required Date Time</th>
                                            <th>Status</th>
                                        </tr>

                                    </thead>
                                    <tbody id='tblData'>

                                    </tbody>

                                </table>
                            </div>

                        </div>


                    </div>
                </div>
            </section>
            <!-- footer -->
            <div class="footer">
                <div class="wthree-copyright">
                    <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
                </div>
            </div>
            <!-- / footer -->
        </section>

        <!--main content end-->
    </section>
    <script src="https://code.jquery.com/jquery-4.0.0.js"
        integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U=" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../js/scripts.js"></script>
    <script src="../js/jquery.slimscroll.js"></script>
    <script src="../js/jquery.nicescroll.js"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="../js/jquery.scrollTo.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

    <!-- Responsive JS -->
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>


    <script>

        $("#frmdateWise").submit(function (e) {
            e.preventDefault();
            var Data = {

                "Flag": "show-date-wise",
                "FromDate": $("#lstFromDate").val(),
                "ToDate": $("#lstToDate").val()
            };

            $.ajax({

                url: '../api/operations.php',

                type: 'post',

                data: JSON.stringify(Data),

                dataType: "json",

                contentType: "application/json; charset=utf-8",

                success: function (response) {
                    console.log(response);

                    let Str = "";
                    console.log(response.data);

                    let SrNo = 0;

                    response.data.forEach((value) => {
                        let user_id = value.user_id;
                        let scode = value.scode;
                        let servicename = value.servicename;
                        let servicetype = value.servicetype;
                        let transamt = value.transamt;
                        let chargeamt = value.chargeamt;
                        let req_dt = value.req_dt;
                        let status = value.status;

                        SrNo++;

                        Str += `
                        <tr>
                         <td>${SrNo}</td>
                         <td>${user_id}</td>
                         <td>${scode}</td>
                         <td>${servicename}</td>
                         <td>${servicetype}</td>
                         <td>${transamt}</td>
                         <td>${chargeamt}</td>
                         <td>${req_dt}</td>
                         <td>${status}</td>
                         </tr>
                        `
                    });
                    $("#tblData").html(Str)

                    $('#tblcampaigndata').DataTable({
                        responsive: true,
                        dom: 'Bfrtip',
                        buttons: [

                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7]
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                orientation: 'landscape',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7]
                                }
                            },
                        ]
                    });

                }
            });
        });

    </script>

</body>

</html>