<?php
header("Content-type:application/json");
// return json
// select, echo using json_encode, put all rows in an array
require_once "includes/dbh.inc.php";

$sql = "SELECT ProductID, Name, counter FROM Product  ORDER BY ProductID";
$result = mysqli_query($conn, $sql);

// Fetch all
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode(['data' => $rows]);



// ajax
// $(document).ready(function () {
//     $.ajax({
//         url:"AdminGraph.php",
//         method: "POST",
//         success:function (data)
//         {
//             // obj = JSON.parse(data);
//             console.log(data);
            
//             var name = [];
//             var counter = [];

//             for (var i in data) {
//                 name.push(data[i].Name);
//                 counter.push(data[i].counter);
//             }
            

//             var chartdata = {
//                 type: 'bar',
//                 data:{
//                     datasets: [{
//                             label: 'Product counter',
//                             backgroundColor: '#49e2ff',
//                             borderColor: '#46d5f1',
//                             hoverBackgroundColor: '#CCCCCC',
//                             hoverBorderColor: '#666666',
//                             data: counter
//                     }],
//                     labels: name
//                 }
                
//             };
//             var graphTarget = $("#graphCanvas");
//             new Chart(graphTarget, chartdata);
//         },
//         error: function(data) {
//             console.log(data);
//         }

        

//     });
// });
