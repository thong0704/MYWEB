<div align="center">Quản lý hàng hóa</div>
<hr>
<?php
 require './element_T/mod/loaihangCls.php';
 $lObj = new loaihang();
 $list_lh = $lObj->loaihangGetAll();
 $l = count($list_lh);
?>
<?php
 require './element_T/mod/thuonghieuCls.php';
 $thObj = new thuonghieu();
 $list_th = $thObj->thuonghieuGetAll();
 $t = count($list_th);
?>
<div><h3>Thêm hàng hóa</h3></div>
<div>
    <form name="newhanghoa" id="formaddhanghoa" method="post" action="./element_T/mHanghoa/hanghoaAct.php?reqact=addnew" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Tên hàng hóa</td>
                <td><input type="text" name="tenhanghoa" /></td>
            </tr>
            <tr>
                <td>Giá tham khảo</td>
                <td><input type="number" name="giathamkhao" /></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><input type="text" name="mota" /></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="fileimage" /></td>
            </tr>
            <tr>
                <td>Chọn loại hàng</td>
                <td>
                    <?php
                    foreach ($list_lh as $lh) {
                        ?>
                        <input type="radio" name="idloaihang" value="<?php echo $lh->idloaihang; ?>">
                        <?php echo $lh->tenloaihang; ?>
                        <img class="iconbutton" src="data:image/png;base64,<?php echo $lh->hinhanh; ?>">
                        <br>
                        <?php
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Chọn thương hiệu</td>
                <td>
                    <?php
                    foreach ($list_th as $th) {
                        ?>
                        <input type="radio" name="idthuonghieu" value="<?php echo $th->idthuonghieu; ?>">
                        <?php echo $th->tenthuonghieu; ?>
                        <img class="iconbutton" src="data:image/png;base64,<?php echo $th->hinhanh; ?>">
                        <br>
                        <?php
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Thêm" /></td>
                <td><input type="reset" value="Làm lại" /><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
    <hr/>
</div>
<?php
 require './element_T/mod/hanghoaCls.php';
 $hhObj = new hanghoa();
 $list_hh = $hhObj->hanghoaGetAll();
 $l = count($list_hh);
?>
<div class="title_hanghoa">Danh sách hàng hóa</div>
<div class="content_hanghoa">
    Trong bảng có: <b><?php echo $l; ?></b>
    <table border="solid">
        <thead>
            <th>id</th>
            <th>Tên hàng hóa</th>
            <th>Giá tham khảo</th>
            <th>Mô tả</th>
            <th>Hình ảnh</th>
            <th>Chức năng</th>
        </thead>
        <?php
        if ($l > 0) {
            foreach ($list_hh as $v) {
                ?>
                <tr>
                    <td><?php echo $v->idhanghoa; ?></td>
                    <td><?php echo $v->tenhanghoa; ?></td>
                    <td><?php echo $v->giathamkhao; ?></td>
                    <td><?php echo $v->mota; ?></td>
                    <td align="center">
                        <img class="iconbutton" src="data:image/png;base64,<?php echo $v->hinhanh; ?>">
                    </td>
                    <td align="center">
                        <?php
                        if (isset($_SESSION['ADMIN'])) {
                            ?>
                            <a href="./element_T/mhanghoa/hanghoaAct.php?reqact=deletehanghoa&idhanghoa=<?php echo $v->idhanghoa; ?>">
                                <img src="./img_T/delete.png" class="iconimg">
                            </a>
                            <?php
                        } else {
                            ?>
                            <img src="./img_T/delete.png" class="iconimg">
                            <?php
                        }
                        ?>
                        <img height="20px" src="./img_T/update.png" class="w_update_btn_open_hh" value="<?php echo $v->idhanghoa; ?>">
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</div>
<div id="w_update_hh">
    <div id="w_update_form_hh"></div>
    <input type="button" value="close" id="w_close_btn_hh">
</div>
