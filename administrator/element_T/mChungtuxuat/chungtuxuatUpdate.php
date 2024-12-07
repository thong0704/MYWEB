<div align="center">Cập nhật chứng từ xuất</div>
<?php 
require '../mod/chungtuxuatCls.php';
$idchungtuxuat = $_REQUEST['idchungtuxuat'];
$chungtuxuat = new chungtuxuat();
$getlhUpdate = $chungtuxuat->chungtuxuatGetbyId($idchungtuxuat);
?>
<?php
 require '../mod/khachhangCls.php';
 $lObj = new khachhang();
 $list_lh = $lObj->khachhangGetAll();
 $l = count($list_lh);
?>
<?php
 require '../mod/hanghoaCls.php';
 $thObj = new hanghoa();
 $list_th = $thObj->hanghoaGetAll();
 $t = count($list_th);
?>
<div class="title_mod">Chứng từ xuất mới</div>
<div class="content_mod">
    <form name="updatechungtuxuat" id="formupdate" method="post" action="./element_T/mChungtuxuat/chungtuxuatAct.php?reqact=updatechungtuxuat" enctype="multipart/form-data">
        <input type="hidden" name="idchungtuxuat" value="<?php echo $getlhUpdate->idchungtuxuat; ?>"/>
        
        <table>
            <tr>
                <td>Tên chứng từ xuất</td>
                <td><input type="text" name="tenchungtuxuat" value="<?php echo $getlhUpdate->tenchungtuxuat; ?>" /></td>
            </tr>
            <tr>
                <td>Ngày lập</td>
                <td><input type="date" name="ngaylap" value="<?php echo $getlhUpdate->ngaylap; ?>" /></td>
            </tr>
            <tr>
                <td>Tổng tiền</td>
                <td><input type="number" name="tongtien" value="<?php echo $getlhUpdate->tongtien; ?>" /></td>
            </tr>
            <tr>
                <td>Chọn khách hàng</td>
                <td>
                    <?php
                    foreach ($list_lh as $lh) {
                        ?>
                        <input type="radio" name="idkhachhang" value="<?php echo $lh->idkhachhang; ?>" <?php if ($getlhUpdate->idkhachhang == $lh->idkhachhang) echo 'checked'; ?>>
                        <?php echo $lh->hoten; ?>
                        <br>
                        <?php
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Chọn hàng hóa</td>
                <td>
                    <?php
                    foreach ($list_th as $th) {
                        ?>
                        <input type="radio" name="idhanghoa" value="<?php echo $th->idhanghoa; ?>" <?php if ($getlhUpdate->idhanghoa == $th->idhanghoa) echo 'checked'; ?>>
                        <?php echo $th->tenhanghoa; ?>
                        <img class="iconbutton" src="data:image/png;base64,<?php echo $th->hinhanh; ?>">
                        <br>
                        <?php
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Cập Nhật" /></td>
                <td><input type="reset" value="Làm lại" /><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
    <hr/>
</div>
