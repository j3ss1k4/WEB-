<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
layouts('header-admin');

if (!isLogin()) {
    redirect('?module=auth&action=login');
}
?>
<H1>ADMIN</H1>

<?php
layouts('footer');
