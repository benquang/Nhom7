<?php include 'view/header.php'; ?>

<?php   
    $account_url = $app_path . 'admin';
    $view_register_gv_url = $account_url . '?action=register_gv';
?>
<a href="<?php echo $view_register_gv_url; ?>">Dang ky giang vien</a>
<?php if (isset($_SESSION['user'])) : ?>
    <h1><?php echo $_SESSION['user']['taikhoan']; ?></h1>
<?php endif; ?>
<?php include 'view/footer.php'; ?>