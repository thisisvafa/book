<?php
    $book_ID = $_GET['bookID'];

    require_once "../functions/database_functions.php";
    $conn = db_connect();

    $query = "DELETE FROM books WHERE id = '$book_ID'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "delete data unsuccessfully " . mysqli_error($conn);
        exit;
    }
    header("Location: lists-book.php");
?>