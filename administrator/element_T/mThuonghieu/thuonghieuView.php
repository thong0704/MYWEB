<div align="center">Quản lý thương hiệu</div>
<hr>
<div> <h3>Thêm thương hiệu</h3></div>
<div>
<form name="newthuonghieu" id="formaddthuonghieu" method="post" action="./element_T/mThuonghieu/thuonghieuAct.php?reqact=addnew"
            enctype="multipart/form-data">
        
        <table>
            <tr>
                <td>Tên thương hiệu</td>
                <td><input type="text" name="tenthuonghieu"/></td>
            </tr>
            <tr>
                <td>Xuất xứ</td>
                <td><input type="text" name="xuatxu"/></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="fileimage"/></td>
            </tr>
            <tr>
                
                <td><input type="submit" id="btnsubmit" value="Thêm"/></td>
                <td><input type="reset" value="Làm lại"/><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
    <hr/> 
</div>
<?php
 require './element_T/mod/thuonghieuCls.php';
 $lObj = new thuonghieu();
 $list_lh = $lObj->thuonghieuGetAll();
 $l=count($list_lh);
 ?>
<div class="title_thuonghieu">Danh sách thương hiệu</div>
<div class="content_thuonghieu">
    Trong bảng có: <b><?php echo $l ;?></b>
    <table border="solid">
        <thead>
            <th>id</th>
            <th>Tên thương hiệu</th>
            <th>Xuất xứ</th>
            <th>Hình ảnh</th>
            <th>Chức năng</th>
        </thead>
        <?php
        if($l > 0){
            foreach ($list_lh as $v){
                ?>
                <tr>
                    <td><?php echo $v->idthuonghieu ?></td>
                    <td><?php echo $v->tenthuonghieu?></td>
                    <td><?php echo $v->xuatxu ?></td>
                    <td align="center">
                        <img class="iconbutton" src="data:image/png;base64,<?php echo $v->hinhanh;?>">
                    </td>
                    <td align="center">
                        <?php
                        if(isset($_SESSION['ADMIN'])){
                            ?>
                                <a href="./element_T/mThuonghieu/thuonghieuAct.php?reqact=deletethuonghieu&idthuonghieu=<?php echo $v->idthuonghieu ; ?>">
                                    <img src="./img_T/delete.png" class="iconimg">
                                </a>
                            <?php
                        }else{
                            ?>
                                <img src="./img_T/delete.png" class="iconimg">
                            <?php
                        }
                            ?>
                                <img height=20px src="./img_T/update.png" class="w_update_btn_open_th" value="<?php echo $v->idthuonghieu;?>" >
                            
                    </td>
                </tr> 
                <?php
            }
        }
        ?>
    </table>
</div>
<div id="w_update_th">
    <div id="w_update_form_th"></div>
    <input type="button" value="close" id="w_close_btn_th">

</div>
