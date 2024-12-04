<?php
$s = '../../element_T/mod/database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = './element_T/mod/database.php';
}

require_once ($f);


    class thuonghieu extends Database{
        public function thuonghieuGetAll(){
            $getall = $this->connect->prepare("select * from thuonghieu");
            $getall->setFetchMode(PDO::FETCH_OBJ);
            $getall->execute();

            return $getall->fetchAll();
        }

        public function thuonghieuAdd($tenthuonghieu, $hinhanh, $xuatxu){
            $sql = "INSERT INTO thuonghieu (tenthuonghieu, hinhanh, xuatxu) VALUES (?,?,?)";
            $data = array($tenthuonghieu, $hinhanh, $xuatxu);

            $add = $this->connect->prepare($sql);
            $add->execute($data);
            return $add->rowCount();
        }

        public function thuonghieuDelete($idthuonghieu) {
            $sql = "DELETE from thuonghieu where idthuonghieu = ?";
            $data = array($idthuonghieu);

            $del= $this->connect->prepare($sql);
            $del->execute($data);
            return $del->rowCount();
        }

        public function thuonghieuUpdate($tenthuonghieu, $hinhanh, $xuatxu, $idthuonghieu) {
            // Chuẩn bị câu lệnh SQL
            $update = $this->connect->prepare(
                "UPDATE thuonghieu SET 
                    tenthuonghieu = ?, 
                    hinhanh = ?, 
                    xuatxu = ? 
                WHERE idthuonghieu = ?"
            );
        
            // Thực thi câu lệnh với các tham số
            $update->execute(array($tenthuonghieu, $hinhanh, $xuatxu, $idthuonghieu));
        
            // Trả về số dòng bị ảnh hưởng
            return $update->rowCount();
        }
        

        public function thuonghieuGetbyId($idthuonghieu) {
            $getTk = $this->connect->prepare("select * from thuonghieu where idthuonghieu=?");
            $getTk->setFetchMode(PDO::FETCH_OBJ);
            $getTk->execute(array($idthuonghieu));

            return $getTk->fetch();
        }
    }