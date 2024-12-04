<?php
$s = '../../element_T/mod/database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = './element_T/mod/database.php';
}

require_once ($f);


    class loaihang extends Database{
        public function LoaihangGetAll(){
            $getall = $this->connect->prepare("select * from loaihang");
            $getall->setFetchMode(PDO::FETCH_OBJ);
            $getall->execute();

            return $getall->fetchAll();
        }

        public function LoaihangAdd($tenloaihang, $hinhanh, $mota){
            $sql = "INSERT INTO loaihang (tenloaihang, hinhanh, mota) VALUES (?,?,?)";
            $data = array($tenloaihang, $hinhanh, $mota);

            $add = $this->connect->prepare($sql);
            $add->execute($data);
            return $add->rowCount();
        }

        public function LoaihangDelete($idloaihang) {
            $sql = "DELETE from loaihang where idloaihang = ?";
            $data = array($idloaihang);

            $del= $this->connect->prepare($sql);
            $del->execute($data);
            return $del->rowCount();
        }

        public function LoaihangUpdate($tenloaihang, $hinhanh, $mota, $idloaihang) {
            // Chuẩn bị câu lệnh SQL
            $update = $this->connect->prepare(
                "UPDATE loaihang SET 
                    tenloaihang = ?, 
                    hinhanh = ?, 
                    mota = ? 
                WHERE idloaihang = ?"
            );
        
            // Thực thi câu lệnh với các tham số
            $update->execute(array($tenloaihang, $hinhanh, $mota, $idloaihang));
        
            // Trả về số dòng bị ảnh hưởng
            return $update->rowCount();
        }
        

        public function LoaihangGetbyId($idloaihang) {
            $getTk = $this->connect->prepare("select * from loaihang where idloaihang=?");
            $getTk->setFetchMode(PDO::FETCH_OBJ);
            $getTk->execute(array($idloaihang));

            return $getTk->fetch();
        }
    }