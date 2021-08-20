<?php
    session_start();
//    require_once "./functions/admin.php";
    $title = "افزودن محصول جدید";
    require_once "./template/header.php";
    require "../functions/database_functions.php";
    $conn = db_connect();

    if(isset($_POST['add'])){
        $id = rand(10000,99999);

        $title = trim($_POST['title']);
        $title = mysqli_real_escape_string($conn, $title);

        $author = trim($_POST['author']);
        $author = mysqli_real_escape_string($conn, $author);

        $desc = trim($_POST['description']);
        $desc = mysqli_real_escape_string($conn, $desc);

        $price = floatval(trim($_POST['price']));
        $price = mysqli_real_escape_string($conn, $price);

        $date = date("Y-m-d H:i:s");

        if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
            $image = $_FILES['image']['name'];
            $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
            $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "../images/";
            $uploadDirectory .= $image;
            move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
        }

        $query = "INSERT INTO books VALUES ('". $id ."','" . $title . "', '" . $author . "','" . $desc . "', '" . $image . "',  '" . $price . "', '" . $date . "')";
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo "Can't add new data " . mysqli_error($conn);
            exit;
        } else {
            header("Location: add-book.php");
        }
    }
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 my-3 px-md-4">
        <h2>کتاب ها</h2>
        <form method="post" action="add-book.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="InputTitle" class="form-label">نام کتاب</label>
                <input type="text" name="title" class="form-control" id="InputTitle">
            </div>
            <div class="mb-3">
                <label for="InputAuthor" class="form-label">نام نویسنده</label>
                <input type="text" name="author" class="form-control" id="InputAuthor">
            </div>
            <div class="mb-3">
                <label for="InputPrice" class="form-label">قیمت کتاب</label>
                <input type="text" name="price" class="form-control" id="InputPrice">
            </div>
            <div class="mb-3">
                <label for="InputDesc" class="form-label">توضیحات</label>
                <textarea name="description" class="form-control" id="InputDesc" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="InputImage" class="form-label">عکس</label>
                <input type="file" name="image" class="form-control" id="InputImage">
            </div>
            <button type="submit" name="add" class="btn btn-primary">انتشار</button>
        </form>
    </main>

<?php
    if(isset($conn)) {
        mysqli_close($conn);
    }
    require_once "./template/footer.php";
?>
