<?php include 'view/header.php'; ?>

<?php   
    $account_url = $app_path . 'admin';
    $view_register_gv_url = $account_url . '?action=register_gv';

    $view_register_sv_url = $account_url . '?action=register_sv';

    $view_view_sv_url = $account_url . '?action=view_sv';

    //tam thoi
    $item_per_page = 1;

    $view_view_sv_pagination_url = $view_view_sv_url . '&perpage=' . $item_per_page .'&page=1';


?>

<a href="<?php echo $view_register_gv_url; ?>"><h3>Dang ky giang vien</h3></a>

<a href="<?php echo $view_register_sv_url; ?>"><h3>Dang ky sinh vien</h3></a>

<a href="<?php echo $view_view_sv_pagination_url; ?>"><h3>Xem thong tin sinh vien</h3></a>
<?php if (isset($_SESSION['user'])) : ?>
    <h1><?php echo $_SESSION['user']['taikhoan']; ?></h1>
<?php endif; ?>
<?php include 'view/footer.php'; ?>