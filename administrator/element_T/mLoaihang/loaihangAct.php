<?php
    session_start();
    require '../../element_T/mod/loaihangCls.php';
        if(isset($_REQUEST['reqact'])){
                $requestAction = $_REQUEST['reqact'];
                switch ($requestAction){
                    case 'addnew':
                        $tenloaihang=$_REQUEST['tenloaihang'];
                        $mota=$_REQUEST['mota'];
                        $hinhanh=$_FILES['fileimage']['tmp_name'];
                        $hinhanh=base64_encode(file_get_contents(addslashes($hinhanh)));
                        $userObj = new loaihang();
                        $userObj ->loaihangAdd($tenloaihang,$hinhanh,$mota);
                        $kq= $userObj;
                        if($kq){
                            header('location:../../index.php?reqact=loaihangview&result=ok');
                        }else{
                            header('location:../../index.php?reqact=loaihangview&result=notok');
                        }
                        break;
                    case 'deleteloaihang':
                        $idloaihang = $_REQUEST['idloaihang'];
                        $lh = new loaihang();
                        $kq = $lh ->loaihangDelete($idloaihang);
                        if($kq){
                            header('location:../../index.php?reqact=loaihangview&result=ok');
                        }else{
                            header('location:../../index.php?reqact=loaihangview&result=notok');
                        }
                        break;
                    case 'updateloaihang':
                        $idloaihang=$_REQUEST['idloaihang'];
                        $tenloaihang=$_REQUEST['tenloaihang'];
                        $mota=$_REQUEST['mota'];
                        if(file_exists($_FILES['fileimage']['tmp_name'])){
                            $hinhanh =$_FILES['fileimage']['tmp_name'];
                        }else{
                            $hinhanh =$_REQUEST['hinhanh'];
                            //$hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
                        }
                        $loaihang = new loaihang();
                        $rc = $loaihang->loaihangUpdate($tenloaihang,$hinhanh,$mota,$idloaihang);
                        if($rc){
                            header('location:../../index.php?reqact=loaihangview&result=ok');
                        }else{
                            header('location:../../index.php?reqact=loaihangview&result=notok');
                        }
                        break;
                }
        }else{
            header('location:../../index.php?reqact=userview');
        }
    ?>