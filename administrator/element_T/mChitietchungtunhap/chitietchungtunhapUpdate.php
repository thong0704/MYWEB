<div align="center">Cập nhật chi tiết chứng từ nhập</div>
<?php 
require '../mod/chitietchungtunhapCls.php';
$idchitietchungtunhap = $_REQUEST['idchitietchungtunhap'];
$chitietchungtunhap = new chitietchungtunhap();
$getlhUpdate = $chitietchungtunhap->chitietchungtunhapGetbyId($idchitietchungtunhap);
?>

<?php
require '../mod/dongiaCls.php';
$dongiaObj = new dongia();
$list_dongia = $dongiaObj->dongiaGetAll();
$d = count($list_dongia);
?>
<?php
require '../mod/chungtunhapCls.php';
$Obj = new chungtunhap();
$list_ctn = $Obj->chungtunhapGetAll();
$c = count($list_ctn);
?>
<div class="title_mod">Chi Tiết chứng từ nhập mới</div>
<div class="content_mod">
    <form name="updatechitietchungtunhap" id="formupdate" method="post" action="./element_T/mChitietchungtunhap/chitietchungtunhapAct.php?reqact=updatechitietchungtunhap" enctype="multipart/form-data">
        <input type="hidden" name="idchitietchungtunhap" value="<?php echo $getlhUpdate->idchitietchungtunhap; ?>"/>
        
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