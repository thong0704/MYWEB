<?php
$s = __DIR__ . '/database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = __DIR__ . '/../../element_T/mod/database.php';
}

require_once($f);

class chitietchungtuxuat extends Database {
    public function chitietchungtuxuatGetAll() {
        $getall = $this->connect->prepare("SELECT * FROM chitietchungtuxuat");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function chitietchungtuxuatAdd($soluong, $iddongia, $idchungtuxuat) {
        $sql = "INSERT INTO chitietchungtuxuat (soluong, iddongia, idchungtuxuat) VALUES (?, ?, ?)";
        $data = array($soluong, $iddongia, $idchungtuxuat);

        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }

    public function chitietchungtuxuatDelete($idchitietchungtuxuat) {
        $sql = "DELETE FROM chitietchungtuxuat WHERE idchitietchungtuxuat = ?";
        $data = array($idchitietchungtuxuat);

        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    }

    public function chitietchungtuxuatUpdate($soluong, $iddongia, $idchungtuxuat, $idchitietchungtuxuat) {
        $update = $this->connect->prepare(
            "UPDATE chitietchungtuxuat SET 
                soluong = ?, 
                iddongia = ?, 
                idchungtuxuat = ? 
            WHERE idchitietchungtuxuat = ?"
        );

        $update->execute(array($soluong, $iddongia, $idchungtuxuat, $idchitietchungtuxuat));
        return $update->rowCount();
    }

    public function chitietchungtuxuatGetbyId($idchitietchungtuxuat) {
        $getTk = $this->connect->prepare("SELECT * FROM chitietchungtuxuat WHERE idchitietchungtuxuat = ?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($idchitietchungtuxuat));
        return $getTk->fetch();
    }
}
?>
