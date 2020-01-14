<?php
    if(isset($_POST['submit-prod'])){
        $v1 = "images/product/";
        $fnm = $_FILES['pi']['name']; //save image
        $dst = $v1.$fnm;

        $prodid = $_POST['pid'];
        $prodname = $_POST['pn'];
        $proddesc = $_POST['pd'];
        $prodprice = $_POST['pp'];
        $prodquan = $_POST['pq'];
        $prodcat = $_POST['pc'];

        $sql="INSERT INTO Product(ProductID, Name, Description, Price, Quantity, Category, photo) VALUES (?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../Product_collections.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "sssidss", $prodid, $prodname, $proddesc, $prodprice, $prodquan, $prodcat, $dst);
            mysqli_stmt_execute($stmt);
            header("Location: ../Product_collections.php?addprod=success");
            exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else{
        header("Location: ../Product_collections.php");
        exit();
    }
    
    


                