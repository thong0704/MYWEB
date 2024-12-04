<?php
$s = '../../element_T/mod/database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = 'administrator/element_T/mod/database.php';
}

require_once ($f);


    class hanghoa extends Database{
        public function hanghoaGetAll(){
            $getall = $this->connect->prepare("select * from hanghoa");
            $getall->setFetchMode(PDO::FETCH_OBJ);
            $getall->execute();

            return $getall->fetchAll();
        }

        public function hanghoaAdd($tenhanghoa, $mota, $giathamkhao, $hinhanh,$idloaihang,$idthuonghieu){
            $sql = "INSERT INTO hanghoa (tenhanghoa, mota, giathamkhao, hinhanh,idloaihang,idthuonghieu) VALUES (?,?,?,?,?,?)";
            $data = array($tenhanghoa, $mota, $giathamkhao, $hinhanh, $idloaihang, $idthuonghieu);

            $add = $this->connect->prepare($sql);
            $add->execute($data);
            return $add->rowCount();
        }

        public function hanghoaDelete($idhanghoa) {
            $sql = "DELETE from hanghoa where idhanghoa = ?";
            $data = array($idhanghoa);

            $del= $this->connect->prepare($sql);
            $del->execute($data);
            return $del->rowCount();
        }

        public function hanghoaUpdate($tenhanghoa, $hinhanh, $mota, $giathamkhao, $idloaihang, $idthuonghieu, $idhanghoa) {
            $update = $this->connect->prepare(
                "UPDATE hanghoa SET 
                    tenhanghoa = ?, 
                    hinhanh = ?, 
                    mota = ?, 
                    giathamkhao = ?, 
                    idloaihang = ?, 
                    idthuonghieu = ? 
                WHERE idhanghoa = ?"
            );
    
            $update->execute(array($tenhanghoa, $hinhanh, $mota, $giathamkhao, $idloaihang, $idthuonghieu, $idhanghoa));
            return $update->rowCount();
        }
    
       
        
        public function hanghoaGetbyId($idhanghoa) {
            $getTk = $this->connect->prepare("select * from hanghoa where idhanghoa=?");
            $getTk->setFetchMode(PDO::FETCH_OBJ);
            $getTk->execute(array($idhanghoa));

            return $getTk->fetch();
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
    

    

    

   