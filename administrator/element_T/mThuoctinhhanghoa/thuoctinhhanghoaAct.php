<?php

session_start();
require '../../element_T/mod/thuoctinhhanghoaCls.php';

if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            // Xử lý thêm mới
            // Nhận dữ liệu
            $giatri = $_REQUEST['giatri'];
            $ghichu = $_REQUEST['ghichu'];
            $idthuoctinh = $_REQUEST['idthuoctinh'];
            $idhanghoa = $_REQUEST['idhanghoa'];

            // Khởi tạo đối tượng và thêm mới
            $lh = new thuoctinhhanghoa();
            $kq = $lh->thuoctinhhanghoaAdd($giatri, $ghichu, $idthuoctinh, $idhanghoa);
            if ($kq) {
                header('Location: ../../index.php?req=thuoctinhhanghoaview&result=ok');
            } else {
                header('Location: ../../index.php?req=thuoctinhhanghoaview&result=failed');
            }
            break;

        case 'deletethuoctinhhanghoa':
            // Nhận dữ liệu gửi về và kiểm thử
            $idthuoctinhhanghoa = $_REQUEST['idthuoctinhhanghoa'];

            // Khởi tạo đối tượng và delete
            $lh = new thuoctinhhanghoa();
            $kq = $lh->thuoctinhhanghoaDelete($idthuoctinhhanghoa);
            if ($kq) {
                header('Location: ../../index.php?req=thuoctinhhanghoaview&result=ok');
            } else {
                header('Location: ../../index.php?req=thuoctinhhanghoaview&result=failed');
            }
            break;

        case 'updatethuoctinhhanghoa':
            $idthuoctinhhanghoa = $_REQUEST['idthuoctinhhanghoa'];
            $giatri = $_REQUEST['giatri'];
            $ghichu = $_REQUEST['ghichu'];
            $idthuoctinh = $_REQUEST['idthuoctinh'];
            $idhanghoa = $_REQUEST['idhanghoa'];

            // Khởi tạo đối tượng và cập nhật
            $lh = new thuoctinhhanghoa();
            try {
                $kq = $lh->thuoctinhhanghoaUpdate($giatri, $ghichu, $idthuoctinh, $idhanghoa, $idthuoctinhhanghoa);
                if ($kq) {
                    header('Location: ../../index.php?req=thuoctinhhanghoaview&result=ok');
                } else {
                    header('Location: ../../index.php?req=thuoctinhhanghoaview&result=failed');
                }
            } catch (PDOException $e) {
                echo 'Lỗi cập nhật: ' . $e->getMessage();
            }
            break;

        default:
            header('Location: ../../index.php?req=thuoctinhhanghoaview');
            break;
    }
} else {
    header('Location: ../../index.php?req=thuoctinhhanghoaview');
}
?>
