<?php
    session_start();

    $title = "تماس با ما";
    require_once "./template/header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <h3>ارتباط با ما</h3>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. </p>
        </div>
        <div class="col-6">
            <form>
                <div class="mb-3">
                    <label for="InputName" class="form-label">نام شما</label>
                    <input type="text" class="form-control" id="InputName">
                </div>
                <div class="mb-3">
                    <label for="InputSubject" class="form-label">موضوع</label>
                    <input type="text" class="form-control" id="InputSubject">
                </div>
                <div class="mb-3">
                    <label for="InputEmail" class="form-label">آدرس ایمیل</label>
                    <input type="email" class="form-control" id="InputEmail">
                </div>
                <div class="mb-3">
                    <label for="InputDesc" class="form-label">پیغام</label>
                    <textarea name="" class="form-control" id="InputDesc" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">ارسال</button>
            </form>
        </div>
    </div>
</div>

<?php
    require_once "./template/footer.php";
?>
