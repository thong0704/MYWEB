<div align="center">Quản lý loại hàng</div>
<hr>
<div> <h3>Thêm loại hàng</h3></div>
<div>
<form name="newloaihang" id="formaddloaihang" method="post" action="./element_T/mloaihang/loaihangAct.php?reqact=addnew"
            enctype="multipart/form-data">
        
        <table>
            <tr>
                <td>Tên loại hàng</td>
                <td><input type="text" name="tenloaihang"/></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><input type="text" name="mota"/></td>
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
 require './element_T/mod/loaihangCls.php';
 $lObj = new loaihang();
 $list_lh = $lObj->loaihangGetAll();
 $l=count($list_lh);
 ?>
<div class="title_loaihang">Danh sách loại hàng</div>
<div class="content_loaihang">
    Trong bảng có: <b><?php echo $l ;?></b>
    <table border="solid">
        <thead>
            <th>id</th>
            <th>Tên loại hàng</th>
            <th>Mô tả</th>
            <th>Hình ảnh</th>
            <th>Chức năng</th>
        </thead>
        <?php
        if($l > 0){
            foreach ($list_lh as $v){
                ?>
                <tr>
                    <td><?php echo $v->idloaihang ?></td>
                    <td><?php echo $v->tenloaihang?></td>
                    <td><?php echo $v->mota ?></td>
                    <td align="center">
                        <img class="iconbutton" src="data:image/png;base64,<?php echo $v->hinhanh;?>">
                    </td>
                    <td align="center">
                        <?php
                        if(isset($_SESSION['ADMIN'])){
                            ?>
                                <a href="./element_T/mloaihang/loaihangAct.php?reqact=deleteloaihang&idloaihang=<?php echo $v->idloaihang ; ?>">
                                    <img src="./img_T/delete.png" class="iconimg">
                                </a>
                            <?php
                        }else{
                            ?>
                                <img src="./img_T/delete.png" class="iconimg">
                            <?php
                        }
                            ?>
                                <img height=20px src="./img_T/update.png" class="w_update_btn_open" value="<?php echo $v->idloaihang;?>" >
                            
                    </td>
                </tr> 
                <?php
            }
        }
        ?>
    </table>
</div>
<div id="w_update">
    <div id="w_update_form"></div>
    <input type="button" value="close" id="w_close_btn">

</div>
