<?php
session_start();
require '../../element_T/mod/khachhangCls.php';
    if(isset($_REQUEST['reqact'])){
            $requestAction = $_REQUEST['reqact'];
            switch ($requestAction){
                case 'addnew':
                    $username=$_REQUEST['username'];
                    $password=$_REQUEST['password'];
                    $hoten=$_REQUEST['hoten'];
                    $gioitinh=$_REQUEST['gioitinh'];
                    $ngaysinh=$_REQUEST['ngaysinh'];
                    $diachi=$_REQUEST['diachi'];
                    $dienthoai=$_REQUEST['dienthoai'];
                    /*echo $username . '<br/>';
                    echo $password . '<br/>';
                    echo $hoten . '<br/>';
                    echo $gioitinh . '<br/>';
                    echo $ngaysinh . '<br/>';
                    echo $diachi . '<br/>';
                    echo $dienthoai . '<br/>';*/
                    $khachhangObj = new khachhang();
                    $khachhangObj ->KhachhangAdd($username,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai);
                    
                    $kq= $khachhangObj;
                    if($kq){
                        header('location:../../index.php?reqact=khachhangview&result=ok');
                    }else{
                        header('location:../../index.php?reqact=khachhangview&result=notok');
                    }
                    break;
                case 'deletekhachhang':
                    $idkhachhang = $_REQUEST['idkhachhang'];
                    $khachhangObj = new khachhang();
                    $kq = $khachhangObj ->KhachhangDelete($idkhachhang);
                    if($kq){
                        header('location:../../index.php?reqact=khachhangview&result=ok');
                    }else{
                        header('location:../../index.php?reqact=khachhangview&result=notok');
                    }
                    break;
                case 'setlock':
                    $idkhachhang = $_REQUEST['idkhachhang'];
                    $setlock = $_REQUEST['setlock'];
                    $khachhangObj = new khachhang();
                    if($setlock==1){
                        $kq=$khachhangObj->KhachhangSetActive($idkhachhang,0);
                    }else{
                        $kq=$khachhangObj->KhachhangSetActive($idkhachhang,1);
                    }
                    if($kq){
                        header('location:../../index.php?reqact=khachhangview&result=ok');
                    }else{
                        header('location:../../index.php?reqact=khachhangview&result=notok');
                        }
                    break;
                case 'updatekhachhang':
                    $idkhachhang=$_REQUEST['idkhachhang'];
                    $username=$_REQUEST['username'];
                    $password=$_REQUEST['password'];
                    $hoten=$_REQUEST['hoten'];
                    $gioitinh=$_REQUEST['gioitinh'];
                    $ngaysinh=$_REQUEST['ngaysinh'];
                    $diachi=$_REQUEST['diachi'];
                    $dienthoai=$_REQUEST['dienthoai'];
                    
                    $khachhangObj = new khachhang();
                    $kq = $khachhangObj ->KhachhangUpdate($username,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai,$idkhachhang);
                    if($kq){
                        header('location:../../index.php?reqact=khachhangview&result=ok');
                    }else{
                        header('location:../../index.php?reqact=khachhangview&result=notok');
                        }
                    break;
                case 'checklogin':
                    $username=$_REQUEST['username'];
                    $password=$_REQUEST['password'];
                    $khachhangObj= new khachhang();
                    $kq=$khachhangObj->KhachhangCheckLogin($username,$password);
                    if($kq){
                        if($username == 'admin'){
                            $_SESSION['ADMIN']= $username;
                        }else{
                            $_SESSION['USER'] =$username;
                        
                        }
                        header('location:../../index.php?result=ok');
                    }else{
                        header('location:../../index.php?reqact=khachhangview&result=notok');
                    }

                    break;
                case'khachhanglogout':
                    $time_login = date('h:i - d/m/y');
                    if(isset($_SESSION['USER'])){
                        $namelogin = $_SESSION['USER'];
                    }
                    if(isset($_SESSION['ADMIN'])){
                        $namelogin = $_SESSION['ADMIN'];
                    }
                    setcookie($namelogin,$time_login,time()+(86400*30),'/');//1month
                    session_destroy();//xoa het tatca session
                    header('location:../../index.php');
                    break;
                default:
                header('location:../../index.php?reqact=khachhangview');
                break;
                
            }
    }else{
        header('location:../../index.php?reqact=khachhangview');
    }
?>
