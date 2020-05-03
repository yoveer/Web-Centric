<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>NML Admin Page</title>

    <style type="text/css">
        .graph1,
        .graph2,
        #graphCanvas {
            width: 800px;
            height: 800px;
        }

        #chart-container {
            width: 100%;
            height: auto;
        }
    </style>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="styles/adminsidebar.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!-- Chart.js library -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include 'components/adminsidebar.php' ?>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <?php echo "<p style='color:blue;margin:auto;padding:0px 0px 0px 40px'>Hi, " . $_SESSION['userId'] . " <i class='fa fa-heart'></i></p>"; ?>
                    </div>
                </div>
            </nav>

            <h2>Welcome to the admin welcome page</h2>
            <p>In here an admin can do all kinds of stuffs for the NML's website.</p>
            <p>An admin can edit everything that can be edited.</p>

            <div class="line"></div>

            <h2>Hello Cute Admin ^_^</h2>
            <p>Welcome back, how are you?</p>

            <div class="line"></div>
            <div class="container graph1">
                <h3>Most Selected Products By ID</h3>
                <div id="chart-container">
                    <canvas id="graphCanvas"></canvas>
                </div>
                <?php
                require_once "includes/dbh.inc.php";
                $sql = "SELECT ProductID, Name, counter FROM Product  ORDER BY ProductID";
                $result = mysqli_query($conn, $sql);

                // Fetch all
                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                ?>

                <script>
                    // JSON at the PHP level + JSON using Javascript or JQuery using chart.js
                    $(document).ready(function() {
                        var name = [];
                        var counter = [];
                        var data = <?php echo json_encode($rows) ?>; //put array in data
                        for (var i in data) {
                            name.push(data[i].ProductID);
                            counter.push(data[i].counter);
                        }


                        var chartdata = {
                            type: 'bar',
                            data: {
                                datasets: [{
                                    label: 'Product counter',
                                    backgroundColor: '#49e2ff',
                                    borderColor: '#46d5f1',
                                    hoverBackgroundColor: '#CCCCCC',
                                    hoverBorderColor: '#666666',
                                    data: counter
                                }],
                                labels: name
                            }

                        };
                        var graphTarget = $("#graphCanvas");
                        new Chart(graphTarget, chartdata);

                    });
                </script>
            </div>
            <div class="line"></div>
            <div class="container graph2">
                <h3>Search Most Selected Client Choices By Name / Descrition</h3>
                <div id="search_box">
                    <form method="post" action="GenerateAdminGraph.php" onsubmit="return do_search();">
                        <input type="text" id="search_term" name="search_term" placeholder="Enter Search" onkeyup="do_search();">
                        <input type="submit" name="search" value="SEARCH">
                    </form>
                </div>
                <div id="chart-container">
                    <canvas id="graphCanvas1"></canvas>
                </div>

                <!-- <div id="result_div"></div> -->
                <script type="text/javascript">
                    function do_search() {
                        var search_term = $("#search_term").val();
                        // -----------------------------------------------------------------------------------
                        // JSON consumption and AJAX  - Make an AJAX call to load a json and process the json.

                        $.ajax({
                            type: 'post',
                            url: 'GenerateAdminGraph.php',
                            data: {
                                search: "search",
                                search_term: search_term
                            },
                            success: function(data) {
                                //kot display graph i think

                                $.getJSON({
                                    url: "search_result.json",
                                    success: function(result, status, xhr) {
                                        var name = [];
                                        var counter = [];
                                        for (var i in result) {
                                            name.push(result[i].Name);
                                            counter.push(result[i].counter);
                                        }


                                        var chartdata1 = {
                                            type: 'bar',
                                            data: {
                                                datasets: [{
                                                    label: 'Product counter',
                                                    backgroundColor: '#49e2ff',
                                                    borderColor: '#46d5f1',
                                                    hoverBackgroundColor: '#CCCCCC',
                                                    hoverBorderColor: '#666666',
                                                    data: counter
                                                }],
                                                labels: name
                                            }

                                        };
                                        var graphTarget1 = $("#graphCanvas1");
                                        new Chart(graphTarget1, chartdata1);
                                    }
                                });

                                // document.getElementById("result_div").innerHTML=data;
                            }
                        });

                        return false;
                    }
                </script>
                <!-- Validate Here -->

                <div class="Generate">
                    <div class="button">
                        <button id="Val">Validate Json file</button>
                    </div>

                    <div id="dataModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Validation For Json</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body" id="validate_detail">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('#Val').click(function() {

                                $.ajax({
                                    url: "ValidateSchema.php",
                                    method: "post",
                                    success: function(data) {
                                        $('#validate_detail').html(data);
                                        $('dataModal').modal("show");
                                    }
                                });
                                $('#dataModal').modal("show");
                            });
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>