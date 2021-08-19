<?php
    session_start();
    $book_ID = $_GET['bookID'];
    // connecto database
    require_once "./functions/database_functions.php";
    $conn = db_connect();

    $query = "SELECT * FROM books WHERE id = '$book_ID'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }

    $row = mysqli_fetch_assoc($result);
    if(!$row){
        echo "Empty book";
        exit;
    }

    $title = $row['title'];
    require "./template/header.php";
?>

    <main class="container">
        <p class="lead" style="margin: 25px 0"><a href="products.php">محصولات</a> > <?php echo $row['title']; ?></p>
        <div class="row">
            <div class="col-md-3 text-center">
                <img class="img-responsive img-thumbnail" src="images/<?php echo $row['image']; ?>">
            </div>
            <div class="col-md-6">
                <h4>Book Description</h4>
                <p><?php echo $row['description']; ?></p>
                <h4>مشخصات کتاب</h4>
                <table class="table">
                    <?php foreach($row as $key => $value){
                        if($key == "description" || $key == "image" || $key == "title"){
                            continue;
                        }
                        switch($key){
                            case "id":
                                $key = "شماره محصول";
                                break;
                            case "title":
                                $key = "عنوان کتاب";
                                break;
                            case "author":
                                $key = "نویسنده";
                                break;
                            case "price":
                                $key = "قیمت";
                                break;
                            case "date":
                                $key = "تاریخ";
                                break;
                        }
                        ?>
                        <tr>
                            <td><?php echo $key; ?></td>
                            <td><?php echo $value; ?></td>
                        </tr>
                        <?php
                    }
                    if(isset($conn)) {mysqli_close($conn); }
                    ?>
                </table>
            </div>
            <div class="col-md-2 text-center">
                <form method="post" action="cart.php">
                    <input type="hidden" name="bookisbn" value="<?php echo $book_ID;?>">
                    <input type="submit" value="افزودن به سبد خرید" name="cart" class="btn btn-primary">
                </form>
            </div>
        </div>
    </main>

<?php
    require "template/footer.php";
?>