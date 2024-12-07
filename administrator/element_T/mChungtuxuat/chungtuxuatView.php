<div align="center">Quản lý chứng từ xuất</div>
<hr>
<?php
 require './element_T/mod/khachhangCls.php';
 $lObj = new khachhang();
 $list_lh = $lObj->khachhangGetAll();
 $l = count($list_lh);
?>
<?php
 require './element_T/mod/hanghoaCls.php';
 $thObj = new hanghoa();
 $list_th = $thObj->hanghoaGetAll();
 $t = count($list_th);
?>
<div><h3>Thêm chứng từ xuất</h3></div>
<div>
    <form name="newchungtuxuat" id="formaddchungtuxuat" method="post" action="./element_T/mChungtuxuat/chungtuxuatAct.php?reqact=addnew" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Tên chứng từ xuất</td>
                <td><input type="text" name="tenchungtuxuat" /></td>
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
                <td>Chọn khách hàng</td>
                <td>
                    <?php
                    foreach ($list_lh as $lh) {
                        ?>
                        <input type="radio" name="idkhachhang" value="<?php echo $lh->idkhachhang; ?>">
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
 require './element_T/mod/chungtuxuatCls.php';
 $ctnObj = new chungtuxuat();
 $list_ctn = $ctnObj->chungtuxuatGetAll();
 $l = count($list_ctn);
?>
<div class="title_chungtuxuat">Danh sách chứng từ xuất</div>
<div class="content_chungtuxuat">
    Trong bảng có: <b><?php echo $l; ?></b>
    <table border="solid">
        <thead>
            <th>ID</th>
            <th>Tên chứng từ xuất</th>
            <th>Ngày lập</th>
            <th>Tổng tiền</th>
            <th>Khách hàng</th>
            <th>Chức năng</th>
        </thead>
        <?php
        if ($l > 0) {
            foreach ($list_ctn as $v) {
                ?>
                <tr>
                    <td><?php echo $v->idchungtuxuat; ?></td>
                    <td><?php echo $v->tenchungtuxuat; ?></td>
                    <td><?php echo $v->ngaylap; ?></td>
                    <td><?php echo $v->tongtien; ?></td>
                    <td><?php echo $v->idkhachhang; ?></td>
                    <td align="center">
                        <?php
                        if (isset($_SESSION['ADMIN'])) {
                            ?>
                            <a href="./element_T/mChungtuxuat/chungtuxuatAct.php?reqact=deletechungtuxuat&idchungtuxuat=<?php echo $v->idchungtuxuat; ?>">
                                <img src="./img_T/delete.png" class="iconimg">
                            </a>
                            <?php
                        } else {
                            ?>
                            <img src="./img_T/delete.png" class="iconimg">
                            <?php
                        }
                        ?>
                        <img height="20px" src="./img_T/update.png" class="w_update_btn_open_ctx" value="<?php echo $v->idchungtuxuat; ?>">
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</div>
<div id="w_update_ctx">
    <div id="w_update_form_ctx"></div>
    <input type="button" value="close" id="w_close_btn_ctx">
</div>
