<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng</title>
    <link rel="stylesheet" href="<?php echo _WEBHOST_TEMPLATES; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo _WEBHOST_TEMPLATES; ?>/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"> -->
</head>

<body>

</body>

</html>
<header class="py-3 mb-3 border-bottom">
    <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">

        <div class="d-flex align-items-center">
            <form class="w-100 me-3" role="search">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>

            <div class="flex-shrink-0 dropdown">
                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="z5668393570626_bdca05a2db69ab3c3c59b6996a13d48e.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="#">Cài đặt</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="?module=auth&action=logout">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>