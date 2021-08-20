<?php
    session_start();
//    require_once "./functions/admin.php";
    $title = "نمایش محصولات";
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

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>کتاب ها</h2>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>شماره محصول</th>
            <th>تصویر</th>
            <th>نام کتاب</th>
            <th>نویسنده</th>
            <th>قیمت</th>
            <th>تاریخ</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($result as $book) {?>
            <tr>
                <td><?php echo $book['id']; ?></td>
                <td>
                    <img src="../images/<?php echo $book['image']; ?>" width="150" class="img-fluid" alt="">
                </td>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author']; ?></td>
                <td><?php echo number_format($book['price']); ?> تومان</td>
                <td><?php echo $book['date']; ?></td>
                <td>
                    <div class="d-grid gap-2">
                        <a href="delete-book.php?bookID=<?php echo $book['id']; ?>" class="btn btn-danger">حذف</a>
                        <a href="edit-book.php?bookID=<?php echo $book['id']; ?>" class="btn btn-primary">ویرایش</a>
                    </div>
                </td>
            </tr>
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
