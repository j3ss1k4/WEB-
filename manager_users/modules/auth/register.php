<!-- đăng nhập-->
<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
layouts('header-login');
?>
<div class="row">
    <div class="col-4" style="margin: 200px auto;">
        <h2>ĐĂNG KÝ</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Họ tên</label>
                <input name="fullname" type="fullname" class="form-control" placeholder="Họ và tên">
            </div>
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input name="phone" type="phone" class="form-control" placeholder="Số điện thoại">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input name="email" type="email" class="form-control" placeholder="Địa chỉ email">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input name="password" type="password" class="form-control" placeholder="Mật khẩu">
            </div>
            <div class="form-group">
                <label for="">Nhập lại mật khẩu</label>
                <input name="password_confirm" type="password" class="form-control" placeholder="Nhập lại mật khẩu">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
            <hr>
            <p><a href="?module=auth&action=login">Đăng nhập</a></p>
        </form>

    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy giá trị từ form
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Kiểm tra email đã tồn tại chưa
    $sql = "SELECT id FROM user WHERE email = '$email'";
    if (getRows($sql) == 0) {
        // Tạo activeToken và băm mật khẩu
        $activeToken = sha1(uniqid() . time());
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Tạo mảng dữ liệu để chèn vào cơ sở dữ liệu
        $dataInsert = [
            'fullname' => $fullname,
            'phone' => $phone,
            'email' => $email,
            'password' => $hashedPassword,
            'activeToken' => $activeToken,
            'creat_at' => date('Y-m-d H:i:s')
        ];

        // Chèn dữ liệu vào cơ sở dữ liệu
        $insertstatus = insert('user', $dataInsert);
        var_dump($insertstatus);
    }
}
layouts('footer-login');
?>