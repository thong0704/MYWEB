<?php 
    if(isset($_SESSION['USER'])){
        $namelogin = $_SESSION['USER'];
    }
    if(isset($_SESSION['ADMIN'])){
        $namelogin = $_SESSION['ADMIN'];
    }
    if(isset($_COOKIE[$namelogin])){
        echo 'Xin chào '. $namelogin . '<br/>';
        echo 'Lần đăng nhập gần nhất' . $_COOKIE[$namelogin];
    }
    echo '<br/>';
    if(isset($_REQUEST['result'])){
        if($_REQUEST['result']== 'ok'){
            ?>
           <img src="img_T/success.png" height="50px">
            <?php
        }else{
            ?>
            <img src="img_T/fail.png" height="50px">
            <?php
        }
    }else{
        ?>
            <img src="img_T/wait.png" height="50px">
        <?php
    }
?>