<?php
require './administrator/element_T/mod/thuonghieuCls.php';
?>



<?php
// Hiển thị danh sách thương hiệu
$thuonghieuObj = new thuonghieu();
$list_thuonghieu = $thuonghieuObj->thuonghieuGetAll();
foreach ($list_thuonghieu as $thuonghieu) {
    ?>
    <a href="./index.php?reqThuonghieu=<?php echo $thuonghieu->idthuonghieu; ?>">
        <div class="itemsmenu">
            <img class="imgmenu" src="data:image/png;base64,<?php echo $thuonghieu->hinhanh; ?>">
            <?php echo $thuonghieu->tenthuonghieu; ?>
        </div>
    </a>
    <?php
}
?>
