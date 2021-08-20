<?php

    // edit book
    if(!isset($_POST['save_change'])){
        echo "Something wrong!";
        exit;
    }

    $id = trim($_POST['id']);
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $desc = trim($_POST['description']);
    $price = floatval(trim($_POST['price']));
    $date = date("Y-m-d H:i:s");

    if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
        $image = $_FILES['image']['name'];
        $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
        $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "../images/";
        $uploadDirectory .= $image;
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
    }

    require_once("../functions/database_functions.php");
    $conn = db_connect();

    $query = "UPDATE books SET  
            title = '$title', 
            author = '$author', 
            description = '$desc', 
            price = '$price',
            date = '$date'";
    if(isset($image)){
        $query .= ", image='$image' WHERE id = '$id'";
    } else {
        $query .= " WHERE id = '$id'";
    }
    // two cases for fie , if file submit is on => change a lot
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't update data " . mysqli_error($conn);
        exit;
    } else {
        header("Location: edit-book.php?bookID=$id");
    }
?>