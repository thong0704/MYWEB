<div align="center">Cập nhật loại hàng</div>
<?php 
require '../mod/loaihangCls.php';
$idloaihang = $_REQUEST['idloaihang'];

$loaihang = new loaihang();
$getloaihang = $loaihang->loaihangGetbyId($idloaihang);
?>
    <div class="title_mod">Loại hàng mới</div>
    <div class="content_mod">
        <form name="updateloaihang" id="formupdate" method="post" action="./element_T/mloaihang/loaihangAct.php?reqact=updateloaihang" enctype="multipart/form-data">
            <input type="hidden" name="idloaihang" value="<?php echo $getloaihang->idloaihang; ?>"/>
            <input type="hidden" name="hinhanh" value="<?php echo $getloaihang->hinhanh; ?>"/>
                <table>
                    <tr>
                        <td>Tên loại hàng:</td>
                        <td><input type="text" name="tenloaihang" value="<?php echo $getloaihang->tenloaihang; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Mô tả:</td>
                        <td><input type="text"size="50" name="mota" value="<?php  echo $getloaihang->mota; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Hình ảnh</td>
                        <td>
                            <img width="150px" src="data:image/png;base64,<?php echo $getloaihang->hinhanh ?>" ><br>
                            <input type="file" name="fileimage">
                            
                    </tr>
                   
                    <tr>
                        <td><input type="submit" id="btnsubmit" value="Cật nhật" size="50"/></td>
                        <td><input type="reset" value="Làm lại"/><b id="noteForm"></b></td>
                    </tr>
                 </table>
        </form>
</div>