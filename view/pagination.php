<?php

$account_url = $app_path . 'admin';
$view_register_gv_url = $account_url . '?action=register_gv';

$view_register_sv_url = $account_url . '?action=register_sv';

$view_view_sv_url = $account_url . '?action=view_sv';

?>
    
<?php 
if ($current_page > 2){
    $first_page = 1;
    $view_first_page = $view_view_sv_url . '&perpage=' . $item_per_page .'&page=' . $first_page;
    ?>
<a href="<?php echo $view_first_page; ?>">First</a>
<?php } ?>
<?php for ($num = 1; $num <= $totalPages; $num++) {?>
    <?php if ($num != $current_page) { 
    $view_pagination = $view_view_sv_url . '&perpage=' . $item_per_page .'&page=' . $num;
    ?>
    <?php if ($num > $current_page - 2 && $num < $current_page + 2) {?>
    <a href="<?php echo $view_pagination; ?>"><?php echo $num; ?></a>
    <?php } ?>
    <?php } else{ ?>
    <strong><?=$num?></strong>
    <?php } ?>
<?php } ?>    
<?php 
if ($current_page < $totalPages - 2){
    $last_page = $totalPages;
    $view_last_page = $view_view_sv_url . '&perpage=' . $item_per_page .'&page=' . $last_page;
?>
<a href="<?php echo $view_last_page; ?>">Last</a>
<?php } ?>