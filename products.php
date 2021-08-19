<?php
    session_start();

    $title = "محصولات کتاب";
    require_once "./template/header.php";
    require_once "./functions/database_functions.php";
    $conn = db_connect();
    $row = LatestAllBook($conn);
?>


    <main class="container">
        <div class="row">

            <?php foreach($row as $book) { ?>

            <div class="col-md-4">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-0"><?php echo $book['title']; ?></h3>
                        <div class="mb-1 text-muted"><?php echo $book['author']; ?></div>
                        <p class="card-text mb-auto"><?php echo substr_replace($book['description'], " ...", 50); ?></p>
                        <strong class="d-inline-block mb-2 text-success"><?php echo number_format($book['price']); ?> تومان</strong>
                        <a href="product_single.php?bookID=<?php echo $book['id']; ?>" class="stretched-link">مشاهده</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="images/<?php echo $book['image']; ?>" class="bd-placeholder-img product-image" alt="<?php echo $book['title']; ?>">
                    </div>
                </div>
            </div>

            <?php } ?>

        </div>
    </main>

<?php
    if(isset($conn)) {
        mysqli_close($conn);
    }
    require_once "./template/footer.php";
?>