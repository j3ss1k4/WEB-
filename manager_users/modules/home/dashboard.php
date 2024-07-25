<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
layouts('header');

if (!isLogin()) {
    redirect('?module=auth&action=login');
}
?>
<H1>Dashboard</H1>
<p>Chúc mừng bạn đăng nhập thành công!</p>
<?php
layouts('footer');
