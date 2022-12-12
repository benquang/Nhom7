<?php
include "../view/header.php" ;
include '../view/sidebar.php'; 
?>
<div class="panel" style="margin-left:110px;margin-top:0px;float: left">
  <!-- Tab items -->
  <div class="tabs">
    <div class="tab-item active">
      <i class="tab-icon fas fa-code"></i>

      Thống kê đề tài theo niên khoá
    </div>
    <div class="tab-item">
      <i class="tab-icon fas fa-cog"></i>
      Thống kê đề tài theo chuyên ngành
    </div>
    <div class="tab-item">
      <i class="tab-icon fas fa-plus-circle"></i>
      Thống kê đề tài theo loại đề tài
    </div>

    <div class="line"></div>
  </div>

  <!-- Tab content -->
  <div class="tab-content">
    <div class="tab-pane active" style="margin-bottom: 10px;">
      <h2>Thống kê đề tài theo niên khoá</h2>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method = "POST">
        <input type="hidden" name = "action" value="default">
        <select name = "nienkhoa">
          <?php
            $unique_nienkhoa = $_SESSION["unique_nienkhoa"];
            foreach($unique_nienkhoa as $nienkhoa)
            {
              echo '<option value="' . $nienkhoa['nienkhoa'] .'">' . $nienkhoa['nienkhoa'] . '</option>';
            }
          ?>
        </select>
        <button type="submit">Select</button>
      </form>
      <iframe src="chart0.php" height="700px" width="100%"></iframe>
    </div>
    <div class="tab-pane" style="margin-bottom: 10px;">
      <h2>Thống kê đề tài theo chuyên ngành</h2>
      <iframe src="chart1.php" height="700px" width="100%"></iframe>
    </div>
    <div class="tab-pane" style="margin-bottom: 10px;">
      <h2>Thống kê đề tài theo loại đề tài</h2>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method = "POST">
        <input type="hidden" name = "action" value="default">
        <select name = "loaidetai">
        <?php
            $unique_loaidetai = $_SESSION["unique_loaidetai"];
            foreach($unique_loaidetai as $loaidetai)
            {
              echo '<option value="' . $loaidetai['loaidetai'] .'">' . $loaidetai['loaidetai'] . '</option>';
            }
          ?>
        </select>
        <button type="submit">Select</button>
      </form>
      <iframe src="chart2.php" height="700px" width="100%"></iframe>
    </div>

  </div>
</div>

<style>
    .panel{
        text-align: center;
        border-color: #ddd;
        margin-bottom: 20px;
        background-color: #fff;
        border: 1px solid transparent;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
        box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
        display: block;
        position: relative;
        font-size: 15.3px;
        background-color: rgb(250, 250, 250);
        padding: 5px;
        margin: 5% auto 0;
        max-width: 720px;
    }

    .tabs {

    display: flex;
    position: relative;
    }
    .tabs .line {
    position: absolute;
    left: 0;
    bottom: 0;
    width: 0;
    height: 6px;
    border-radius: 15px;
    background-color: #c23564;
    transition: all 0.2s ease;
    }
    .tab-item {
    min-width: 80px;
    padding: 16px 20px 11px 20px;
    font-size: 20px;
    text-align: center;
    color: #c23564;
    background-color: #fff;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    border-bottom: 5px solid transparent;
    opacity: 0.6;
    cursor: pointer;
    transition: all 0.5s ease;
    }
    .tab-icon {
    font-size: 24px;
    width: 32px;
    position: relative;
    top: 2px;
    }
    .tab-item:hover {
    opacity: 1;
    background-color: rgba(194, 53, 100, 0.05);
    border-color: rgba(194, 53, 100, 0.1);
    }
    .tab-item.active {
    opacity: 1;
    }
    .tab-content {
    padding: 28px 0;
    }
    .tab-pane {
    color: #333;
    display: none;
    }
    .tab-pane.active {
    display: block;
    }
    .tab-pane h2 {
    font-size: 24px;
    margin-bottom: 8px;
    }

</style>

<script type="text/javascript">
    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);

    const tabs = $$(".tab-item");
    const panes = $$(".tab-pane");

    const tabActive = $(".tab-item.active");
    const line = $(".tabs .line");

    // SonDN fixed - Active size wrong size on first load.
    // Original post: https://www.facebook.com/groups/649972919142215/?multi_permalinks=1175881616551340
    requestIdleCallback(function () {
    line.style.left = tabActive.offsetLeft + "px";
    line.style.width = tabActive.offsetWidth + "px";
    });

    tabs.forEach((tab, index) => {
    const pane = panes[index];

    tab.onclick = function () {
        $(".tab-item.active").classList.remove("active");
        $(".tab-pane.active").classList.remove("active");

        line.style.left = this.offsetLeft + "px";
        line.style.width = this.offsetWidth + "px";

        this.classList.add("active");
        pane.classList.add("active");
    };
    });

</script>

