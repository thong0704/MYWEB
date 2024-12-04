<?php

session_start();
    require '../../element_T/mod/loaihangCls.php';
//nếu có biến yêu cầu đúng thì cho vô còn không đẩy về index.php ngăn ko cho truy cập không mục đích rõ ràng
    if(isset($_GET['reqact'])) {
        $requestAction = $_GET['reqact'];
        switch($requestAction){
            case 'addnew':
                //Xử lý thêm mới
                //Nhận dữ liệu
                $tenloaihang = $_REQUEST['tenloaihang'];
                $mota = $_REQUEST['mota'];
                $hinhanh_file = $_FILES['fileimage']['tmp_name'];
                //nh là mtrận 2 chiều nên phải mã hóa thành 1 chiều để lưu :
                $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh_file)));
                
                echo $tenloaihang. '</br>';
                echo $mota . '</br>';
                //echo $hinhanh;
                $loaihang = new loaihang();
                $rs = $loaihang->LoaihangAdd($tenloaihang,$hinhanh,$mota);
                if($rs){
                    header('location:../../index.php?req=loaihangview&result=ok');
                }else{
                    header('location:../../index.php?req=loaihangview&result=failed');
                };
                break;

            case 'deleteloaihang':
                //Nhạn dữ liệu gửi về và kiểm thử
                $idloaihang = $_REQUEST['idloaihang'];
                //khởi tạo đối tượng và delete
                $lhObj = new loaihang();
                $rs = $lhObj->LoaihangDelete($idloaihang);
                //xử lý kết quả trả về
                if($rs){
                    header('location:../../index.php?req=loaihangview&result=ok');
                }else{
                    header('location:../../index.php?req=loaihangview&result=failed');
                };
                
                break;

            case 'updateloaihang':
            //     //Nhận dữ liệu
                $idloaihang = $_REQUEST['idloaihang'];
                $tenloaihang = $_REQUEST['tenloaihang'];
                $mota = $_REQUEST['mota'];

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
                $lh = new loaihang();
                $kq = $lh->LoaihangUpdate($tenloaihang, $hinhanh, $mota, $idloaihang) ;
                if($kq){
                    header('location:../../index.php?req=loaihangview&result=ok');
                }else{
                    header('location:../../index.php?req=loaihangview&result=failed');
                }
                break;

            default :
                //dành cho trường hợp không gán thí đại giá trị nào đó không trong cấu trúc xử lí
                header('location:./index.php?req=loaihangview');
                break;
        }
    } else{
        //nhảy lại địa chỉ index.php
        header('location:../../index.php?req=loaihangview');
    };