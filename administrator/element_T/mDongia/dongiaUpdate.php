<div align="center">Cập nhật đơn giá</div>
<?php 
require '../mod/dongiaCls.php';
require '../mod/hanghoaCls.php'; // Bao gồm tệp để lấy danh sách hàng hóa

$iddongia = $_REQUEST['iddongia'];
$dongia = new dongia();
$getdongia = $dongia->dongiaGetbyId($iddongia);

// Khởi tạo đối tượng và lấy danh sách hàng hóa
$hanghoa = new hanghoa();
$list_lh = $hanghoa->hanghoaGetAll();
?>
    <div class="title_mod">Đơn giá mới</div>
    <div class="content_mod">
        <form name="updatedongia" id="formupdate" method="post" action="./element_T/mDongia/dongiaAct.php?reqact=updatedongia" enctype="multipart/form-data">
            <input type="hidden" name="iddongia" value="<?php echo $getdongia->iddongia; ?>"/>
            <table>
                <tr>
                    <td>Giá trị đơn giá</td>
                    <td><input type="number" name="giatridongia" value="<?php echo $getdongia->giatridongia; ?>" /></td>
                </tr>
                <tr>
                    <td>Áp dụng</td>
                    <td>Áp dụng<input type="radio" name="apdung" value="1" <?php if ($getdongia->apdung == 1) echo 'checked'; ?>/>
                        không áp dụng<input type="radio" name="apdung" value="0" <?php if ($getdongia->apdung == 0) echo 'checked'; ?>/>
                    </td>
                </tr>
                <tr>
                    <td>Ngày bắt đầu</td>
                    <td><input type="date" name="ngaybatdau" value="<?php echo $getdongia->ngaybatdau; ?>" /></td>
                </tr>
                <tr>
                    <td>Ngày kết thúc</td>
                    <td><input type="date" name="ngayketthuc" value="<?php echo $getdongia->ngayketthuc; ?>" /></td>
                </tr>
                <tr>
                    <td>Chọn hàng hóa</td>
                    <td>
                        <?php
                        foreach ($list_lh as $lh) {
                            ?>
                            <input type="radio" name="idhanghoa" value="<?php echo $lh->idhanghoa; ?>" <?php if ($getdongia->idhanghoa == $lh->idhanghoa) echo 'checked'; ?>>
                            <?php echo $lh->tenhanghoa; ?>
                            <img class="iconbutton" src="data:image/png;base64,<?php echo $lh->hinhanh; ?>">
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
    </div>
    <hr/>
</div>
