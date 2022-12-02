<?php include '../view/header.php'; ?>
<?php   
    $admin_url = $app_path . 'admin';
    $view_regist_gv_url = $admin_url . '?action=register_gv';
    $view_regist_sv_url = $admin_url . '?action=register_sv';
?>

  <div class="thanhtitle"  style="margin-bottom: 20px;">
    <div class="thanhtitle1">
    <a href="<?php echo $admin_url; ?>" class="thanhtitle2">Admin</a>
    </div>
    <div class="thanhtitle1">
      <span class="thanhtitle3">Admin / Admin</span>
    </div>
  </div>

  <div class="me">
  <div class="men">
    <div class="men05">
    <div class="men1">
      <h3 class="men2">Danh mục</h3>
      <ul class="men3">
        <li class="men4">
          <a class="men5">
            <span class="men8">
              <span class="men9">THÔNG BÁO</span>
            </span>
          </a>
        </li>
        <li class="men4" style="margin-top: 12px;">
          <a class="men5">
            <span class="men8">
              <span class="men9">ĐỀ TÀI</span>
            </span>
          </a>
        </li>
        <li class="men4" style="margin-top: 12px;">
          <a href="<?php echo $view_regist_gv_url ?>" class="men5">
            <span class="men8">
              <span class="men9">GIẢNG VIÊN</span>
            </span>
          </a>
        </li>
        <li class="men4" style="margin-top: 12px;">
          <a href="<?php echo $view_regist_sv_url ?>" class="men5">
            <span class="men8">
              <span class="men9">SINH VIÊN</span>
            </span>
          </a>
        </li>
        <li class="men4" style="margin-top: 12px;">
          <a class="men5">
            <span class="men8">
              <span class="men9">Thống kê</span>
            </span>
          </a>
        </li>
      </ul>
    </div>
  </div>
<?php include '../view/footer.php'; ?>