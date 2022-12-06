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
      <span class="thanhtrencung4">Quang Thắng</span>
      <span class="thanhtrencung4">Welcome!</span>
      <?php
        if ($_SESSION["user"]!= null)
        {
          echo '<a class="thanhtrencung4" href="'. $app_path . "/account/?action=logOut" . '">Log out</a>';
        }
      ?>

    </div>
  </div>
  <div class="bannertruong">
    <div class="bannertruong1">
      <img class="bannertruong_img" src="<?php echo $app_path ?>img/logo-cntt2021(1).png">
      <span class="bannertruong_tentruong">Trường Đại học Sư phạm Kỹ thuật TP. HCM</span>
    </div>
  </div>