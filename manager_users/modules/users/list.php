<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
layouts('header');

if (!isLogin()) {
    redirect('?module=auth&action=login');
}
$listusers = getRaw("SELECT * FROM user ORDER BY id");

?>
<div class="container">
    <hr>
    <h2>Quản lí người dùng</h2>
    <table class="table table-bordered">
        <thead>
            <th>STT</th>
            <th>Tên</th>
            <th>số điện thoại</th>
            <th>Email</th>
        </thead>
        <tbody>
            <?php
            if (!empty($listusers)) :
                $cnt = 0;
                foreach ($listusers as $item) :
                    $cnt++;

            ?>
                    <tr>
                        <td><?php echo $cnt ?></td>
                        <td><?php echo $item['fullname'] ?></td>
                        <td><?php echo $item['phone'] ?></td>
                        <td><?php echo $item['email'] ?></td>
                    </tr>
            <?php
                endforeach;
            endif;
            ?>
        </tbody>
    </table>
</div>

<?php
layouts('footer');
