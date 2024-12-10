<script>
    function goBack(){
        window.history.back();

    }
</script>
<?php
    require './administrator/element_T/mod/hanghoaCls.php';
    $hanghoa = new hanghoa();
    if(isset($_GET['reqHanghoa'])){
        $idhanghoa = $_GET['reqHanghoa'];
        $obj = $hanghoa->hanghoaGetbyId($idhanghoa);
    }
?>
<div class="itemsViewHanghoa">
    <center>
        <img class="imgViewHanghoa" src="data:image/png;base64,<?php echo $obj->hinhanh ;?>"><br>
        <div class="product-details">
            <span>Sản phẩm:</span> <?php echo $obj->tenhanghoa; ?> <br>
        </div>
        <div class="product-description">
            <span>Mô tả:</span> <?php echo $obj->mota; ?> <br>
        </div>
        <div class="product-price">
            <span>Giá bán:</span> <?php echo $obj->giathamkhao; ?> <br>
        </div>
        <button onclick="goBack()">Go back</button>
    </center>
</div>
