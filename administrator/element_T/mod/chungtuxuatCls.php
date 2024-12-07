<?php
$s = __DIR__ . '/database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = __DIR__ . '/../../element_T/mod/database.php';
}

require_once($f);

class chungtuxuat extends Database {
    public function chungtuxuatGetAll() {
        $getall = $this->connect->prepare("SELECT * FROM chungtuxuat");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function chungtuxuatAdd($tenchungtuxuat, $ngaylap, $tongtien, $idhanghoa, $idkhachhang) {
        $sql = "INSERT INTO chungtuxuat (tenchungtuxuat, ngaylap, tongtien, idhanghoa, idkhachhang) VALUES (?, ?, ?, ?, ?)";
        $data = array($tenchungtuxuat, $ngaylap, $tongtien, $idhanghoa, $idkhachhang);

        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }

    public function chungtuxuatDelete($idchungtuxuat) {
        $sql = "DELETE FROM chungtuxuat WHERE idchungtuxuat = ?";
        $data = array($idchungtuxuat);

        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    }

    public function chungtuxuatUpdate($tenchungtuxuat, $ngaylap, $tongtien, $idhanghoa, $idkhachhang, $idchungtuxuat) {
        $update = $this->connect->prepare(
            "UPDATE chungtuxuat SET 
                tenchungtuxuat = ?, 
                ngaylap = ?, 
                tongtien = ?, 
                idhanghoa = ?, 
                idkhachhang = ? 
            WHERE idchungtuxuat = ?"
        );

        $update->execute(array($tenchungtuxuat, $ngaylap, $tongtien, $idhanghoa, $idkhachhang, $idchungtuxuat));
        return $update->rowCount();
    }

    public function chungtuxuatGetbyId($idchungtuxuat) {
        $getTk = $this->connect->prepare("SELECT * FROM chungtuxuat WHERE idchungtuxuat = ?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($idchungtuxuat));
        return $getTk->fetch();
    }
}
?>
