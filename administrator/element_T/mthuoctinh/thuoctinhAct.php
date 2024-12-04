<?php
    session_start();
    require '../../element_T/mod/thuoctinhCls.php';
        if(isset($_REQUEST['reqact'])){
                $requestAction = $_REQUEST['reqact'];
                switch ($requestAction){
                    case 'addnew':
                        $tenthuoctinh=$_REQUEST['tenthuoctinh'];
                        $mota = $_REQUEST['mota'];
                        $hinhanh=$_FILES['fileimage']['tmp_name'];
                        $hinhanh=base64_encode(file_get_contents(addslashes($hinhanh)));
                        $userObj = new thuoctinh();
                        $userObj ->thuoctinhAdd($tenthuoctinh,$hinhanh,$mota);
                        $kq= $userObj;
                        if($kq){
                            header('location:../../index.php?reqact=thuoctinhview&result=ok');
                        }else{
                            header('location:../../index.php?reqact=thuoctinhview&result=notok');
                        }
                        break;
                    case 'deletethuoctinh':
                        $idthuoctinh = $_REQUEST['idthuoctinh'];
                        $tt = new thuoctinh();
                        $kq = $tt ->thuoctinhDelete($idthuoctinh);
                        if($kq){
                            header('location:../../index.php?reqact=thuoctinhview&result=ok');
                        }else{
                            header('location:../../index.php?reqact=thuoctinhview&result=notok');
                        }
                        break;
                    case 'updatethuoctinh':
                        $idthuoctinh=$_REQUEST['idthuoctinh'];
                        $tenthuoctinh=$_REQUEST['tenthuoctinh'];
                        $mota = $_REQUEST['mota'];

                        if(file_exists($_FILES['fileimage']['tmp_name'])){
                            $hinhanh =$_FILES['fileimage']['tmp_name'];
                        }else{
                            $hinhanh =$_REQUEST['hinhanh'];
                            //$hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
                        }
                        $thuoctinh = new thuoctinh();
                        $rc = $thuoctinh->thuoctinhUpdate($tenthuoctinh,  $hinhanh,$mota,$idthuoctinh);
                        if($rc){
                            header('location:../../index.php?reqact=thuoctinhview&result=ok');
                        }else{
                            header('location:../../index.php?reqact=thuoctinhview&result=notok');
                        }
                        break;
                }
        }else{
            header('location:../../index.php?reqact=userview');
        }
    ?>