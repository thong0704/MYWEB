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
             case 'khachhangview':
                 require "./element_T/mKhachhang/khachhangView.php";
                break;
             case 'updatekhachhang':
                require "./element_T/mKhachhang/khachhangUpdate.php";
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
            case'dongiaview':
                require "./element_T/mdongia/dongiaView.php";
                break;
            case'thuoctinhhanghoaview':
                require "./element_T/mThuoctinhhanghoa/thuoctinhhanghoaView.php";
                break;
            case'chungtunhapview':
                require "./element_T/mChungtunhap/chungtunhapView.php";
                break;
            case'chitietchungtunhapview':
                require "./element_T/mChitietchungtunhap/chitietchungtunhapView.php";
                break;
            case'chungtuxuatview':
                require "./element_T/mChungtuxuat/chungtuxuatView.php";
                break;
            
            case'chitietchungtuxuatview':
                require "./element_T/mChitietchungtuxuat/chitietchungtuxuatView.php";
                break;
            
            
            }
        }
    else{
            require "./element_T/default.php";
        }
    
?>