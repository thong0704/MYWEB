<?php
$s = __DIR__ . '/database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = __DIR__ . '/../../element_T/mod/database.php';
}

require_once($f);

class thuoctinhhanghoa extends Database {
    public function thuoctinhhanghoaGetAll() {
        $getall = $this->connect->prepare("SELECT * FROM thuoctinhhanghoa");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function thuoctinhhanghoaAdd($giatri, $ghichu, $idthuoctinh, $idhanghoa) {
        $sql = "INSERT INTO thuoctinhhanghoa (giatri, ghichu, idthuoctinh, idhanghoa) VALUES (?,?,?,?)";
        $data = array($giatri, $ghichu, $idthuoctinh, $idhanghoa);

        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }

    public function thuoctinhhanghoaDelete($idthuoctinhhanghoa){
        $sql ='DELETE from thuoctinhhanghoa where idthuoctinhhanghoa = ?';
        $data = array($idthuoctinhhanghoa);

        $del = $this->connect->prepare($sql);
        $del->execute($data);

        return $del->rowCount();
    }

    public function thuoctinhhanghoaUpdate($giatri, $ghichu, $idthuoctinh, $idhanghoa, $idthuoctinhhanghoa) {
        $update = $this->connect->prepare(
            "UPDATE thuoctinhhanghoa SET 
                giatri = ?, 
                ghichu = ?, 
                idthuoctinh = ?, 
                idhanghoa = ?
            WHERE idthuoctinhhanghoa = ?"
        );

        $update->execute(array($giatri, $ghichu, $idthuoctinh, $idhanghoa, $idthuoctinhhanghoa));
        return $update->rowCount();
    }

    public function thuoctinhhanghoaGetbyId($idthuoctinhhanghoa) {
        $getTk = $this->connect->prepare("SELECT * FROM thuoctinhhanghoa WHERE idthuoctinhhanghoa = ?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($idthuoctinhhanghoa));
        return $getTk->fetch();
    }
}
?>
