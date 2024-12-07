<div align="center">Quản lý chứng từ nhập</div>
<hr>
<?php
 require './element_T/mod/userCls.php';
 $lObj = new user();
 $list_lh = $lObj->UserGetAll();
 $l = count($list_lh);
?>
<?php
 require './element_T/mod/hanghoaCls.php';
 $thObj = new hanghoa();
 $list_th = $thObj->hanghoaGetAll();
 $t = count($list_th);
?>
<div><h3>Thêm chứng từ nhập</h3></div>
<div>
    <form name="newchungtunhap" id="formaddchungtunhap" method="post" action="./element_T/mChungtunhap/chungtunhapAct.php?reqact=addnew" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Tên chứng từ</td>
                <td><input type="text" name="tenchungtu" /></td>
            </tr>
            <tr>
                <td>Ngày lập</td>
                <td><input type="date" name="ngaylap" /></td>
            </tr>
            <tr>
                <td>Tổng tiền</td>
                <td><input type="number" name="tongtien" /></td>
            </tr>
            <tr>
                <td>Chọn nhân viên</td>
                <td>
                    <?php
                    foreach ($list_lh as $lh) {
                        ?>
                        <input type="radio" name="iduser" value="<?php echo $lh->iduser; ?>">
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
                        <input type="radio" name="idhanghoa" value="<?php echo $th->idhanghoa; ?>">
                        <?php echo $th->tenhanghoa; ?>
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
 require './element_T/mod/chungtunhapCls.php';
 $ctnObj = new chungtunhap();
 $list_ctn = $ctnObj->chungtunhapGetAll();
 $l = count($list_ctn);
?>
<div class="title_chungtunhap">Danh sách chứng từ nhập</div>
<div class="content_chungtunhap">
    Trong bảng có: <b><?php echo $l; ?></b>
    <table border="solid">
        <thead>
            <th>ID</th>
            <th>Tên chứng từ</th>
            <th>Ngày lập</th>
            <th>Tổng tiền</th>
            <th>Nhân viên</th>
            <th>Chức năng</th>
        </thead>
        <?php
        if ($l > 0) {
            foreach ($list_ctn as $v) {
                ?>
                <tr>
                    <td><?php echo $v->idchungtunhap; ?></td>
                    <td><?php echo $v->tenchungtu; ?></td>
                    <td><?php echo $v->ngaylap; ?></td>
                    <td><?php echo $v->tongtien; ?></td>
                    <td><?php echo $v->iduser; ?></td>
                    <td align="center">
                        <?php
                        if (isset($_SESSION['ADMIN'])) {
                            ?>
                            <a href="./element_T/mChungtunhap/chungtunhapAct.php?reqact=deletechungtunhap&idchungtunhap=<?php echo $v->idchungtunhap; ?>">
                                <img src="./img_T/delete.png" class="iconimg">
                            </a>
                            <?php
                        } else {
                            ?>
                            <img src="./img_T/delete.png" class="iconimg">
                            <?php
                        }
                        ?>
                        <img height="20px" src="./img_T/update.png" class="w_update_btn_open_ctn" value="<?php echo $v->idchungtunhap; ?>">
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</div>
<div id="w_update_ctn">
    <div id="w_update_form_ctn"></div>
    <input type="button" value="close" id="w_close_btn_ctn">
</div>
