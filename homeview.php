<?php include 'view/header.php'; ?>

<?php   
    $account_url = $app_path . 'admin';
    $view_register_gv_url = $account_url . '?action=register_gv';
    $view_register_sv_url = $account_url . '?action=register_sv';
    $view_view_sv_url = $account_url . '?action=view_sv';
?>
<br><br>
<a href="<?php echo $account_url; ?>">Admin</a>
<a href="<?php echo $view_register_gv_url; ?>">Dang ky giang vien</a>
<a href="<?php echo $view_register_sv_url; ?>">Dang ky sinh vien</a>
<a href="<?php echo $view_view_sv_url; ?>"><h3>Xem thong tin sinh vien</h3></a>
<?php if (isset($_SESSION['user'])) : ?>
    <h1><?php echo $_SESSION['user']['taikhoan']; ?></h1>
<?php endif; ?>
<?php include 'view/footer.php'; ?>