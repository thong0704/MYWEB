<div align="center">Cập nhật thuộc tính hàng hóa</div>
<?php 
require '../mod/thuoctinhhanghoaCls.php';
$idthuoctinhhanghoa = $_REQUEST['idthuoctinhhanghoa'];
$thuoctinhhanghoa = new thuoctinhhanghoa();
$gettthhUpdate = $thuoctinhhanghoa->thuoctinhhanghoaGetbyId($idthuoctinhhanghoa);
?>
<?php
require '../mod/thuoctinhCls.php';
$lObj = new thuoctinh();
$list_lh = $lObj->thuoctinhGetAll();
?>
<?php
require '../mod/hanghoaCls.php';
$thObj = new hanghoa();
$list_th = $thObj->hanghoaGetAll();
?>
<div class="title_mod">Thuôcj tính hàng hóa mới</div>
<div class="content_mod">
    <form name="updatethuoctinhhanghoa" id="formupdate" method="post" action="./element_T/mThuoctinhhanghoa/thuoctinhhanghoaAct.php?reqact=updatethuoctinhhanghoa" enctype="multipart/form-data">
        <input type="hidden" name="idthuoctinhhanghoa" value="<?php echo $gettthhUpdate->idthuoctinhhanghoa; ?>"/>
        <table>
            <tr>
                <td>Giá trị</td>
                <td><input type="text" name="giatri" /></td>
            </tr>
            <tr>
                <td>Ghi chú</td>
                <td><input type="text" name="ghichu" /></td>
            </tr>
           
            <tr>
                <td>Chọn thuộc tính:</td>
                <td>
                    <?php
                    foreach($list_lh as $l){
                        ?>
                        <input type="radio" name="idthuoctinh" value="<?php echo $l->idthuoctinh; ?>" <?php if($l->idthuoctinh == $gettthhUpdate->idthuoctinh){echo 'checked';} ?>>
                        <?php echo $l->tenthuoctinh; ?>
                        <img class="iconbutton" src="data:image/png;base64,<?php echo $l->hinhanh; ?>">
                        <br>
                        <?php
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Chọn hàng hóa:</td>
                <td>
                    <?php
                    foreach($list_th as $th){
                        ?>
                        <input type="radio" name="idhanghoa" value="<?php echo $th->idthanghoa; ?>" <?php if($th->idhanghoa == $gettthhUpdate->idhanghoa){echo 'checked';} ?>>
                        <?php echo $th->tenhanghoa; ?>
                        <img class="iconbutton" src="data:image/png;base64,<?php echo $th->hinhanh; ?>">
                        <br>
                        <?php
                    }
                    ?>
                </td>
            </tr>
        </table>
    </form>
</div>
