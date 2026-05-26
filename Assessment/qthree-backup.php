<?php

require_once '../config/db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Report Data</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

    <!-- Font Awesome -->
    <link href="../css/font-awesome.css" rel="stylesheet">

    <style>

        body{
            padding:20px;
        }

        .spinner-border{
            display:inline-block;
            width:4rem;
            height:4rem;
            vertical-align:text-bottom;
            border:0.4em solid #007bff;
            border-right-color:transparent;
            border-radius:50%;
            animation:spinner-border .75s linear infinite;
        }

        @keyframes spinner-border{
            to{
                transform:rotate(360deg);
            }
        }

    </style>

</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3>Service Consumption Report</h3>
                    </div>

                    <div class="panel-body">

                        <!-- Date Filter Form -->
                        <form id="frmdateWise" method="POST">

                            <div class="row">

                                <div class="col-md-4">

                                    <label>From Date</label>

                                    <input type="date"
                                           class="form-control"
                                           id="lstFromDate"
                                           name="lstFromDate">

                                </div>

                                <div class="col-md-4">

                                    <label>To Date</label>

                                    <input type="date"
                                           class="form-control"
                                           id="lstToDate"
                                           name="lstToDate">

                                </div>

                                <div class="col-md-2" style="margin-top:25px;">

                                    <input type="submit"
                                           class="btn btn-primary"
                                           value="Show">

                                </div>

                            </div>

                        </form>

                        <hr>

                        <!-- Table -->
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped"
                                   id="tblcampaigndata"
                                   width="100%">

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

                                <tbody id="tblData">

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Loader -->
    <div id="loader" style="
        display:none;
        position:fixed;
        z-index:9999;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background:rgba(255,255,255,0.7);
    ">

        <div style="
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%, -50%);
            text-align:center;
        ">

            <div class="spinner-border"></div>

            <h4 style="margin-top:15px;">
                Loading Data...
            </h4>

        </div>

    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap -->
    <script src="../js/bootstrap.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

    <!-- Responsive -->
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

                type: 'POST',

                data: JSON.stringify(Data),

                dataType: "json",

                contentType: "application/json; charset=utf-8",

                beforeSend: function () {

                    $("#loader").show();

                },

                success: function (response) {

                    console.log(response);

                    let Str = "";

                    let SrNo = 0;

                    response.data.forEach((value) => {

                        SrNo++;

                        Str += `
                            <tr>
                                <td>${SrNo}</td>
                                <td>${value.user_id}</td>
                                <td>${value.scode}</td>
                                <td>${value.servicename}</td>
                                <td>${value.servicetype}</td>
                                <td>${value.transamt}</td>
                                <td>${value.chargeamt}</td>
                                <td>${value.req_dt}</td>
                                <td>${value.status}</td>
                            </tr>
                        `;

                    });

                    $("#tblData").html(Str);

                    // Destroy old DataTable
                    if ($.fn.DataTable.isDataTable('#tblcampaigndata')) {

                        $('#tblcampaigndata').DataTable().destroy();

                    }

                    // Reinitialize DataTable
                    $('#tblcampaigndata').DataTable({

                        responsive: true,
                        pageLength: 25

                    });

                },

                complete: function () {

                    $("#loader").hide();

                },

                error: function () {

                    $("#loader").hide();

                    alert("Something went wrong!");

                }

            });

        });

    </script>

</body>

</html>