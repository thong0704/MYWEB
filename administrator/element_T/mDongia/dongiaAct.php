<?php

session_start();
    require '../../element_T/mod/dongiaCls.php';
//nếu có biến yêu cầu đúng thì cho vô còn không đẩy về index.php ngăn ko cho truy cập không mục đích rõ ràng
    if(isset($_GET['reqact'])) {
        $requestAction = $_GET['reqact'];
        switch($requestAction){
            case 'addnew':
                //Xử lý thêm mới
                //Nhận dữ liệu
                $giatridongia = $_REQUEST['giatridongia'];
                $apdung = $_REQUEST['apdung'];
                $ngaybatdau = $_REQUEST['ngaybatdau'];               
                $ngayketthuc = $_REQUEST['ngayketthuc'];
                $idhanghoa = $_REQUEST['idhanghoa'];
                 $lh = new dongia();
                 $kq = $lh->dongiaAdd($giatridongia, $apdung, $ngaybatdau, $ngayketthuc, $idhanghoa );
                 //echo $kq . '</br>';
                 if($kq){
                     header('location:../../index.php?req=dongiaview&result=ok');
                 }else{
                     header('location:../../index.php?req=dongiaview&result=failed');
                 };
                break;

            case 'deletedongia':
                //Nhạn dữ liệu gửi về và kiểm thử
                $iddongia = $_REQUEST['iddongia'];
                //khởi tạo đối tượng và delete
                $lh = new dongia();
                $kq = $lh->dongiaDelete($iddongia);
                //xử lý kết quả trả về
                if($kq){
                    header('location:../../index.php?req=dongiaview&result=ok');
                }else{
                    header('location:../../index.php?req=dongiaview&result=failed');
                };
                
                break;

                
                
                        case 'updatehanghoa':
                            $giatridongia = $_REQUEST['giatridongia'];
                            $apdung = $_REQUEST['apdung'];
                            $ngaybatdau = $_REQUEST['ngaybatdau'];               
                            $ngayketthuc = $_REQUEST['ngayketthuc'];
                            $idhanghoa = $_REQUEST['idhanghoa'];

                
                            $lh = new dongia();
                            try {
                                $kq = $lh->dongiaUpdate($giatridongia, $apdung, $ngaybatdau, $ngayketthuc, $idhanghoa );
                                if ($kq) {
                                    header('location:../../index.php?req=dongiaview&result=ok');
                                } else {
                                    header('location:../../index.php?req=dongiaview&result=failed');
                                }
                            } catch (PDOException $e) {
                                echo 'Lỗi cập nhật: ' . $e->getMessage();
                            }
                            break;
                
                        default:
                            header('location:../../index.php?req=dongiaview');
                            break;
                    }
                } else {
                    header('location:../../index.php?req=dongiaview');
                }
                ?>
                