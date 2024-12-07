<?php
require './element_T/mod/khachhangCls.php';
$idkhachhang = $_REQUEST['idkhachhang'];

$khachhang = new khachhang();
$getkhachhang = $khachhang->KhachhangGetbyId($idkhachhang);
?>
<div class="title_khachhang">Cập nhật khách hàng</div>
<div class="content_khachhang">
    <form name="updatekhachhang" id="formupdate" method="post" action="./element_T/mKhachhang/khachhangAct.php?reqact=updatekhachhang">
        <input type="hidden" name="idkhachhang" value="<?php echo $idkhachhang; ?>"/>
        <table>
            <tr>
                <td>Tên đăng nhập:</td>
                <td><input type="text" name="username" value="<?php echo $getkhachhang->username; ?>"/></td>
            </tr>
            <tr>
                <td>Mật khẩu:</td>
                <td><input type="password" name="password" value="<?php echo $getkhachhang->password; ?>"/></td>
            </tr>
            <tr>
                <td>Họ tên:</td>
                <td><input type="text" name="hoten" value="<?php echo $getkhachhang->hoten; ?>"/></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>Nam<input type="radio" name="gioitinh" value="1" <?php if( $getkhachhang->gioitinh==1) echo 'checked'; ?>/>
                    Nữ<input type="radio" name="gioitinh" value="0" <?php if( $getkhachhang->gioitinh==0) echo 'checked'; ?>/>
                </td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td><input type="date" name="ngaysinh" value="<?php echo $getkhachhang->ngaysinh; ?>"/></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><input type="text" name="diachi" value="<?php echo $getkhachhang->diachi; ?>"/></td>
            </tr>
            <tr>
                <td>Điện thoại:</td>
                <td><input type="tel" name="dienthoai" value="<?php echo $getkhachhang->dienthoai; ?>"/></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Cập nhật"/></td>
                <td><input type="reset" value="Làm lại"/><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>
