<div align="center">Quản lý chi tiết chứng từ xuất</div>
<hr>
<?php
require './element_T/mod/dongiaCls.php';
$dongiaObj = new dongia();
$list_dongia = $dongiaObj->dongiaGetAll();
$d = count($list_dongia);
?>
<?php
require './element_T/mod/chungtuxuatCls.php';
$Obj = new chungtuxuat();
$list_ctx = $Obj->chungtuxuatGetAll();
$c = count($list_ctx);
?>
<div><h3>Thêm chi tiết chứng từ xuất</h3></div>
<div>
    <form name="newchitietchungtuxuat" id="formaddchitietchungtuxuat" method="post" action="./element_T/mChitietchungtuxuat/chitietchungtuxuatAct.php?reqact=addnew" enctype="multipart/form-data">
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
                <td>Chọn chứng từ xuất</td>
                <td>
                    <?php
                    foreach ($list_ctx as $ctx) {
                        ?>
                        <input type="radio" name="idchungtuxuat" value="<?php echo $ctx->idchungtuxuat; ?>">
                        <?php echo $ctx->tenchungtuxuat; ?>
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
require './element_T/mod/chitietchungtuxuatCls.php';
$ctxObj = new chitietchungtuxuat();
$list_cttx = $ctxObj->chitietchungtuxuatGetAll();
$l = count($list_cttx);
?>
<div class="title_chitietchungtuxuat">Danh sách chi tiết chứng từ xuất</div>
<div class="content_chitietchungtuxuat">
    Trong bảng có: <b><?php echo $l; ?></b>
    <table border="solid">
        <thead>
            <th>ID</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Chứng từ xuất</th>
            <th>Chức năng</th>
        </thead>
        <?php
        if ($l > 0) {
            foreach ($list_cttx as $v) {
                ?>
                <tr>
                    <td><?php echo $v->idchitietchungtuxuat; ?></td>
                    <td><?php echo $v->soluong; ?></td>
                    <td><?php echo $v->iddongia; ?></td>
                    <td><?php echo $v->idchungtuxuat; ?></td>
                    <td align="center">
                        <?php
                        if (isset($_SESSION['ADMIN'])) {
                            ?>
                            <a href="./element_T/mChitietchungtuxuat/chitietchungtuxuatAct.php?reqact=deletechitietchungtuxuat&idchitietchungtuxuat=<?php echo $v->idchitietchungtuxuat; ?>">
                                <img src="./img_T/delete.png" class="iconimg">
                            </a>
                            <img height="20px" src="./img_T/update.png" class="w_update_btn_open_cttx" data-idchitietchungtuxuat="<?php echo $v->idchitietchungtuxuat; ?>">
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
<div id="w_update_cttx" >
    <div id="w_update_form_cttx"></div>
    <input type="button" value="close" id="w_close_btn_cttx">
</div>
