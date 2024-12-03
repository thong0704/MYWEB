<?php
    require '../../element_T/mod/hanghoaCls.php';
        if(isset($_REQUEST['reqact'])){
                $requestAction = $_REQUEST['reqact'];
                switch ($requestAction){
                    case 'addnew':
                        $tenhanghoa=$_REQUEST['tenhanghoa']; 
                        $giathamkhao=$_REQUEST['giathamkhao'];
                        $mota=$_REQUEST['mota'];
                        $idloaihang = $_REQUEST['idloaihang'];
                        $hinhanh_file=$_FILES['fileimage']['tmp_name'];
                        $hinhanh=base64_encode(file_get_contents(addslashes($hinhanh_file)));
                        $userObj = new hanghoa();
                        $userObj ->hanghoaAdd($tenhanghoa,$hinhanh,$mota,$giathamkhao,$idloaihang);
                        $kq= $userObj;
                        if($kq){
                            header('location:../../index.php?reqact=hanghoaview&result=ok');
                        }else{
                            header('location:../../index.php?reqact=hanghoaview&result=notok');
                        }
                        break;
                    case 'deletehanghoa':
                        $idhanghoa = $_REQUEST['idhanghoa'];
                        $lh = new hanghoa();
                        $kq = $lh ->hanghoaDelete($idhanghoa);
                        if($kq){
                            header('location:../../index.php?reqact=hanghoaview&result=ok');
                        }else{
                            header('location:../../index.php?reqact=hanghoaview&result=notok');
                        }
                        break;
                    case 'updatehanghoa':
                        $idhanghoa=$_REQUEST['idhanghoa'];
                        $tenhanghoa=$_REQUEST['tenhanghoa'];
                        $giathamkhao=$_REQUEST['giathamkhao'];
                        $mota=$_REQUEST['mota'];
                        if(file_exists($_FILES['fileimage']['tmp_name'])){
                            $hinhanh =$_FILES['fileimage']['tmp_name'];
                        }else{
                            $hinhanh =$_REQUEST['hinhanh'];
                            //$hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
                        }
                        $loaihang = new  hanghoa();
                        $rc = $loaihang-> hanghoaUpdate($tenhanghoa,$hinhanh,$mota,$giathamkhao,$idhanghoa);
                        if($rc){
                            header('location:../../index.php?reqact=hanghoaview&result=ok');
                        }else{
                            header('location:../../index.php?reqact=hanghoaview&result=notok');
                        }
                        break;
                 
                    
                }
        }else{
            header('location:../../index.php?reqact=hanghoarview');
        }
    ?>
