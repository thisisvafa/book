<?php
    session_start();

    $title = "کتاب فروشی";
    require_once "./template/header.php";
    require "../functions/database_functions.php";
    $conn = db_connect();

    $query = "SELECT count(*) FROM books";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row["count(*)"];
    if(!$result){
        echo "Can't add new data " . mysqli_error($conn);
        exit;
    }
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 my-4 px-md-4">

        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header">تعداد کتاب های موجود</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $count; ?></h5>
            </div>
        </div>

    </main>

<?php
    if(isset($conn)) {
        mysqli_close($conn);
    }
    require_once "./template/footer.php";
?>
