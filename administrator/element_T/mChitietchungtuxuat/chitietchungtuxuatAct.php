<?php
session_start();
require '../../element_T/mod/chitietchungtuxuatCls.php';

if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch($requestAction){
        case 'addnew':
            if (isset($_REQUEST['soluong']) && isset($_REQUEST['iddongia']) && isset($_REQUEST['idchungtuxuat'])) {
                $soluong = $_REQUEST['soluong'];
                $iddongia = $_REQUEST['iddongia'];
                $idchungtuxuat = $_REQUEST['idchungtuxuat'];

                $ctctx = new chitietchungtuxuat();
                $kq = $ctctx->chitietchungtuxuatAdd($soluong, $iddongia, $idchungtuxuat);
                
                if ($kq) {
                    header('location:../../index.php?req=chitietchungtuxuatview&result=ok');
                } else {
                    header('location:../../index.php?req=chitietchungtuxuatview&result=failed');
                };
            } else {
                echo 'Lỗi: Dữ liệu không hợp lệ';
            }
            break;

        case 'deletechitietchungtuxuat':
            if (isset($_REQUEST['idchitietchungtuxuat'])) {
                $idchitietchungtuxuat = $_REQUEST['idchitietchungtuxuat'];

                $ctctx = new chitietchungtuxuat();
                $kq = $ctctx->chitietchungtuxuatDelete($idchitietchungtuxuat);
                
                if ($kq) {
                    header('location:../../index.php?req=chitietchungtuxuatview&result=ok');
                } else {
                    header('location:../../index.php?req=chitietchungtuxuatview&result=failed');
                };
            } else {
                echo 'Lỗi: Dữ liệu không hợp lệ';
            }
            break;

        case 'updatechitietchungtuxuat':
            if (isset($_REQUEST['soluong']) && isset($_REQUEST['iddongia']) && isset($_REQUEST['idchungtuxuat']) && isset($_REQUEST['idchitietchungtuxuat'])) {
                $soluong = $_REQUEST['soluong'];
                $iddongia = $_REQUEST['iddongia'];
                $idchungtuxuat = $_REQUEST['idchungtuxuat'];
                $idchitietchungtuxuat = $_REQUEST['idchitietchungtuxuat'];

                $ctctx = new chitietchungtuxuat();
                try {
                    $kq = $ctctx->chitietchungtuxuatUpdate($soluong, $iddongia, $idchungtuxuat, $idchitietchungtuxuat);
                    if ($kq) {
                        header('location:../../index.php?req=chitietchungtuxuatview&result=ok');
                    } else {
                        header('location:../../index.php?req=chitietchungtuxuatview&result=failed');
                    }
                } catch (PDOException $e) {
                    echo 'Lỗi cập nhật: ' . $e->getMessage();
                }
            } else {
                echo 'Lỗi: Dữ liệu không hợp lệ';
            }
            break;

        default:
            header('location:../../index.php?req=chitietchungtuxuatview');
            break;
    }
} else {
    header('location:../../index.php?req=chitietchungtuxuatview');
}
?>
