<?php
    if(isset($_REQUEST['reqact'])){
        $request =$_REQUEST['reqact'];
        switch($request){
            case 'userview':
                require "./element_T/mUser/userView.php";
                break;
            case 'updateuser':
                require "./element_T/mUser/userUpdate.php";
                break;
            case 'loaihangview':
                require "./element_T/mloaihang/loaihangView.php";
                break;
            case'hanghoaview':
                require "./element_T/mhanghoa/hanghoaView.php";
                break;

            
           
            }
        }
    else{
            require "./element_T/default.php";
        }
    
?>