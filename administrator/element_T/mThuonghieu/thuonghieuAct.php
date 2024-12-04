<?php

session_start();
    require '../../element_T/mod/thuonghieuCls.php';
//nếu có biến yêu cầu đúng thì cho vô còn không đẩy về index.php ngăn ko cho truy cập không mục đích rõ ràng
    if(isset($_GET['reqact'])) {
        $requestAction = $_GET['reqact'];
        switch($requestAction){
            case 'addnew':
                //Xử lý thêm mới
                //Nhận dữ liệu
                $tenthuonghieu = $_REQUEST['tenthuonghieu'];
                $xuatxu = $_REQUEST['xuatxu'];
                $hinhanh_file = $_FILES['fileimage']['tmp_name'];
                //nh là mtrận 2 chiều nên phải mã hóa thành 1 chiều để lưu :
                $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh_file)));
                
                echo $tenthuonghieu. '</br>';
                echo $xuatxu . '</br>';
                //echo $hinhanh;
                $thuonghieu = new thuonghieu();
                $rs = $thuonghieu->thuonghieuAdd($tenthuonghieu,$hinhanh,$xuatxu);
                if($rs){
                    header('location:../../index.php?req=thuonghieuview&result=ok');
                }else{
                    header('location:../../index.php?req=thuonghieuview&result=failed');
                };
                break;

            case 'deletethuonghieu':
                //Nhạn dữ liệu gửi về và kiểm thử
                $idthuonghieu = $_REQUEST['idthuonghieu'];
                //khởi tạo đối tượng và delete
                $lhObj = new thuonghieu();
                $rs = $lhObj->thuonghieuDelete($idthuonghieu);
                //xử lý kết quả trả về
                if($rs){
                    header('location:../../index.php?req=thuonghieuview&result=ok');
                }else{
                    header('location:../../index.php?req=thuonghieuview&result=failed');
                };
                break;


            case 'updatethuonghieu':
            //     //Nhận dữ liệu
                $idthuonghieu = $_REQUEST['idthuonghieu'];
                $tenthuonghieu = $_REQUEST['tenthuonghieu'];
                $xuatxu = $_REQUEST['xuatxu'];

                if (file_exists($_FILES['fileimage']['tmp_name'])){
                    $hinhanh_file = $_FILES['fileimage']['tmp_name'];              
                    $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh_file)));
                }else{
                    $hinhanh = $_REQUEST['hinhanh'];
                }
                 // //Kiem tra thu co nhan du lieu chua
                // echo $idloaihang. '</br>';
                // echo $tenloaihang. '</br>';
                // echo $mota . '</br>';            
                // echo $hinhanh. '</br>';
                 //Tao Obj va thuc hien update roi xu ly kq tra ve
                $lh = new thuonghieu();
                $kq = $lh->thuonghieuUpdate($tenthuonghieu, $hinhanh, $xuatxu, $idthuonghieu) ;
                if($kq){
                    header('location:../../index.php?req=thuonghieuview&result=ok');
                }else{
                    header('location:../../index.php?req=thuonghieuview&result=failed');
                };
                break;

            default :
                //dành cho trường hợp không gán thí đại giá trị nào đó không trong cấu trúc xử lí
                header('location:./index.php?req=thuonghieuview');
                break;
        }
    } else{
        //nhảy lại địa chỉ index.php
        header('location:../../index.php?req=thuonghieuview');
    };