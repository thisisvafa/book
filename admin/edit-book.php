<?php
    session_start();
//    require_once "./functions/admin.php";
    $title = "ویرایش محصول";
    require_once "./template/header.php";
    require "../functions/database_functions.php";
    $conn = db_connect();

    if(isset($_GET['bookID'])){
        $book_ID = $_GET['bookID'];
    } else {
        echo "Empty query!";
        exit;
    }

    if(!isset($book_ID)){
        echo "Empty isbn! check again!";
        exit;
    }

    // get book data
    $query = "SELECT * FROM books WHERE id = '$book_ID'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    $row = mysqli_fetch_assoc($result);
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 my-3 px-md-4">
        <h2>کتاب ها</h2>
        <form method="post" action="update-book.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <div class="mb-3">
                <label for="InputTitle" class="form-label">نام کتاب</label>
                <input type="text" name="title" value="<?php echo $row['title'];?>" class="form-control" id="InputTitle">
            </div>
            <div class="mb-3">
                <label for="InputAuthor" class="form-label">نام نویسنده</label>
                <input type="text" name="author" value="<?php echo $row['author'];?>" class="form-control" id="InputAuthor">
            </div>
            <div class="mb-3">
                <label for="InputPrice" class="form-label">قیمت کتاب</label>
                <input type="text" name="price" value="<?php echo $row['price'];?>" class="form-control" id="InputPrice">
            </div>
            <div class="mb-3">
                <label for="InputDesc" class="form-label">توضیحات</label>
                <textarea name="description" class="form-control" id="InputDesc" cols="30" rows="10"><?php echo $row['description'];?></textarea>
            </div>
            <div class="mb-3">
                <label for="InputImage" class="form-label">عکس</label>
                <input type="file" name="image" class="form-control" id="InputImage">
                <img src="../images/<?php echo $row['image'];?>" class="my-3 img-fluid" alt="">
            </div>
            <button type="submit" name="save_change" class="btn btn-primary">انتشار</button>
        </form>
    </main>

<?php
    if(isset($conn)) {
        mysqli_close($conn);
    }
    require_once "./template/footer.php";
?>
