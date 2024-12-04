<?php

session_start();
    require '../../element_T/mod/hanghoaCls.php';
//nếu có biến yêu cầu đúng thì cho vô còn không đẩy về index.php ngăn ko cho truy cập không mục đích rõ ràng
    if(isset($_GET['reqact'])) {
        $requestAction = $_GET['reqact'];
        switch($requestAction){
            case 'addnew':
                //Xử lý thêm mới
                //Nhận dữ liệu
                $tenhanghoa = $_REQUEST['tenhanghoa'];
                $giathamkhao = $_REQUEST['giathamkhao'];
                $mota = $_REQUEST['mota'];               
                $idloaihang = $_REQUEST['idloaihang'];
                $idthuonghieu = $_REQUEST['idthuonghieu'];
                $hinhanh_file = $_FILES['fileimage']['tmp_name'];
                //nh là mtrận 2 chiều nên phải mã hóa thành 1 chiều để lưu :
                $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh_file)));
                
                // echo $idloaihang . '</br>';
                // echo $tenhanghoa. '</br>';
                // echo $mota . '</br>';
                // echo $giathamkhao . '</br>';               
                // echo $hinhanh . '</br>';
                 $lh = new hanghoa();
                 $kq = $lh->hanghoaAdd($tenhanghoa, $mota, $giathamkhao, $hinhanh, $idloaihang, $idthuonghieu );
                 //echo $kq . '</br>';
                 if($kq){
                     header('location:../../index.php?req=hanghoaview&result=ok');
                 }else{
                     header('location:../../index.php?req=hanghoaview&result=failed');
                 };
                break;

            case 'deletehanghoa':
                //Nhạn dữ liệu gửi về và kiểm thử
                $idhanghoa = $_REQUEST['idhanghoa'];
                //khởi tạo đối tượng và delete
                $lh = new hanghoa();
                $kq = $lh->hanghoaDelete($idhanghoa);
                //xử lý kết quả trả về
                if($kq){
                    header('location:../../index.php?req=hanghoaview&result=ok');
                }else{
                    header('location:../../index.php?req=hanghoaview&result=failed');
                };
                
                break;

                
                
                        case 'updatehanghoa':
                            $idhanghoa = $_REQUEST['idhanghoa'];
                            $tenhanghoa = $_REQUEST['tenhanghoa'];
                            $giathamkhao = $_REQUEST['giathamkhao'];
                            $idloaihang = $_REQUEST['idloaihang'];
                            $idthuonghieu = $_REQUEST['idthuonghieu'];
                            $mota = $_REQUEST['mota'];
                
                            if (file_exists($_FILES['fileimage']['tmp_name'])) {
                                $hinhanh_file = $_FILES['fileimage']['tmp_name'];
                                $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh_file)));
                            } else {
                                $hinhanh = $_REQUEST['hinhanh'];
                            }
                
                            $lh = new hanghoa();
                            try {
                                $kq = $lh->hanghoaUpdate($tenhanghoa, $hinhanh, $mota, $giathamkhao, $idloaihang, $idthuonghieu, $idhanghoa);
                                if ($kq) {
                                    header('location:../../index.php?req=hanghoaview&result=ok');
                                } else {
                                    header('location:../../index.php?req=hanghoaview&result=failed');
                                }
                            } catch (PDOException $e) {
                                echo 'Lỗi cập nhật: ' . $e->getMessage();
                            }
                            break;
                
                        default:
                            header('location:../../index.php?req=hanghoaview');
                            break;
                    }
                } else {
                    header('location:../../index.php?req=hanghoaview');
                }
                ?>
                