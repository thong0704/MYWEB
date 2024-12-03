<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>đây là website của tôi</title>
        <link rel="stylesheet" href="./stylecss_T/myscc.css">
        <script type="text/javascript" src="./js_T/jquery-3.7.1.min.js"></script>
        <script type="text/javascript" src="./js_T/jscrip.js"></script>
    </head>
    <body>
        <?php
        if(!isset($_SESSION['USER']) && !isset($_SESSION['ADMIN'])){
            header('location:userLogin.php');
        } 
        ?>
        <div id="top_div">
            <?php require './element_T/top.php'; ?>
        </div>
        <div id="left_div">
            <?php require './element_T/left.php';?>
        </div>
        <div id="center_div">
            <?php require './element_T/center.php';?>
            
        </div>
        <div id="right_div">
        
        </div>
        <div id="bottom_div"></div>
        <div id="signoutbutton">
            <a href="./element_T/mUser/userAct.php?reqact=userlogout">
                <img src="img_T/logout.png" class="iconbutton"/>
            </a>
        </div>
    </body>
</html>