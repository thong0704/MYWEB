<div>Quản lý khách hàng</div>
<hr>
<div> <h3>Khách hàng mới</h3></div>
<div>
    <form name="newkhachhang" id="formreg" method="post" action="./element_T/mKhachhang/khachhangAct.php?reqact=addnew">
        <table>
            <tr>
                <td>Tên đăng nhập:</td>
                <td><input type="text" name="username"/></td>
            </tr>
            <tr>
                <td>Mật khẩu:</td>
                <td><input type="password" name="password"/></td>
            </tr>
            <tr>
                <td>Họ tên:</td>
                <td><input type="text" name="hoten"/></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>Nam<input type="radio" name="gioitinh" value="1" check="true"/>
                    Nữ<input type="radio" name="gioitinh" value="0" check="true"/>
                </td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td><input type="date" name="ngaysinh"/></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><input type="text" name="diachi"/></td>
            </tr>
            <tr>
                <td>Điện thoại:</td>
                <td><input type="tel" name="dienthoai"/></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Thêm"/></td>
                <td><input type="reset" value="Làm lại"/><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
    <hr/>
    <?php
    require './element_T/mod/khachhangCls.php';
    ?>

    <div class="title_khachhang">Danh sách khách hàng</div>
    <div class="content_khachhang">
    <?php
    $obj_Khachhang = new khachhang();
    $list_Khachhang = $obj_Khachhang->KhachhangGetAll();
    $l = count($list_Khachhang);
    ?>
    <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php 
        if($l>0){
    ?>
    <table border="1">
        <thead>
            <tr> 
                <th>id</th>
                <th>Username</th>
                <th>Password</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Ngày Sinh</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Ngày đăng ký</th>
                <th>Hoạt động</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($list_Khachhang as $v) {
            ?>
            <tr>
                <td><?php echo $v->idkhachhang; ?></td>
                <td><?php echo $v->username; ?></td>
                <td><?php echo $v->password; ?></td>
                <td><?php echo $v->hoten; ?></td>
                <td align="center">
                    <?php if( $v->gioitinh==1){
                        ?>
                            <img src="./img_T/boy.png" class="iconimg">
                        <?php
                    }else{
                        ?>
                        <img src="./img_T/girl.png" class="iconimg">
                    <?php
                    } ?>
                </td>
                <td><?php echo $v->ngaysinh; ?></td>
                <td><?php echo $v->diachi; ?></td>
                <td><?php echo $v->dienthoai; ?></td>
                <td><?php echo $v->ngaydangky; ?></td>
                <td align="center">
                    <?php 
                    if(isset($_SESSION['ADMIN'])){
                        if( $v->setlock==0){
                            ?>
                                <a href="./element_T/mKhachhang/khachhangAct.php?reqact=setlock&idkhachhang=<?php echo $v->idkhachhang ; ?>&setlock=<?php echo $v->setlock  ;?>">
                                <img src="./img_T/unlock.png" class="iconimg"> </a>
                            <?php
                        }else{
                            ?>
                                <a href="./element_T/mKhachhang/khachhangAct.php?reqact=setlock&idkhachhang=<?php echo $v->idkhachhang ; ?>&setlock=<?php echo $v->setlock  ;?>">
                                <img src="./img_T/lock.png" class="iconimg"></a>
                            <?php
                        }
                    } else{
                        if( $v->setlock==0){
                            ?>
                               
                                <img src="./img_T/unlock.png" class="iconimg"> </a>
                            <?php
                        }else{
                            ?>
                                
                                <img src="./img_T/lock.png" class="iconimg"></a>
                            <?php
                        }
                    }
                    ?>
                </td>
                <td align="center">
                    <?php if(isset($_SESSION['ADMIN'])){
                        ?>
                            <a href="./element_T/mKhachhang/khachhangAct.php?reqact=deletekhachhang&idkhachhang=<?php echo $v->idkhachhang ; ?>">
                                <img src="./img_T/delete.png" class="iconimg"/>
                            </a>
                        <?php
                    }else{
                        ?>
                            <img src="./img_T/delete.png" class="iconimg"/>
                        <?php
                    }
                    ?>
                    <?php
                        if(isset($_SESSION['USER']) && $v->username == 'admin'){
                            ?>
                                <img class="iconimg" src="./img_T/update.png"/>
                            <?php
                        }else{
                            ?>
                                <a href="index.php?reqact=updatekhachhang&idkhachhang=<?php echo $v->idkhachhang; ?>">
                                    <img class="iconimg" src="./img_T/update.png"/>
                                </a>
                            <?php
                        }
                    ?>


                   
                </td>
            </tr>           
            <?php
            }
            ?>
        </tbody>
    </table>
            <?php
            }
            ?>
</div>
</div>
