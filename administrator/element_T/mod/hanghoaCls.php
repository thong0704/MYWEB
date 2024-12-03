<?php
$s='../../element_T/mod/database.php';
if(file_exists($s)){
    $f=$s;
}else{
    $f='./element_T/mod/database.php';
    if(!file_exists($f)){
        $f = './administrator/element_T/mod/database.php';
    }
}
require_once $f;

class hanghoa extends Database{
    public function hanghoaGetAll(){
        $sql = 'select * from hanghoa';
        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
    
    public function hanghoaAdd($tenhanghoa,$hinhanh,$mota,$giathamkhao,$idloaihang){
        $sql = "INSERT INTO hanghoa (tenhanghoa,hinhanh,mota,giathamkhao,idloaihang) VALUES (?,?,?,?,?)";
        $data = array($tenhanghoa,$hinhanh,$mota,$giathamkhao,$idloaihang);
        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }
    public function hanghoaDelete($idhanghoa){
        $sql ='DELETE from hanghoa where idhanghoa = ?';
        $data = array($idhanghoa);

        $del = $this->connect->prepare($sql);
        $del->execute($data);

        return $del->rowCount();
    }
    public function hanghoaUpdate($tenhanghoa,$hinhanh,$mota,$giathamkhao,$idhanghoa){
        $sql = "UPDATE hanghoa set tenhanghoa=?,hinhanh=?,mota=?,giathamkhao=? where idhanghoa =?";
        $data = array($tenhanghoa,$hinhanh,$mota,$giathamkhao,$idhanghoa);
        $update = $this->connect->prepare($sql);
        $update->execute($data);
        return $update->rowCount();
    }
    public function hanghoaGetbyId($idhanghoa){
        $sql ='select * from hanghoa where idhanghoa = ?';
        $data = array($idhanghoa);
        $getOne = $this->connect->prepare($sql);
        $getOne->execute($data);
        return $getOne->fetch();

        }
        public function HanghoaGetbyIdloaihang($idloaihang){
           $sql = 'select * from hanghoa where idloaihang = ?';
           $data = array($idloaihang);
           $getOne = $this->connect->prepare($sql);
           $getOne ->setFetchMode(PDO::FETCH_OBJ);
           $getOne->execute($data);
           return $getOne->fetchAll();
        }
    
    
   
   

}