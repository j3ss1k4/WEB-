<!-- đăng nhập-->
<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
layouts('header-login');

if (isPost()) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!empty(trim($email)) && !empty(trim($password))) {
        $adminquery = oneRaw("SELECT password, email FROM user WHERE id = 1");
        $userquery = oneRaw("SELECT password, id FROM user WHERE email = '$email'");
        if ($adminquery['email'] == $email && $adminquery['password'] == $password) {
            $tokenLogin = sha1(uniqid() . time());
            $dataInsert = [
                'user_id' => $userquery['id'],
                'token' => $tokenLogin,
                'creat_at' => date('Y-m-d H:i:s')
            ];
            $insertstatus = insert('tokenlogin', $dataInsert);
            if ($insertstatus) {
                setSession('loginToken', $tokenLogin);
                redirect('?module=auth&action=admin');
            }
        } else if (!empty($userquery)) {
            $passwordhash = $userquery['password'];
            $userid = $userquery['id'];
            if (password_verify($password, $passwordhash)) {
                $tokenLogin = sha1(uniqid() . time());
                $dataInsert = [
                    'user_id' => $userid,
                    'token' => $tokenLogin,
                    'creat_at' => date('Y-m-d H:i:s')
                ];
                $insertstatus = insert('tokenlogin', $dataInsert);
                if ($insertstatus) {
                    setSession('loginToken', $tokenLogin);
                    redirect('?module=home&action=dashboard');
                }
            } else {
                echo 'Sai mật khẩu';
            }
        } else {
            echo 'Email không tồn tại';
        }
    }
}

?>
<div class="row">
    <div class="col-4" style="margin: 300px auto;">
        <h2>ĐĂNG NHẬP</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Email</label>
                <input name="email" type="email" class="form-control" placeholder="Địa chỉ email">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input name="password" type="password" class="form-control" placeholder="Mật khẩu">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
            <hr>
            <p><a href="?module=auth&action=forgot">Quên mật khẩu</a></p>
            <p><a href="?module=auth&action=register">Đăng kí</a></p>
        </form>

    </div>
</div>

<?php
layouts('footer-login');
?>