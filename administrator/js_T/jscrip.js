$(document).ready(function () {
    
    
    /*
   $("p").mouseenter(function () { 
        $(this).css("color","#00FF00");
   });
   $("p").mouseleave(function () { 
        $(this).css("color","#000066");
   });
   $(".cls01").mouseenter(function () { 
        $(this).css("color","#FF0000");
   });
   $(".cls01").mouseleave(function () { 
        $(this).css("color","#0000FF");
   });
   $("#id01").mouseenter(function () { 
        $(this).css("color","AA00BB");
        $(this).css("font-weight","bold");
   });
   $("#id01").mouseenter(function () { 
        $(this).css("color","#BB0000");
        $(this).css("font-weight","normal");
   });*/
   //menu left
   
   $(".itemOrder").hide();
   $(".cateOrder").click(function (e) { 
     e.preventDefault();
     $(this).next().slideDown();
   });
   $(".itemOrder").mouseleave(function () { 
     $(this).slideUp();
   });
   //center
   
   $('#formreg').submit(function () {
     var username = $("input[name*='username']").val();
     if (username.length === 0 || username.length < 3) {
          $("input[name*='username']").focus();
          $('#noteForm').html("Username chưa hợp lệ!");
          return false;
     }
     var password = $("input[name*='password']").val();
     if (password.length === 0 || password.length < 6) {
          $("input[name*='password']").focus();
          $('#noteForm').html("Password chưa hợp lệ!");
          return false;
     }
     var hoten = $("input[name*='hoten']").val();
     if (hoten.length === 0 || hoten.length < 6) {
          $("input[name*='hoten']").focus();
          $('#noteForm').html("Họ tên chưa hợp lệ!");
          return false;
     }
     var ngaysinh = $("input[name*='ngaysinh']").val();
     if (ngaysinh.length === 0) {
          $("input[name*='ngaysinh']").focus();
          $('#noteForm').html("Ngày sinh chưa hợp lệ!");
          return false;
     }
     var diachi = $("input[name*='diachi']").val();
     if (diachi.length === 0) {
          $("input[name*='diachi']").focus();
          $('#noteForm').html("Địa chỉ chưa hợp lệ!");
          return false;
     } 
     var dienthoai = $("input[name*='dienthoai']").val();
     if (dienthoai.length === 0) {
          $("input[name*='dienthoai']").focus();
          $('#noteForm').html("Điện thoại chưa hợp lệ!");
          return false;
     }
     return true;
     });
     $("#w_update").hide();//close
     $(".w_update_btn_open").click(function(e){
          e.preventDefault();
          $("#w_update").css("left",e.pageX +5);
          $("#w_update").css("top",e.pageY +5);
          var $idloaihang = $(this).attr('value');
          
          $("#w_update_form").load("./element_T/mloaihang/loaihangUpdate.php", {idloaihang:$idloaihang}, function (response, status, request) {
               this; // dom element     
          });
          $("#w_update").show();
     });
     $("#w_close_btn").click(function(e){
          e.preventDefault();
          $("#w_update").hide();
     });


     $("#w_update_th").hide();//close
     $(".w_update_btn_open_th").click(function(e){
          e.preventDefault();
          $("#w_update_th").css("left",e.pageX +5);
          $("#w_update_th").css("top",e.pageY +5);
          var $idthuonghieu = $(this).attr('value');
          
          $("#w_update_form_th").load("./element_T/mThuonghieu/thuonghieuUpdate.php", {idthuonghieu:$idthuonghieu}, function (response, status, request) {
               this; // dom element     
          });
          $("#w_update_th").show();
     });
     $("#w_close_btn_th").click(function(e){
          e.preventDefault();
          $("#w_update_th").hide();
     });


     $("#w_update_tt").hide();//close
     $(".w_update_btn_open_tt").click(function(e){
          e.preventDefault();
          $("#w_update_tt").css("left",e.pageX +5);
          $("#w_update_tt").css("top",e.pageY +5);
          var $idthuoctinh = $(this).attr('value');
          
          $("#w_update_form_tt").load("./element_T/mthuoctinh/thuoctinhUpdate.php", {idthuoctinh:$idthuoctinh}, function (response, status, request) {
               this; // dom element     
          });
          $("#w_update_tt").show();
     });
     $("#w_close_btn_tt").click(function(e){
          e.preventDefault();
          $("#w_update_tt").hide();
     });
     
     $("#w_update_dg").hide();//close
     $(".w_update_btn_open_dg").click(function(e){
          e.preventDefault();
          $("#w_update_dg").css("left",e.pageX +5);
          $("#w_update_dg").css("top",e.pageY +5);
          var $iddongia = $(this).attr('value');
          
          $("#w_update_form_dg").load("./element_T/mDongia/dongiaUpdate.php", {iddongia:$iddongia}, function (response, status, request) {
               this; // dom element     
          });
          $("#w_update_dg").show();
     });
     $("#w_close_btn_dg").click(function(e){
          e.preventDefault();
          $("#w_update_dg").hide();
     });
     
   
     
     $("#w_update_hh").hide();//close
     $(".w_update_btn_open_hh").click(function(e){
          e.preventDefault();
          $("#w_update_hh").css("left",e.pageX +5);
          $("#w_update_hh").css("top",e.pageY +5);
          var $idhanghoa = $(this).attr('value');
          
          $("#w_update_form_hh").load("./element_T/mHanghoa/hanghoaUpdate.php", {idhanghoa:$idhanghoa}, function (response, status, request) {
               this; // dom element     
          });
          $("#w_update_hh").show();
     });
     
     
     $("#w_close_btn_hh").click(function(e){
          e.preventDefault();
          $("#w_update_hh").hide();
     });

     
     $("#w_update_tthh").hide();//close
     $(".w_update_btn_open_tthh").click(function(e){
          e.preventDefault();
          $("#w_update_tthh").css("left",e.pageX +5);
          $("#w_update_tthh").css("top",e.pageY +5);
          var $idthuoctinhhanghoa = $(this).attr('value');
          
          $("#w_update_form_tthh").load("./element_T/mThuoctinhhanghoa/thuoctinhhanghoaUpdate.php", {idthuoctinhhanghoa:$idthuoctinhhanghoa}, function (response, status, request) {
               this; // dom element     
          });
          $("#w_update_tthh").show();
     });
     
     
     $("#w_close_btn_tthh").click(function(e){
          e.preventDefault();
          $("#w_update_tthh").hide();
     });


     $("#w_update_ctn").hide();//close
     $(".w_update_btn_open_ctn").click(function(e){
          e.preventDefault();
          $("#w_update_ctn").css("left",e.pageX +5);
          $("#w_update_ctn").css("top",e.pageY +5);
          var $idchungtunhap = $(this).attr('value');

          $("#w_update_form_ctn").load("./element_T/mChungtunhap/chungtunhapUpdate.php", {idchungtunhap:$idchungtunhap}, function (response, status, request) {
               this; // dom element     
          });
          $("#w_update_ctn").show();
     });
     
     
     $("#w_close_btn_ctn").click(function(e){
          e.preventDefault();
          $("#w_update_ctn").hide();
     });



     $("#w_update_cttn").hide();//close
     $(".w_update_btn_open_cttn").click(function(e){
          e.preventDefault();
          $("#w_update_cttn").css("left",e.pageX +5);
          $("#w_update_cttn").css("top",e.pageY +5);
          var $idchitietchungtunhap = $(this).attr('value');

          $("#w_update_form_cttn").load("./element_T/mChitietchungtunhap/chitietchungtunhapUpdate.php", {idchitietchungtunhap:$idchitietchungtunhap}, function (response, status, request) {
               this; // dom element     
          });
          $("#w_update_cttn").show();
     });
     $("#w_close_btn_cttn").click(function(e){
          e.preventDefault();
          $("#w_update_cttn").hide();
     });


     $("#w_update_ctx").hide();//close
     $(".w_update_btn_open_ctx").click(function(e){
          e.preventDefault();
          $("#w_update_ctx").css("left",e.pageX +5);
          $("#w_update_ctx").css("top",e.pageY +5);
          var $idchungtuxuat = $(this).attr('value');

          $("#w_update_form_ctx").load("./element_T/mChungtuxuat/chungtuxuatUpdate.php", {idchungtuxuat:$idchungtuxuat}, function (response, status, request) {
               this; // dom element     
          });
          $("#w_update_ctx").show();
     }); 
     $("#w_close_btn_ctx").click(function(e){
          e.preventDefault();
          $("#w_update_ctx").hide();
     });



     $("#w_update_cttx").hide();//close
     $(".w_update_btn_open_cttx").click(function(e){
          e.preventDefault();
          $("#w_update_cttx").css("left",e.pageX +5);
          $("#w_update_cttx").css("top",e.pageY +5);
          var $idchitietchungtuxuat = $(this).attr('value');

          $("#w_update_form_cttx").load("./element_T/mChitietchungtuxuat/chitietchungtuxuatUpdate.php", {idchitietchungtuxuat:$idchitietchungtuxuat}, function (response, status, request) {
               this; // dom element     
          });
          $("#w_update_cttx").show();
     });
     
     
     $("#w_close_btn_cttx").click(function(e){
          e.preventDefault();
          $("#w_update_cttx").hide();
     });
});
