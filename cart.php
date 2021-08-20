<?php
    session_start();
    require_once "./functions/database_functions.php";
    require_once "./functions/cart_functions.php";

    // book_isbn got from form post method, change this place later.
    if(isset($_POST['book_id'])){
        $book_id = $_POST['book_id'];
    }

    if(isset($book_id)){
        // new iem selected
        if(!isset($_SESSION['cart'])){
            // $_SESSION['cart'] is associative array that book_id => qty
            $_SESSION['cart'] = array();

            $_SESSION['total_items'] = 0;
            $_SESSION['total_price'] = '0.00';
        }

        if(!isset($_SESSION['cart'][$book_id])){
            $_SESSION['cart'][$book_id] = 1;
        } elseif(isset($_POST['cart'])){
            $_SESSION['cart'][$book_id]++;
            unset($_POST);
        }
    }

    // if save change button is clicked , change the qty of each book_id
    if(isset($_POST['save_change'])){
        foreach($_SESSION['cart'] as $id =>$qty){
            if($_POST[$id] == '0'){
                unset($_SESSION['cart']["$id"]);
            } else {
                $_SESSION['cart']["$id"] = $_POST["$id"];
            }
        }
    }

    // print out header here
    $title = "Your shopping cart";
    require "./template/header.php";

    if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
        $_SESSION['total_price'] = total_price($_SESSION['cart']);
        $_SESSION['total_items'] = total_items($_SESSION['cart']);
        ?>

        <main class="container">
            <div class="row">
                <div class="col-12">
                    <form action="cart.php" method="post">
                        <div class="card">
                            <table class="table">
                                <tr>
                                    <th>محصول</th>
                                    <th>قیمت</th>
                                    <th>تعداد</th>
                                    <th>مجموع</th>
                                </tr>
                                <?php
                                foreach($_SESSION['cart'] as $id => $qty){
                                    $conn = db_connect();
                                    $book = mysqli_fetch_assoc(getBookByID($conn, $id));
                                    ?>
                                    <tr>
                                        <td><?php echo $book['title'] . " اثر از " . $book['author']; ?></td>
                                        <td><?php echo "$" . $book['price']; ?></td>
                                        <td><input type="text" value="<?php echo $qty; ?>" size="2" name="<?php echo $id; ?>"></td>
                                        <td><?php echo "$" . $qty * $book['price']; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th><?php echo $_SESSION['total_items']; ?></th>
                                    <th><?php echo "تومان" . $_SESSION['total_price']; ?></th>
                                </tr>
                            </table>
                            <input type="submit" class="btn btn-primary" name="save_change" value="بروز رسانی">
                        </div
                    </form>
                    <br/><br/>
                    <a href="checkout.php" class="btn btn-primary">تسویه حساب</a>
                    <a href="products.php" class="btn btn-primary">ادامه خرید</a>
                </div>
            </div>
        </main>

        <?php
    } else {
        echo "<p class=\"text-warning\">Your cart is empty! Please make sure you add some books in it!</p>";
    }
    if(isset($conn)){ mysqli_close($conn); }
    require_once "./template/footer.php";
?>