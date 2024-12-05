<?php
$s = dirname(__FILE__) . '/database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = dirname(__FILE__) . '/../../element_T/mod/database.php';
}

require_once($f);

class thuonghieu extends Database {
    public function thuonghieuGetAll() {
        $getall = $this->connect->prepare("SELECT * FROM thuonghieu");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function thuonghieuAdd($tenthuonghieu, $hinhanh, $xuatxu) {
        $sql = "INSERT INTO thuonghieu (tenthuonghieu, hinhanh, xuatxu) VALUES (?,?,?)";
        $data = array($tenthuonghieu, $hinhanh, $xuatxu);

        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }

    public function thuonghieuDelete($idthuonghieu) {
        $sql = "DELETE FROM thuonghieu WHERE idthuonghieu = ?";
        $data = array($idthuonghieu);

        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    }

    public function thuonghieuUpdate($tenthuonghieu, $hinhanh, $xuatxu, $idthuonghieu) {
        $update = $this->connect->prepare(
            "UPDATE thuonghieu SET 
                tenthuonghieu = ?, 
                hinhanh = ?, 
                xuatxu = ? 
            WHERE idthuonghieu = ?"
        );

        $update->execute(array($tenthuonghieu, $hinhanh, $xuatxu, $idthuonghieu));
        return $update->rowCount();
    }

    public function thuonghieuGetbyId($idthuonghieu) {
        $getTk = $this->connect->prepare("SELECT * FROM thuonghieu WHERE idthuonghieu = ?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($idthuonghieu));
        return $getTk->fetch();
    }
}
?>
