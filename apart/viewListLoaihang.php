<?php
require 'administrator/element_T/mod/hanghoaCls.php';
$hanghoa = new hanghoa();
if (isset($_GET['reqView'])) {
    $idloaihang = $_GET['reqView'];
    $list_hanghoa = $hanghoa->HanghoaGetbyIdloaihang($idloaihang);
    $s = count($list_hanghoa);
} else {
    $list_hanghoa = $hanghoa->hanghoaGetAll();
    $s = count($list_hanghoa);
}
?>
<div>
    <?php 
    foreach ($list_hanghoa as $s) {
        ?>
        <a href="./index.php?reqHanghoa=<?php echo $s->idhanghoa ?>">
            <div class="itemsHanghoa">
                <img class="imgHanghoa" src="data:image/png;base64,<?php echo $s->hinhanh; ?>">
                Sản phẩm: <?php echo $s->tenhanghoa; ?> <br>
                Giá bán: <?php echo $s->giathamkhao; ?> <br>
            </div>
        </a>
        <?php
    }
    ?>
</div>
