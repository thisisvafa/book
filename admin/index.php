<?php
    session_start();

    $title = "کتاب فروشی";
    require_once "./template/header.php";
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <h2>کتاب ها</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">عنوان</th>
                    <th scope="col">عنوان</th>
                    <th scope="col">عنوان</th>
                    <th scope="col">عنوان</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1,001</td>
                    <td>بيانات</td>
                    <td>عشوائية</td>
                    <td>تثري</td>
                    <td>الجدول</td>
                </tr>
                <tr>
                    <td>1,002</td>
                    <td>تثري</td>
                    <td>مبهة</td>
                    <td>تصميم</td>
                    <td>تنسيق</td>
                </tr>
                <tr>
                    <td>1,003</td>
                    <td>عشوائية</td>
                    <td>غنية</td>
                    <td>قيمة</td>
                    <td>مفيدة</td>
                </tr>
                <tr>
                    <td>1,003</td>
                    <td>معلومات</td>
                    <td>تثري</td>
                    <td>توضيحية</td>
                    <td>عشوائية</td>
                </tr>
                <tr>
                    <td>1,004</td>
                    <td>الجدول</td>
                    <td>بيانات</td>
                    <td>تنسيق</td>
                    <td>قيمة</td>
                </tr>
                <tr>
                    <td>1,005</td>
                    <td>قيمة</td>
                    <td>مبهة</td>
                    <td>الجدول</td>
                    <td>تثري</td>
                </tr>
                <tr>
                    <td>1,006</td>
                    <td>قيمة</td>
                    <td>توضيحية</td>
                    <td>غنية</td>
                    <td>عشوائية</td>
                </tr>
                <tr>
                    <td>1,007</td>
                    <td>تثري</td>
                    <td>مفيدة</td>
                    <td>معلومات</td>
                    <td>مبهة</td>
                </tr>
                <tr>
                    <td>1,008</td>
                    <td>بيانات</td>
                    <td>عشوائية</td>
                    <td>تثري</td>
                    <td>الجدول</td>
                </tr>
                <tr>
                    <td>1,009</td>
                    <td>تثري</td>
                    <td>مبهة</td>
                    <td>تصميم</td>
                    <td>تنسيق</td>
                </tr>
                <tr>
                    <td>1,010</td>
                    <td>عشوائية</td>
                    <td>غنية</td>
                    <td>قيمة</td>
                    <td>مفيدة</td>
                </tr>
                <tr>
                    <td>1,011</td>
                    <td>معلومات</td>
                    <td>تثري</td>
                    <td>توضيحية</td>
                    <td>عشوائية</td>
                </tr>
                <tr>
                    <td>1,012</td>
                    <td>الجدول</td>
                    <td>تثري</td>
                    <td>تنسيق</td>
                    <td>قيمة</td>
                </tr>
                <tr>
                    <td>1,013</td>
                    <td>قيمة</td>
                    <td>مبهة</td>
                    <td>الجدول</td>
                    <td>تصميم</td>
                </tr>
                <tr>
                    <td>1,014</td>
                    <td>قيمة</td>
                    <td>توضيحية</td>
                    <td>غنية</td>
                    <td>عشوائية</td>
                </tr>
                <tr>
                    <td>1,015</td>
                    <td>بيانات</td>
                    <td>مفيدة</td>
                    <td>معلومات</td>
                    <td>الجدول</td>
                </tr>
                </tbody>
            </table>
        </div>
    </main>

<?php
    if(isset($conn)) {
        mysqli_close($conn);
    }
    require_once "./template/footer.php";
?>
