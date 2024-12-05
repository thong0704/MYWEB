<?php
$s = __DIR__ . '/database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = __DIR__ . '/../../element_T/mod/database.php';
}

require_once($f);

class dongia extends Database {
    public function dongiaGetAll() {
        $getall = $this->connect->prepare("SELECT * FROM dongia");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    

    public function dongiaAdd($giatridongia, $apdung, $ngaybatdau, $ngayketthuc, $idhanghoa) {
        $sql = "INSERT INTO dongia (giatridongia, apdung, ngaybatdau, ngayketthuc, idhanghoa) VALUES (?,?,?,?,?)";
        $data = array($giatridongia, $apdung, $ngaybatdau, $ngayketthuc, $idhanghoa);

        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }

    public function dongiaDelete($iddongia) {
        $sql = "DELETE FROM dongia WHERE iddongia = ?";
        $data = array($iddongia);

        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    }

    public function dongiaUpdate($giatridongia, $apdung, $ngaybatdau, $ngayketthuc, $idhanghoa) {
        $update = $this->connect->prepare(
            "UPDATE dongia SET 
                giatridongia = ?, 
                apdung = ?, 
                ngaybatdau = ?, 
                ngayketthuc = ?, 
                idhanghoa = ?
            WHERE iddongia = ?"
        );

        $update->execute(array($giatridongia, $apdung, $ngaybatdau, $ngayketthuc, $idhanghoa));
        return $update->rowCount();
    }

    public function dongiaGetbyId($iddongia) {
        $getTk = $this->connect->prepare("SELECT * FROM dongia WHERE iddongia = ?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($iddongia));
        return $getTk->fetch();
    }

    
}
?>
