<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Mister's Imagine Toystore</title>
  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="<?php echo $app_path ?>css/css_cnpm.css">
</head>

<body>
    <!--================Header Menu Area =================-->
  <!---->
  <div class="thanhtrencung">
    <div class="thanhtrencung1">
      <div class="thanhtrencung2">
        <span class="thanhtrencung3">Nhóm 19 - Đăng Ký Đề Tài</span>
      </div>
      <?php if(isset($_SESSION['user'])):?>
        <a href="<?php echo $app_path ?>account?action=logout" 
            class="thanhtrencung4" style="font-weight:700;margin-left: 20px">Logout</a>
        <span class="thanhtrencung4" style="margin-left:5px"><?php echo $_SESSION['user']; ?></span>
        <span class="thanhtrencung4">Welcome!</span>
      <?php else:?>
        <a  href="<?php echo $app_path ?>account" 
            class="thanhtrencung4" style="font-weight:700;margin-left: 20px;cursor: pointer;">Login</a>
        <span class="thanhtrencung4" style="margin-left:5px">Guest</span>
        <span class="thanhtrencung4">Hi!</span>
      <?php endif; ?>

    </div>
  </div>
  <div class="bannertruong">
    <div class="bannertruong1">
      <a href="<?php echo $app_path ?>" class="bannertruong_img"><img style="margin-top:10px" src="<?php echo $app_path ?>img/logo-cntt2021(1).png"></a>
      <a href="<?php echo $app_path . 'admin'; ?>" style="float:right;line-height: 80px;margin-left:20px">Admin</a>
      <span class="bannertruong_tentruong">Trường Đại học Sư phạm Kỹ thuật TP. HCM</span>

    </div>
  </div>