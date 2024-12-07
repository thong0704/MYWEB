<?php
$s='../../element_T/mod/database.php';
if(file_exists($s)){
    $f=$s;
}else{
    $f='./element_T/mod/database.php';
}
require_once $f;
class khachhang extends Database{
    public function khachhangGetAll(){
        $sql ='select * from khachhang';

        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }
    public function khachhangCheckLogin($username, $password){
        $sql ='select * from khachhang where username = ? and password = ? and setlock = 0';
        $data = array($username, $password);

        $select = $this->connect->prepare($sql);
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute($data);

        $get_obj = count($select->fetchAll());

        if($get_obj === 1){
            return true;
        }else{
            return false;
        }
        
    }
    public function khachhangCheckUsername($username){
        $sql ='select * from khachhang where username = ?';
        $data = array($username);

        $select = $this->connect->prepare($sql);
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute($data);

        $get_obj = count($select->fetchAll());

        if($get_obj === 1){
            return true;
        }else{
            return false;
        }
    }
    public function khachhangAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai) {
        $sql = "INSERT INTO khachhang (username, password, hoten, gioitinh, ngaysinh, diachi, dienthoai) VALUES (?,?,?,?,?,?,?)";
        $data = array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai);
        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }
    public function khachhangDelete($idkhachhang){
        $sql ='DELETE from khachhang where idkhachhang = ?';
        $data = array($idkhachhang);

        $del = $this->connect->prepare($sql);
        $del->execute($data);

        return $del->rowCount();
    }
    public function khachhangUpdate($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $idkhachhang){
        $sql = "UPDATE khachhang set username = ?, password = ?, hoten = ?, gioitinh = ?, ngaysinh = ?, diachi = ?, dienthoai = ? WHERE idkhachhang = ? ";
        $data = array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $idkhachhang);
        $update = $this->connect->prepare($sql);
        $update->execute($data);
        return $update->rowCount();

    }


    public function KhachhangGetbyId($idkhachhang) {
        $getTk = $this->connect->prepare("SELECT * FROM khachhang WHERE idkhachhang = ?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($idkhachhang));
        return $getTk->fetch();
    }

    


    public function khachhangSetPassword($idkhachhang, $password){
        $sql = "UPDATE khachhang set password = ? WHERE iduser = ? ";
        $data = array($password, $idkhachhang);
        $update_pass = $this->connect->prepare($sql);
        $update_pass->execute($data);
        return $update_pass->rowCount();
    }
    public function khachhangSetActive($idkhachhang, $setlock){
        $sql = "UPDATE khachhang set setlock = ? WHERE idkhachhang = ? ";
        $data = array($setlock, $idkhachhang);
        $update_lock = $this->connect->prepare($sql);
        $update_lock->execute($data);
        return $update_lock->rowCount();
    }
    public function khachhangChangePassword($idkhachhang, $passwordold, $passwordnew){
        $sql ='select * from khachhang where idkhachhang = ? and password = ?';
        $data = array($idkhachhang, $passwordold);

        $select = $this->connect->prepare($sql);
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute($data);

        $get_obj = count($select->fetchAll());

        if ($get_obj === 1){
            $sql = "UPDATE khachhang set password = ? WHERE idkhachhang = ? ";
        $data = array($passwordnew, $idkhachhang);
        $update_pass = $this->connect->prepare($sql);
        $update_pass->execute($data);
        return $update_pass->rowCount();
        }else{
            return false;
        }
        
        
    }
}

