<?php

if (isset($_POST['search-submit'])){ 
    require 'dbh.inc.php';

    $search = $_POST['search'];

    if (empty($search)){
        header("Location: ../Product_collections.php?error=emptyfield");
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $search)){
        header("Location: ../Product_collections.php?error=invalidsearch");
        exit();
    }

}