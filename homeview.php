<?php include 'view/header.php'; ?>

<?php   
    $admin_url = $app_path . 'admin';
    $account_url = $app_path . 'account';
    $login_url = $account_url . '?action=login';
    $statistic = $app_path . 'statistic?action=default'
?>
<br><br>
<a href="<?php echo $admin_url; ?>">Admin</a>
<a href="<?php echo $login_url; ?>">Account</a>
<a href="<?php echo $statistic; ?>">Statistic</a>
<?php include 'view/footer.php'; ?>