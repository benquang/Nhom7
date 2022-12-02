<?php include '../view/header.php'; ?>
<?php
$loaidetai = filter_input(INPUT_POST, 'id');

?>
<a> <?php echo $loaidetai;?></a>

<?php include '../view/footer.php'; ?>