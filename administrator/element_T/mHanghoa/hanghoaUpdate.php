<div align="center">Cập nhật hàng hóa</div>
<?php 
require '../mod/hanghoaCls.php';
$idhanghoa = $_REQUEST['idhanghoa'];
$hanghoa = new hanghoa();
$getlhUpdate = $hanghoa->hanghoaGetbyId($idhanghoa);
?>
<?php
require '../mod/loaihangCls.php';
 $lObj = new loaihang();
 $list_lh = $lObj->loaihangGetAll();
  ?>
    <div class="title_mod">Hàng hóa mới</div>
    <div class="content_mod">
        <form name="updatehanghoa" id="formupdate" method="post" action="./element_T/mhanghoa/hanghoaAct.php?reqact=updatehanghoa" enctype="multipart/form-data">
            <input type="hidden" name="idhanghoa" value="<?php echo $getlhUpdate->idhanghoa; ?>"/>
            <input type="hidden" name="hinhanh" value="<?php echo $getlhUpdate->hinhanh; ?>"/>
                <table>
                    <tr>
                        <td>Tên hàng hóa:</td>
                        <td><input type="text" name="tenhanghoa" value="<?php echo $getlhUpdate->tenhanghoa; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Mô tả:</td>
                        <td><input type="text"size="50" name="mota" value="<?php  echo $getlhUpdate->mota; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Giá tham khảo:</td>
                        <td><input type="text"size="50" name="giathamkhao" value="<?php  echo $getlhUpdate->giathamkhao; ?>"/></td>
                    </tr>
                    <td>chon loại hàng</td>
                        <td>
                            <?php
                                foreach($list_lh as $l){
                                    ?>
                                        <input type="radio" name="idloaihang" value="<?php echo $l->idloaihang ;?> "<?php  if($l->idloaihang == $getlhUpdate->idloaihang){echo 'checked';} ?>>
                                        <?php  echo $l->idloaihang; ?> 
                                        <img class="iconbutton" src="data:image/png;base64,<?php echo $l->hinhanh;?>">
                                        <br>
                                    <?php
                                }
                            ?>
                        </td>
                    <tr>
                        <td>Hình ảnh</td>
                        <td>
                            <img width="150px" src="data:image/png;base64,<?php echo $getlhUpdate->hinhanh ?>" ><br>
                            <input type="file" name="fileimage">
                            
                    </tr>
                   
                    <tr>
                        <td><input type="submit" id="btnsubmit" value="Cật nhật" size="50"/></td>
                        <td><input type="reset" value="Làm lại"/><b id="noteForm"></b></td>
                    </tr>
                 </table>
        </form>
</div>