<div align="center">Quản lý hàng hóa</div>
<hr>
<?php
 require './element_T/mod/loaihangCls.php';
 $lObj = new loaihang();
 $list_lh = $lObj->loaihangGetAll();
 $l=count($list_lh);
 ?>
<div> <h3>Thêm hàng hóa</h3></div>
<div>
<form name="newhanghoa" id="formaddhanghoa" method="post" action="./element_T/mHanghoa/hanghoaAct.php?reqact=addnew"
            enctype="multipart/form-data">
        
        <table>
            <tr>
                <td>Tên hàng hóa</td>
                <td><input type="text" name="tenhanghoa"/></td>
            </tr>
            <tr>
                <td>Giá tham khảo</td>
                <td><input type="number" name="giathamkhao"/></td>
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
                <td>chon loại hàng</td>
                <td>
                    <?php
                        foreach($list_lh as $l){
                            ?>
                                <input type="radio" name="idloaihang" value="<?php echo $l->idloaihang; ?>">
                                <?php echo $l->idloaihang; ?> 
                                <img class="iconbutton" src="data:image/png;base64,<?php echo $l->hinhanh;?>">
                                <br>
                            <?php
                        }
                    ?>
                </td>
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
 require './element_T/mod/hanghoaCls.php';
 $lObj = new hanghoa();
 $list_lh = $lObj->hanghoaGetAll();
 $l=count($list_lh);
 ?>
<div class="title_hanghoa">Danh sách hàng hóa</div>
<div class="content_hanghoa">
    Trong bang co: <b><?php echo $l ;?></b>
    <table border="solid">
        <thead>
            <th>id</th>
            <th>Tên hàng hóa</th>
            <th>Giá tham khảo</th>
            <th>Mô tả</th>
            <th>Hình ảnh</th>
            <th>Chức năng</th>
        </thead>
        <?php
        if($l > 0){
            foreach ($list_lh as $v){
                ?>
                <tr>
                    <td><?php echo $v->idhanghoa ?></td>
                    <td><?php echo $v->tenhanghoa?></td>
                    <td><?php echo $v->giathamkhao?></td>
                    <td><?php echo $v->mota ?></td>
                    <td align="center">
                        <img class="iconbutton" src="data:image/png;base64,<?php echo $v->hinhanh;?>">
                    </td>
                    <td align="center">
                        <?php
                        if(isset($_SESSION['ADMIN'])){
                            ?>
                                <a href="./element_T/mhanghoa/hanghoaAct.php?reqact=deletehanghoa&idhanghoa=<?php echo $v->idhanghoa ; ?>">
                                    <img src="./img_T/delete.png" class="iconimg">
                                </a>
                            <?php
                        }else{
                            ?>
                                <img src="./img_T/delete.png" class="iconimg">
                            <?php
                        }
                            ?>
                                <img height=20px src="./img_T/update.png" class="w_update_btn_open_hh" value="<?php echo $v->idhanghoa?>">
                
                    </td>
                </tr> 
                <?php
            }
        }
        ?>
    </table>
</div>
<div id="w_update_hh">
    <div id="w_update_form_hh"></div>
    <input type="button" value="close" id="w_close_btn_hh">

</div>