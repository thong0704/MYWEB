<div align="center">Cập nhật chứng từ nhập</div>
<?php 
require '../mod/chungtunhapCls.php';
$idchungtunhap = $_REQUEST['idchungtunhap'];
$chungtunhap = new chungtunhap();
$getlhUpdate = $chungtunhap->chungtunhapGetbyId($idchungtunhap);
?>
<?php
 require '../mod/userCls.php';
 $lObj = new user();
 $list_lh = $lObj->UserGetAll();
 $l = count($list_lh);
?>
<?php
 require '../mod/hanghoaCls.php';
 $thObj = new hanghoa();
 $list_th = $thObj->hanghoaGetAll();
 $t = count($list_th);
?>
<div class="title_mod">Chứng từ nhập mới</div>
<div class="content_mod">
    <form name="updatechungtunhap" id="formupdate" method="post" action="./element_T/mChungtunhap/chungtunhapAct.php?reqact=updatechungtunhap" enctype="multipart/form-data">
        <input type="hidden" name="idchungtunhap" value="<?php echo $getlhUpdate->idchungtunhap; ?>"/>
        
        <table>
            <tr>
                <td>Tên chứng từ</td>
                <td><input type="text" name="tenchungtu" value="<?php echo $getlhUpdate->tenchungtu; ?>" /></td>
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
                <td>Chọn nhân viên</td>
                <td>
                    <?php
                    foreach ($list_lh as $lh) {
                        ?>
                        <input type="radio" name="iduser" value="<?php echo $lh->iduser; ?>" <?php if ($getlhUpdate->iduser == $lh->iduser) echo 'checked'; ?>>
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
