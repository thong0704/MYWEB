<div align="center">Quản lý đơn giá</div>

<hr>
<?php
 require './element_T/mod/hanghoaCls.php';
 $lObj = new hanghoa();
 $list_lh = $lObj->hanghoaGetAll();
 $l = count($list_lh);
?>
<div><h3>Thêm đơn giá</h3></div>
<div>
    <form name="newdongia" id="formadddongia" method="post" action="./element_T/mDongia/dongiaAct.php?reqact=addnew" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Giá trị đơn giá</td>
                <td><input type="number" name="giatridongia" /></td>
            </tr>
            <tr>
                <td>Áp dụng</td>
                <td>Áp dụng<input type="radio" name="apdung" value="1" check="true"/>
                    không áp dụng<input type="radio" name="apdung" value="0" check="true"/>
                </td>
            </tr>
            <tr>
                <td>Ngày băt đầu</td>
                <td><input type="date" name="ngaybatdau" /></td>
            </tr>
            <tr>
                <td>Ngày kết thúc</td>
                <td><input type="date" name="ngayketthuc" /></td>
            </tr>
            <tr>
                <td>Chọn hàng hóa</td>
                <td>
                    <?php
                    foreach ($list_lh as $lh) {
                        ?>
                        <input type="radio" name="idhanghoa" value="<?php echo $lh->idhanghoa; ?>">
                        <?php echo $lh->tenhanghoa; ?>
                        <img class="iconbutton" src="data:image/png;base64,<?php echo $lh->hinhanh; ?>">
                        <br>
                        <?php
                    }
                    ?>
                </td>
            </tr>
                <td><input type="submit" id="btnsubmit" value="Thêm" /></td>
                <td><input type="reset" value="Làm lại" /><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
    <hr/>
</div>
<?php
 require './element_T/mod/dongiaCls.php';
 $hhObj = new dongia();
 $list_hh = $hhObj->dongiaGetAll();
 $l = count($list_hh);
?>
<div class="title_dongia">Danh sách đơn giá</div>
<div class="content_dongia">
    Trong bảng có: <b><?php echo $l; ?></b>
    <table border="solid">
        <thead>
            <th>id</th>
            <th>Giá trị đơn giá</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Áp dụng</th>
            <th>Chức năng</th>

        </thead>
        <?php
        if ($l > 0) {
            foreach ($list_hh as $v) {
                ?>
                <tr>
                    <td><?php echo $v->iddongia; ?></td>
                    <td><?php echo $v->giatridongia; ?></td>
                    <td><?php echo $v->ngaybatdau; ?></td>
                    <td><?php echo $v->ngayketthuc; ?></td>
                    <td align="center">
                        <?php if( $v->apdung==1){
                        ?>
                            <img src="./img_T/success.png" class="iconimg">
                        <?php
                    }else{
                        ?>
                        <img src="./img_T/fail.png" class="iconimg">
                    <?php
                    } ?>
                    </td>
                    
                    <td align="center">
                        <?php
                        if (isset($_SESSION['ADMIN'])) {
                            ?>
                            <a href="./element_T/mDongia/dongiaAct.php?reqact=deletedongia&iddongia=<?php echo $v->iddongia; ?>">
                                <img src="./img_T/delete.png" class="iconimg">
                            </a>
                            <?php
                        } else {
                            ?>
                            <img src="./img_T/delete.png" class="iconimg">
                            <?php
                        }
                        ?>
                        <img height="20px" src="./img_T/update.png" class="w_update_btn_open_dg" value="<?php echo $v->iddongia; ?>">
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</div>
<div id="w_update_dg">
    <div id="w_update_form_dg"></div>
    <input type="button" value="close" id="w_close_btn_dg">
</div>
