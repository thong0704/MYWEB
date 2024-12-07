<div align="center">Cập nhật chi tiết chứng từ xuất</div>
<?php 
require '../mod/chitietchungtuxuatCls.php';
$idchitietchungtuxuat = isset($_REQUEST['idchitietchungtuxuat']) ? $_REQUEST['idchitietchungtuxuat'] : null;

if ($idchitietchungtuxuat) {
    $chitietchungtuxuat = new chitietchungtuxuat();
    $getlhUpdate = $chitietchungtuxuat->chitietchungtuxuatGetbyId($idchitietchungtuxuat);

    if ($getlhUpdate) {
        require '../mod/dongiaCls.php';
        $dongiaObj = new dongia();
        $list_dongia = $dongiaObj->dongiaGetAll();
        $d = count($list_dongia);
        
        require '../mod/chungtuxuatCls.php';
        $Obj = new chungtuxuat();
        $list_ctx = $Obj->chungtuxuatGetAll();
        $c = count($list_ctx);
        ?>
        <div class="title_mod">Chi Tiết chứng từ xuất mới</div>
        <div class="content_mod">
            <form name="updatechitietchungtuxuat" id="formupdate" method="post" action="./element_T/mChitietchungtuxuat/chitietchungtuxuatAct.php?reqact=updatechitietchungtuxuat" enctype="multipart/form-data">
                <input type="hidden" name="idchitietchungtuxuat" value="<?php echo $getlhUpdate->idchitietchungtuxuat; ?>"/>
                
                <table>
                    <tr>
                        <td>Số lượng</td>
                        <td><input type="number" name="soluong" value="<?php echo isset($getlhUpdate->soluong) ? $getlhUpdate->soluong : ''; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Chọn đơn giá</td>
                        <td>
                            <?php
                            foreach ($list_dongia as $dongia) {
                                ?>
                                <input type="radio" name="iddongia" value="<?php echo $dongia->iddongia; ?>" <?php if ($getlhUpdate->iddongia == $dongia->iddongia) echo 'checked'; ?>>
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
                                <input type="radio" name="idchungtuxuat" value="<?php echo $ctx->idchungtuxuat; ?>" <?php if ($getlhUpdate->idchungtuxuat == $ctx->idchungtuxuat) echo 'checked'; ?>>
                                <?php echo $ctx->tenchungtuxuat; ?>
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
        <?php
    } 
}

