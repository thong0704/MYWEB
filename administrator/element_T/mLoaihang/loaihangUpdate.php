
<div align="center"> Cập Nhật Loại Hàng</div>
<hr>
<?php
    require '../../element_T/mod/loaihangCls.php';
    $idloaihang = $_REQUEST['idloaihang'];
    //echo $idloaihang;
    //load dữ liệu đối tượng
    $lhObj = new loaihang();
    $getlhUpdate = $lhObj->LoaihangGetById($idloaihang);
    // echo $getloaihangUpdate->hoten;
?>
<div>
<form name="updateloaihang" id="formaddupdatelh" method="post"
        action='./element_T/mLoaihang/loaihangAct.php?reqact=updateloaihang' enctype="multipart/form-data">

        <input type="hidden" name="idloaihang" value="<?php echo $getlhUpdate->idloaihang; ?>"/>
        <input type="hidden" name="hinhanh" value="<?php echo $getlhUpdate->hinhanh; ?>"/>
        <table>
            <tr>
                <td>Tên loại hàng:</td>
                <td><input type="text" name="tenloaihang" value="<?php echo $getlhUpdate->tenloaihang;?>"/></td>
            </tr>
            <tr>
                <td>Mô tả:</td>
                <td><input type="text" size="50" name="mota" value="<?php echo $getlhUpdate->mota;?>"/></td>
            </tr>
            <tr>
                <td>Hình ảnh:</td>
                <td>
                    <img width="120px" src="data:image/png;base64,<?php echo $getlhUpdate->hinhanh;?>"><br> 
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