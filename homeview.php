<?php include 'view/header.php'; ?>

<?php   
    $admin_url = $app_path . 'admin';
    $account_url = $app_path . 'account';
    $login_url = $account_url . '?action=login';
?>
<br><br>
<a href="<?php echo $admin_url; ?>">Admin</a>
<a href="<?php echo $login_url; ?>">Account</a>
<?php include 'view/footer.php'; ?>