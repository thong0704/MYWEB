<?php
session_start();
require '../../element_T/mod/chungtuxuatCls.php';

if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch($requestAction) {
        case 'addnew':
            // Xử lý thêm mới
            // Nhận dữ liệu
            $tenchungtuxuat = $_REQUEST['tenchungtuxuat'];
            $ngaylap = $_REQUEST['ngaylap'];
            $tongtien = $_REQUEST['tongtien'];
            $idhanghoa = $_REQUEST['idhanghoa'];
            $idkhachhang = $_REQUEST['idkhachhang']; 

            $chungtu = new chungtuxuat();
            $kq = $chungtu->chungtuxuatAdd($tenchungtuxuat, $ngaylap, $tongtien, $idhanghoa, $idkhachhang);
            if($kq){
                header('location:../../index.php?req=chungtuxuatview&result=ok');
            }else{
                header('location:../../index.php?req=chungtuxuatview&result=failed');
            };
            break;

        case 'deletechungtuxuat':
            // Nhận dữ liệu gửi về và kiểm thử
            $idchungtuxuat = $_REQUEST['idchungtuxuat'];
            // Khởi tạo đối tượng và delete
            $chungtu = new chungtuxuat();
            $kq = $chungtu->chungtuxuatDelete($idchungtuxuat);
            if($kq){
                header('location:../../index.php?req=chungtuxuatview&result=ok');
            }else{
                header('location:../../index.php?req=chungtuxuatview&result=failed');
            };
            break;

        case 'updatechungtuxuat':
            $idchungtuxuat = $_REQUEST['idchungtuxuat'];
            $tenchungtuxuat = $_REQUEST['tenchungtuxuat'];
            $ngaylap = $_REQUEST['ngaylap'];
            $tongtien = $_REQUEST['tongtien'];
            $idhanghoa = $_REQUEST['idhanghoa'];
            $idkhachhang = $_REQUEST['idkhachhang'];

            $chungtu = new chungtuxuat();
            try {
                $kq = $chungtu->chungtuxuatUpdate($tenchungtuxuat, $ngaylap, $tongtien, $idhanghoa, $idkhachhang, $idchungtuxuat);
                if ($kq) {
                    header('location:../../index.php?req=chungtuxuatview&result=ok');
                } else {
                    header('location:../../index.php?req=chungtuxuatview&result=failed');
                }
            } catch (PDOException $e) {
                echo 'Lỗi cập nhật: ' . $e->getMessage();
            }
            break;

        default:
            header('location:../../index.php?req=chungtuxuatview');
            break;
    }
} else {
    header('location:../../index.php?req=chungtuxuatview');
}
?>
