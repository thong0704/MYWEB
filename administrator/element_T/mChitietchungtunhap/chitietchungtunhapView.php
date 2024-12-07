<div align="center">Quản lý chi tiết chứng từ nhập</div>
<hr>
<?php
require './element_T/mod/dongiaCls.php';
$dongiaObj = new dongia();
$list_dongia = $dongiaObj->dongiaGetAll();
$d = count($list_dongia);
?>
<?php
require './element_T/mod/chungtunhapCls.php';
$Obj = new chungtunhap();
$list_ctn = $Obj->chungtunhapGetAll();
$c = count($list_ctn);
?>
<div><h3>Thêm chi tiết chứng từ nhập</h3></div>
<div>
    <form name="newchitietchungtunhap" id="formaddchitietchungtunhap" method="post" action="./element_T/mChitietchungtunhap/chitietchungtunhapAct.php?reqact=addnew" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Số lượng</td>
                <td><input type="number" name="soluong" /></td>
            </tr>
            <tr>
                <td>Chọn đơn giá</td>
                <td>
                    <?php
                    foreach ($list_dongia as $dongia) {
                        ?>
                        <input type="radio" name="iddongia" value="<?php echo $dongia->iddongia; ?>">
                        <?php echo $dongia->giatridongia; ?>
                        <br>
                        <?php
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Chọn chứng từ nhập</td>
                <td>
                    <?php
                    foreach ($list_ctn as $ctn) {
                        ?>
                        <input type="radio" name="idchungtunhap" value="<?php echo $ctn->idchungtunhap; ?>">
                        <?php echo $ctn->tenchungtu; ?>
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
require './element_T/mod/chitietchungtunhapCls.php';
$ctnObj = new chitietchungtunhap();
$list_cttn = $ctnObj->chitietchungtunhapGetAll();
$l = count($list_cttn);
?>
<div class="title_chitietchungtunhap">Danh sách chi tiết chứng từ nhập</div>
<div class="content_chitietchungtunhap">
    Trong bảng có: <b><?php echo $l; ?></b>
    <table border="solid">
        <thead>
            <th>ID</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Chứng từ nhập</th>
            <th>Chức năng</th>
        </thead>
        <?php
        if ($l > 0) {
            foreach ($list_cttn as $v) {
                ?>
                <tr>
                    <td><?php echo $v->idchitietchungtunhap; ?></td>
                    <td><?php echo $v->soluong; ?></td>
                    <td><?php echo $v->iddongia; ?></td>
                    <td><?php echo $v->idchungtunhap; ?></td>
                    <td align="center">
                        <?php
                        if (isset($_SESSION['ADMIN'])) {
                            ?>
                            <a href="./element_T/mChitietchungtunhap/chitietchungtunhapAct.php?reqact=deletechitietchungtunhap&idchitietchungtunhap=<?php echo $v->idchitietchungtunhap; ?>">
                                <img src="./img_T/delete.png" class="iconimg">
                            </a>
                            <img height="20px" src="./img_T/update.png" class="w_update_btn_open_cttn" data-idchitietchungtunhap="<?php echo $v->idchitietchungtunhap; ?>">
                            <?php
                        } else {
                            ?>
                            <img src="./img_T/delete.png" class="iconimg">
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</div>
<div id="w_update_cttn" >
    <div id="w_update_form_cttn"></div>
    <input type="button" value="close" id="w_close_btn_cttn">
</div>

