<div align="center">Cập nhật thuộc tính</div>
<?php 
require '../mod/thuoctinhCls.php';
$idthuoctinh = $_REQUEST['idthuoctinh'];

$thuoctinh = new thuoctinh();
$getthuoctinh = $thuoctinh->thuoctinhGetbyId($idthuoctinh);
?>
    <div class="title_mod">Thuộc tính hàng mới</div>
    <div class="content_mod">
        <form name="updatethuoctinh" id="formupdate" method="post" action="./element_T/mthuoctinh/thuoctinhAct.php?reqact=updatethuoctinh" enctype="multipart/form-data">
            <input type="hidden" name="idthuoctinh" value="<?php echo $getthuoctinh->idthuoctinh; ?>"/>
            <input type="hidden" name="hinhanh" value="<?php echo $getthuoctinh->hinhanh; ?>"/>
                <table>
                    <tr>
                        <td>Tên thuộc tính:</td>
                        <td><input type="text" name="tenthuoctinh" value="<?php echo $getthuoctinh->tenthuoctinh; ?>"/></td>
                    </tr>
                    <tr>
                <td>Mô tả:</td>
                <td><input type="text" size="50" name="mota" value="<?php echo $getthuoctinh->mota;?>"/></td>
            </tr>
                    <tr>
                        <td>Hình ảnh</td>
                        <td>
                            <img width="150px" src="data:image/png;base64,<?php echo $getthuoctinh->hinhanh ?>" ><br>
                            <input type="file" name="fileimage">
                            
                    </tr>
                   
                    <tr>
                        <td><input type="submit" id="btnsubmit" value="Cật nhật" size="50"/></td>
                        <td><input type="reset" value="Làm lại"/><b id="noteForm"></b></td>
                    </tr>
                 </table>
        </form>
</div>