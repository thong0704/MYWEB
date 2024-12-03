<?php
session_start();
require '../../element_T/mod/userCls.php';
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
                    $userObj = new user();
                    $userObj ->UserAdd($username,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai);
                    
                    $kq= $userObj;
                    if($kq){
                        header('location:../../index.php?reqact=userview&result=ok');
                    }else{
                        header('location:../../index.php?reqact=userview&result=notok');
                    }
                    break;
                case 'deleteuser':
                    $iduser = $_REQUEST['iduser'];
                    $userObj = new user();
                    $kq = $userObj ->UserDelete($iduser);
                    if($kq){
                        header('location:../../index.php?reqact=userview&result=ok');
                    }else{
                        header('location:../../index.php?reqact=userview&result=notok');
                    }
                    break;
                case 'setlock':
                    $iduser = $_REQUEST['iduser'];
                    $setlock = $_REQUEST['setlock'];
                    $userObj = new user();
                    if($setlock==1){
                        $kq=$userObj->UserSetActive($iduser,0);
                    }else{
                        $kq=$userObj->UserSetActive($iduser,1);
                    }
                    if($kq){
                        header('location:../../index.php?reqact=userview&result=ok');
                    }else{
                        header('location:../../index.php?reqact=userview&result=notok');
                        }
                    break;
                case 'updateuser':
                    $iduser=$_REQUEST['iduser'];
                    $username=$_REQUEST['username'];
                    $password=$_REQUEST['password'];
                    $hoten=$_REQUEST['hoten'];
                    $gioitinh=$_REQUEST['gioitinh'];
                    $ngaysinh=$_REQUEST['ngaysinh'];
                    $diachi=$_REQUEST['diachi'];
                    $dienthoai=$_REQUEST['dienthoai'];
                    
                    $userObj = new user();
                    $kq = $userObj ->UserUpdate($username,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai,$iduser);
                    if($kq){
                        header('location:../../index.php?reqact=userview&result=ok');
                    }else{
                        header('location:../../index.php?reqact=userview&result=notok');
                        }
                    break;
                case 'checklogin':
                    $username=$_REQUEST['username'];
                    $password=$_REQUEST['password'];
                    $userObj= new user();
                    $kq=$userObj->UserCheckLogin($username,$password);
                    if($kq){
                        if($username == 'admin'){
                            $_SESSION['ADMIN']= $username;
                        }else{
                            $_SESSION['USER'] =$username;
                        
                        }
                        header('location:../../index.php?result=ok');
                    }else{
                        header('location:../../index.php?reqact=userview&result=notok');
                    }

                    break;
                case'userlogout':
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
                header('location:../../index.php?reqact=userview');
                break;
                
            }
    }else{
        header('location:../../index.php?reqact=userview');
    }
?>