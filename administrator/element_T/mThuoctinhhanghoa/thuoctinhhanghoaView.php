<div align="center">Quản lý thuộc tính hàng hóa</div>

<hr>
<?php
 require './element_T/mod/thuoctinhCls.php';
 $lObj = new thuoctinh();
 $list_lh = $lObj->thuoctinhGetAll();
 $l = count($list_lh);
?>
<?php
 require './element_T/mod/hanghoaCls.php';
 $thObj = new hanghoa();
 $list_th = $thObj->hanghoaGetAll();
 $t = count($list_th);
?>
<div><h3>Thêm thuộc tính  hàng hóa</h3></div>
<div>
    <form name="newthuoctinhhanghoa" id="formadd" method="post" action="./element_T/mThuoctinhhanghoa/thuoctinhhanghoaAct.php?reqact=addnew" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Giá trị</td>
                <td><input type="text" name="giatri" /></td>
            </tr>
            <tr>
                <td>Ghi chú</td>
                <td><input type="text" name="ghichu" /></td>
            </tr>
           
                <td>Chọn thuộc tính</td>
                <td>
                    <?php
                    foreach ($list_lh as $lh) {
                        ?>
                        <input type="radio" name="idthuoctinh" value="<?php echo $lh->idthuoctinh; ?>">
                        <?php echo $lh->tenthuoctinh; ?>
                        <img class="iconbutton" src="data:image/png;base64,<?php echo $lh->hinhanh; ?>">
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
 require './element_T/mod/thuoctinhhanghoaCls.php';
 $hhObj = new thuoctinhhanghoa();
 $list_hh = $hhObj->thuoctinhhanghoaGetAll();
 $l = count($list_hh);
?>
<div class="title_thuoctinhhanghoa">Danh sách thuộc tính hàng hóa hàng hóa</div>
<div class="content_thuoctinhhanghoa">
    Trong bảng có: <b><?php echo $l; ?></b>
    <table border="solid">
        <thead>
            <th>id</th>
            <th>Giá trị</th>
            <th>Ghi chú</th>
            <th>Chức năng</th>
        </thead>
        <?php
        if ($l > 0) {
            foreach ($list_hh as $v) {
                ?>
                <tr>
                    <td><?php echo $v->idthuoctinhhanghoa; ?></td>
                    <td><?php echo $v->giatri; ?></td>
                    <td><?php echo $v->ghichu; ?></td>
                    
                    <td align="center">
                        <?php
                        if (isset($_SESSION['ADMIN'])) {
                            ?>
                            <a href="./element_T/mThuoctinhhanghoa/thuoctinhhanghoaAct.php?reqact=deletethuoctinhhanghoa&idthuoctinhhanghoa=<?php echo $v->idthuoctinhhanghoa; ?>">
                                <img src="./img_T/delete.png" class="iconimg">
                            </a>
                            <?php
                        } else {
                            ?>
                            <img src="./img_T/delete.png" class="iconimg">
                            <?php
                        }
                        ?>
                        <img height="20px" src="./img_T/update.png" class="w_update_btn_open_tthh" value="<?php echo $v->idthuoctinhhanghoa; ?>">
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</div>
<div id="w_update_tthh">
    <div id="w_update_form_tthh"></div>
    <input type="button" value="close" id="w_close_btn_tthh">
</div>
