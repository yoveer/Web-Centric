<?php
if (isset($_POST['search'])) {
    require_once "includes/dbh.inc.php";

    $search_val = $_POST['search_term'];
    $search_val = strtolower($search_val);
    echo $search_val;


    $sql = "SELECT ProductID, Name, counter, Description FROM Product WHERE lower(Name) LIKE '%".$search_val."%' OR lower(Description) LIKE '%".$search_val."%'";
    $result = mysqli_query($conn, $sql);

    // Fetch all
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //JSON creation - You will have to show how you create a JSON file
    $log_filename = "search_result.json";

    $json_data = json_encode($rows, JSON_PRETTY_PRINT);

    file_put_contents($log_filename, $json_data); //puts data in json file
    echo $json_data; // getting value
}
