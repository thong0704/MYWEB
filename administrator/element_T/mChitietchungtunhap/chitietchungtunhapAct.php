<?php
session_start();
require '../../element_T/mod/chitietchungtunhapCls.php';

if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch($requestAction){
        case 'addnew':
            if (isset($_REQUEST['soluong']) && isset($_REQUEST['iddongia']) && isset($_REQUEST['idchungtunhap'])) {
                $soluong = $_REQUEST['soluong'];
                $iddongia = $_REQUEST['iddongia'];
                $idchungtunhap = $_REQUEST['idchungtunhap'];

                $ctctn = new chitietchungtunhap();
                $kq = $ctctn->chitietchungtunhapAdd($soluong, $iddongia, $idchungtunhap);
                
                if ($kq) {
                    header('location:../../index.php?req=chitietchungtunhapview&result=ok');
                } else {
                    header('location:../../index.php?req=chitietchungtunhapview&result=failed');
                };
            } else {
                echo 'Lỗi: Dữ liệu không hợp lệ';
            }
            break;

        case 'deletechitietchungtunhap':
            if (isset($_REQUEST['idchitietchungtunhap'])) {
                $idchitietchungtunhap = $_REQUEST['idchitietchungtunhap'];

                $ctctn = new chitietchungtunhap();
                $kq = $ctctn->chitietchungtunhapDelete($idchitietchungtunhap);
                
                if ($kq) {
                    header('location:../../index.php?req=chitietchungtunhapview&result=ok');
                } else {
                    header('location:../../index.php?req=chitietchungtunhapview&result=failed');
                };
            } else {
                echo 'Lỗi: Dữ liệu không hợp lệ';
            }
            break;

        case 'updatechitietchungtunhap':
            if (isset($_REQUEST['soluong']) && isset($_REQUEST['iddongia']) && isset($_REQUEST['idchungtunhap']) && isset($_REQUEST['idchitietchungtunhap'])) {
                $soluong = $_REQUEST['soluong'];
                $iddongia = $_REQUEST['iddongia'];
                $idchungtunhap = $_REQUEST['idchungtunhap'];
                $idchitietchungtunhap = $_REQUEST['idchitietchungtunhap'];

                $ctctn = new chitietchungtunhap();
                try {
                    $kq = $ctctn->chitietchungtunhapUpdate($soluong, $iddongia, $idchungtunhap, $idchitietchungtunhap);
                    if ($kq) {
                        header('location:../../index.php?req=chitietchungtunhapview&result=ok');
                    } else {
                        header('location:../../index.php?req=chitietchungtunhapview&result=failed');
                    }
                } catch (PDOException $e) {
                    echo 'Lỗi cập nhật: ' . $e->getMessage();
                }
            } else {
                echo 'Lỗi: Dữ liệu không hợp lệ';
            }
            break;

        default:
            header('location:../../index.php?req=chitietchungtunhapview');
            break;
    }
} else {
    header('location:../../index.php?req=chitietchungtunhapview');
}
?>
