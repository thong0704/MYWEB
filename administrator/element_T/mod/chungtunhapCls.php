<?php
$s = __DIR__ . '/database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = __DIR__ . '/../../element_T/mod/database.php';
}

require_once($f);

class chungtunhap extends Database {
    public function chungtunhapGetAll() {
        $getall = $this->connect->prepare("SELECT * FROM chungtunhap");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function chungtunhapAdd($tenchungtu, $ngaylap, $tongtien, $idhanghoa, $iduser) {
        $sql = "INSERT INTO chungtunhap (tenchungtu, ngaylap, tongtien, idhanghoa, iduser) VALUES (?,?,?,?,?)";
        $data = array($tenchungtu, $ngaylap, $tongtien, $idhanghoa, $iduser);

        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }

    public function chungtunhapDelete($idchungtunhap) {
        $sql = "DELETE FROM chungtunhap WHERE idchungtunhap = ?";
        $data = array($idchungtunhap);

        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    }

    public function chungtunhapUpdate($tenchungtu, $ngaylap, $tongtien, $idhanghoa, $iduser, $idchungtunhap) {
        $update = $this->connect->prepare(
            "UPDATE chungtunhap SET 
                tenchungtu = ?, 
                ngaylap = ?, 
                tongtien = ?, 
                idhanghoa = ?, 
                iduser = ? 
            WHERE idchungtunhap = ?"
        );

        $update->execute(array($tenchungtu, $ngaylap, $tongtien, $idhanghoa, $iduser, $idchungtunhap));
        return $update->rowCount();
    }

    public function chungtunhapGetbyId($idchungtunhap) {
        $getTk = $this->connect->prepare("SELECT * FROM chungtunhap WHERE idchungtunhap = ?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($idchungtunhap));
        return $getTk->fetch();
    }
}
?>
