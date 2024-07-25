<!-- đăng nhập-->
<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
layouts('header-login');

if (isPost()) {
}

?>
<div class="row">
    <div class="col-4" style="margin: 300px auto;">
        <h2>QUÊN MẬT KHẨU</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Email</label>
                <input name="email" type="email" class="form-control" placeholder="Địa chỉ email">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu mới</label>
                <input name="password" type="password" class="form-control" placeholder="Mật khẩu mới">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Đổi mật khẩu</button>
            <hr>
            <p><a href="?module=auth&action=login">Đăng nhập</a></p>
            <p><a href="?module=auth&action=register">Đăng kí</a></p>
        </form>

    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy giá trị từ form
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashpw = password_hash($password, PASSWORD_DEFAULT);
    // Kiểm tra email đã tồn tại chưa
    $sql = "SELECT id FROM user WHERE email = '$email'";
    if (getRows($sql) != 0) {

        // Tạo mảng dữ liệu để chèn vào cơ sở dữ liệu
        $dataupdate = [
            'password' => $hashpw,
        ];

        // Chèn dữ liệu vào cơ sở dữ liệu
        $updatestatus = update('user', $dataupdate, "email = '$email'");
        var_dump($updatestatus);
    }
}
layouts('footer');
?>