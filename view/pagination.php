<?php

$account_url = $app_path . 'admin';
$view_register_gv_url = $account_url . '?action=register_gv';

$view_register_sv_url = $account_url . '?action=register_sv';

$view_view_sv_url = $account_url . '?action=view_sv';



?>

<?php for ($num = 1; $num <= $totalPages; $num++) {
    $view_pagination = $view_view_sv_url . '&perpage=' . $item_per_page .'&page=' . $num;
?>
    <a href="<?php echo $view_pagination; ?>"><?php echo $num; ?></a>
<?php } ?>    