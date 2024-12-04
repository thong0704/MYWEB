<?php
    if(isset($_REQUEST['reqact'])){
        $request =$_REQUEST['reqact'];
        switch($request){
            case 'userview':
                require "./element_T/mUser/userView.php";
                break;
            case 'updateuser':
                require "./element_T/mUser/userUpdate.php";
                break;
            case 'loaihangview':
                require "./element_T/mLoaihang/loaihangView.php";
                break;
            case'hanghoaview':
                require "./element_T/mhanghoa/hanghoaView.php";
                break;
            case'thuoctinhview':
                require "./element_T/mthuoctinh/thuoctinhView.php";
                break;
            case'thuonghieuview':
                require "./element_T/mthuonghieu/thuonghieuView.php";
                break;
            }
        }
    else{
            require "./element_T/default.php";
        }
    
?>