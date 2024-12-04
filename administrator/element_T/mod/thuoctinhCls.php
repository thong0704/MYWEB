<?php
$s= '../../element_T/mod/database.php';
if(file_exists($s)){
    $f=$s;
}else{
    $f='./element_T/mod/database.php';
    if(!file_exists($f)){
        $f = './administrator/element_T/mod/database.php';
    }
}
require_once $f;

class thuoctinh extends Database{
    public function thuoctinhGetAll(){
        $sql = 'select * from thuoctinh';
        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
    
    public function thuoctinhAdd($tenthuoctinh,$hinhanh,$mota){
        $sql = "INSERT INTO thuoctinh (tenthuoctinh,hinhanh,mota) VALUES (?,?,?)";
        $data = array($tenthuoctinh,$hinhanh,$mota);
        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }
    public function thuoctinhDelete($idthuoctinh){
        $sql ='DELETE from thuoctinh where idthuoctinh = ?';
        $data = array($idthuoctinh);

        $del = $this->connect->prepare($sql);
        $del->execute($data);

        return $del->rowCount();
    }
    public function thuoctinhUpdate($tenthuoctinh,$hinhanh,$mota,$idthuoctinh){
        $sql = "UPDATE thuoctinh set tenthuoctinh = ?, hinhanh= ?, mota= ? WHERE idthuoctinh = ? ";
        $data = array($tenthuoctinh,$hinhanh,$mota,$idthuoctinh);
        $update = $this->connect->prepare($sql);
        $update->execute($data);
        return $update->rowCount();
    }
    public function thuoctinhGetbyId($idthuoctinh){
        $sql ='select * from thuoctinh where idthuoctinh = ?';
        $data = array($idthuoctinh);
        $getOne = $this->connect->prepare($sql);
        $getOne->execute($data);
        return $getOne->fetch();
    }
   
   

}