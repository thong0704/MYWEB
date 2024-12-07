<?php
session_start();
require '../../element_T/mod/chungtunhapCls.php';

if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch($requestAction) {
        case 'addnew':
            // Xử lý thêm mới
            // Nhận dữ liệu
            $tenchungtu = $_REQUEST['tenchungtu'];
            $ngaylap = $_REQUEST['ngaylap'];
            $tongtien = $_REQUEST['tongtien'];
            $idhanghoa = $_REQUEST['idhanghoa'];
            $iduser = $_REQUEST['iduser']; 

            $chungtu = new chungtunhap();
            $kq = $chungtu->chungtunhapAdd($tenchungtu, $ngaylap, $tongtien, $idhanghoa, $iduser);
            if($kq){
                header('location:../../index.php?req=chungtunhapview&result=ok');
            }else{
                header('location:../../index.php?req=chungtunhapview&result=failed');
            };
            break;

        case 'deletechungtunhap':
            // Nhận dữ liệu gửi về và kiểm thử
            $idchungtunhap = $_REQUEST['idchungtunhap'];
            // Khởi tạo đối tượng và delete
            $chungtu = new chungtunhap();
            $kq = $chungtu->chungtunhapDelete($idchungtunhap);
            if($kq){
                header('location:../../index.php?req=chungtunhapview&result=ok');
            }else{
                header('location:../../index.php?req=chungtunhapview&result=failed');
            };
            break;

        case 'updatechungtunhap':
            $idchungtunhap = $_REQUEST['idchungtunhap'];
            $tenchungtu = $_REQUEST['tenchungtu'];
            $ngaylap = $_REQUEST['ngaylap'];
            $tongtien = $_REQUEST['tongtien'];
            $idhanghoa = $_REQUEST['idhanghoa'];
            $iduser = $_REQUEST['iduser']; // Đảm bảo tên biến đúng

            $chungtu = new chungtunhap();
            try {
                $kq = $chungtu->chungtunhapUpdate($tenchungtu, $ngaylap, $tongtien, $idhanghoa, $iduser, $idchungtunhap);
                if ($kq) {
                    header('location:../../index.php?req=chungtunhapview&result=ok');
                } else {
                    header('location:../../index.php?req=chungtunhapview&result=failed');
                }
            } catch (PDOException $e) {
                echo 'Lỗi cập nhật: ' . $e->getMessage();
            }
            break;

        default:
            header('location:../../index.php?req=chungtunhapview');
            break;
    }
} else {
    header('location:../../index.php?req=chungtunhapview');
}
?>
