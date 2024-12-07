<?php
$s = __DIR__ . '/database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = __DIR__ . '/../../element_T/mod/database.php';
}

require_once($f);

class chitietchungtunhap extends Database {
    public function chitietchungtunhapGetAll() {
        $getall = $this->connect->prepare("SELECT * FROM chitietchungtunhap");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function chitietchungtunhapAdd($soluong, $iddongia, $idchungtunhap) {
        $sql = "INSERT INTO chitietchungtunhap (soluong, iddongia, idchungtunhap) VALUES (?, ?, ?)";
        $data = array($soluong, $iddongia, $idchungtunhap);

        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }

    public function chitietchungtunhapDelete($idchitietchungtunhap) {
        $sql = "DELETE FROM chitietchungtunhap WHERE idchitietchungtunhap = ?";
        $data = array($idchitietchungtunhap);

        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    }

    public function chitietchungtunhapUpdate($soluong, $iddongia, $idchungtunhap, $idchitietchungtunhap) {
        $update = $this->connect->prepare(
            "UPDATE chitietchungtunhap SET 
                soluong = ?, 
                iddongia = ?, 
                idchungtunhap = ? 
            WHERE idchitietchungtunhap = ?"
        );

        $update->execute(array($soluong, $iddongia, $idchungtunhap, $idchitietchungtunhap));
        return $update->rowCount();
    }

    public function chitietchungtunhapGetbyId($idchitietchungtunhap) {
        $getTk = $this->connect->prepare("SELECT * FROM chitietchungtunhap WHERE idchitietchungtunhap = ?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($idchitietchungtunhap));
        return $getTk->fetch();
    }
}
?>
