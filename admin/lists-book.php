<?php
    session_start();
//    require_once "./functions/admin.php";
    $title = "List";
    require_once "./template/header.php";
    require "../functions/database_functions.php";
    $conn = db_connect();

        $query = "SELECT * FROM books ORDER BY date DESC";
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo "Can't add new data " . mysqli_error($conn);
            exit;
        }
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 my-3 px-md-4">
        <h2>کتاب ها</h2>

        <table class="table table-striped table-sm>
            <thead>
                <th>#</th>
                <th>نام کتاب</th>
                <th>نویسنده</th>
                <th>تصویر</th>
                <th>قیمت</th>
                <th>تاریخ</th>
            </thead>
            <tbody>
            <?php  foreach($result as $book) {?>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author']; ?></td>
                <td><?php echo $book['image']; ?></td>
                <td><?php echo $book['price']; ?></td>
                <td><?php echo $book['date']; ?></td>
            <?php } ?>
            </tbody>
        </table>

    </main>

<?php
    if(isset($conn)) {
        mysqli_close($conn);
    }
    require_once "./template/footer.php";
?>
