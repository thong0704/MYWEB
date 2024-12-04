
<div align="center"> Cập Nhật Thương Hiệu</div>
<hr>
<?php
    require '../../element_T/mod/thuonghieuCls.php';
    $idthuonghieu = $_REQUEST['idthuonghieu'];
    //echo $idloaihang;
    //load dữ liệu đối tượng
    $lhObj = new thuonghieu();
    $getthUpdate = $lhObj->thuonghieuGetById($idthuonghieu);
    // echo $getloaihangUpdate->hoten;
?>
<div>
<form name="updatethuonghieu" id="formaddupdatett" method="post"
        action='./element_T/mThuonghieu/thuonghieuAct.php?reqact=updatethuonghieu' enctype="multipart/form-data">

        <input type="hidden" name="idthuonghieu" value="<?php echo $getthUpdate->idthuonghieu; ?>"/>
        <input type="hidden" name="hinhanh" value="<?php echo $getthUpdate->hinhanh; ?>"/>
        <table>
            <tr>
                <td>Tên Thương Hiệu:</td>
                <td><input type="text" name="tenthuonghieu" value="<?php echo $getthUpdate->tenthuonghieu;?>"/></td>
            </tr>
            <tr>
                <td>Xuất Xứ:</td>
                <td><input type="text" size="50" name="mota" value="<?php echo $getthUpdate->xuatxu;?>"/></td>
            </tr>
            <tr>
                <td>Hình ảnh:</td>
                <td>
                    <img width="120px" src="data:image/png;base64,<?php echo $getthUpdate->hinhanh;?>"><br> 
                    <input type="file" name="fileimage">
                </td>  
            </tr>  
                   
            
            <tr>
                <td><input type="submit" id="btnsubmit" value="Update"/></td>
                <td><b id="noteForm"></b></td>
            </tr>
            </table>
    </form> 



</div>