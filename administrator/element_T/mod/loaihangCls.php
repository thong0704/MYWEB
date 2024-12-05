<?php
$s = dirname(__FILE__) . '/database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = dirname(__FILE__) . '/../../element_T/mod/database.php';
}

require_once($f);

class loaihang extends Database {
    public function loaihangGetAll() {
        $getall = $this->connect->prepare("SELECT * FROM loaihang");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function loaihangAdd($tenloaihang, $hinhanh, $mota) {
        $sql = "INSERT INTO loaihang (tenloaihang, hinhanh, mota) VALUES (?,?,?)";
        $data = array($tenloaihang, $hinhanh, $mota);

        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }

    public function loaihangDelete($idloaihang) {
        $sql = "DELETE FROM loaihang WHERE idloaihang = ?";
        $data = array($idloaihang);

        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    }

    public function loaihangUpdate($tenloaihang, $hinhanh, $mota, $idloaihang) {
        $update = $this->connect->prepare(
            "UPDATE loaihang SET 
                tenloaihang = ?, 
                hinhanh = ?, 
                mota = ? 
            WHERE idloaihang = ?"
        );

        $update->execute(array($tenloaihang, $hinhanh, $mota, $idloaihang));
        return $update->rowCount();
    }

    public function loaihangGetbyId($idloaihang) {
        $getTk = $this->connect->prepare("SELECT * FROM loaihang WHERE idloaihang = ?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($idloaihang));
        return $getTk->fetch();
    }
}
?>
