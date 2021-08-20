<?php
    function db_connect(){
        $conn = mysqli_connect("localhost", "root", "", "book_store_uni");
        if(!$conn){
            echo "Can't connect database " . mysqli_connect_error($conn);
            exit;
        }
        return $conn;
    }

    function select4LatestBook($conn){
        $query = "SELECT id, title, author, description, image, price  FROM books ORDER BY date DESC LIMIT 4  ";
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo "Can't retrieve data " . mysqli_error($conn);
            exit;
        }
        return $result;
    }

    function LatestAllBook($conn){
        $query = "SELECT id, title, author, description, image, price  FROM books ORDER BY date DESC ";
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo "Can't retrieve data " . mysqli_error($conn);
            exit;
        }
        return $result;
    }

    function getbookprice($id){
        $conn = db_connect();
        $query = "SELECT price FROM books WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo "get book price failed! " . mysqli_error($conn);
            exit;
        }
        $row = mysqli_fetch_assoc($result);
        return $row['price'];
    }

    function getBookByID($conn, $id){
        $query = "SELECT title, author, price FROM books WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo "Can't retrieve data " . mysqli_error($conn);
            exit;
        }
        return $result;
    }
?>