<?php
    session_start();

    $title = "درباره ما";
    require_once "./template/header.php";
    require_once "./functions/database_functions.php";
    $conn = db_connect();
    $row = select4LatestBook($conn);
?>

    <div class="container marketing">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

            </div>
        </div>

    </div>

<?php
if(isset($conn)) {
    mysqli_close($conn);
}
require_once "./template/footer.php";
?>
