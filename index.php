<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang sản phẩm hàng hóa tiêu dùng giải trí</title>
    <link type="text/css" rel="stylesheet" href="public_files/pmycss.css"/>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="lvOne">
        <?php 
       
        ?>
    </div>
    <div id="lvTwo">
        <?php 
            require './apart/menuLoaihang.php';
        ?>
    </div>
    <div id="lvTwo">
        <?php 
           require './apart/menuThuonghieu.php';
        ?>
    </div>
    <div id="lvThree">
        <?php 
            if(!isset($_GET['reqHanghoa'])){
                require 'apart/viewListLoaihang.php';
            }else{
                require './apart/viewHanghoa.php';
            }
        ?>
    </div>
</body>
</html>
