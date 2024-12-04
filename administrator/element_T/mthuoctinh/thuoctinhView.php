<div align="center">Quản lý thuộc tính</div>
<hr>
<div> <h3>Thêm thuộc tính</h3></div>
<div>
<form name="newthuoctinh" id="formaddthuoctinh" method="post" action="./element_T/mthuoctinh/thuoctinhAct.php?reqact=addnew"
            enctype="multipart/form-data">
        
        <table>
            <tr>
                <td>Tên thuộc tính</td>
                <td><input type="text" name="tenthuoctinh"/></td>
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
 require './element_T/mod/thuoctinhCls.php';
 $lObj = new thuoctinh();
 $list_lh = $lObj->thuoctinhGetAll();
 $l=count($list_lh);
 ?>
<div class="title_thuoctinh">Danh sách thuộc tính</div>
<div class="content_thuoctinh">
    Trong bảng có: <b><?php echo $l ;?></b>
    <table border="solid">
        <thead>
            <th>id</th>
            <th>Tên thuộc tính</th>
            <th>Mô tả</th>
            <th>Hình ảnh</th>
        </thead>
        <?php
        if($l > 0){
            foreach ($list_lh as $v){
                ?>
                <tr>
                    <td><?php echo $v->idthuoctinh ?></td>
                    <td><?php echo $v->tenthuoctinh?></td>
                    <td><?php echo $v->mota ?></td>
                    <td align="center">
                        <img class="iconbutton" src="data:image/png;base64,<?php echo $v->hinhanh;?>">
                    </td>
                    <td align="center">
                        <?php
                        if(isset($_SESSION['ADMIN'])){
                            ?>
                                <a href="./element_T/mthuoctinh/thuoctinhAct.php?reqact=deletethuoctinh&idthuoctinh=<?php echo $v->idthuoctinh ; ?>">
                                    <img src="./img_T/delete.png" class="iconimg">
                                </a>
                            <?php
                        }else{
                            ?>
                                <img src="./img_T/delete.png" class="iconimg">
                            <?php
                        }
                            ?>
                                <img height=20px src="./img_T/update.png" class="w_update_btn_open_tt" value="<?php echo $v->idthuoctinh;?>" >
                            
                    </td>
                </tr> 
                <?php
            }
        }
        ?>
    </table>
</div>
<div id="w_update_tt">
    <div id="w_update_form_tt"></div>
    <input type="button" value="close" id="w_close_btn_tt">

</div>
