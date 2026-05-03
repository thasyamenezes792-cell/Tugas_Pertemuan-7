<?php
class Mahasiswa {
    private $conn;
    private $table_name = "mahasiswa";

    public $nim;
    public $nama;
    public $jurusan;
    public $alamat;
    public $email;
    public $no_hp;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                  SET nim=:nim, nama=:nama, jurusan=:jurusan,
                      alamat=:alamat, email=:email, no_hp=:no_hp";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nim", $this->nim);
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":jurusan", $this->jurusan);
        $stmt->bindParam(":alamat", $this->alamat);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":no_hp", $this->no_hp);

        return $stmt->execute();
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY nama ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . "
                  SET nama=:nama,
                      jurusan=:jurusan,
                      alamat=:alamat,
                      email=:email,
                      no_hp=:no_hp
                  WHERE nim=:nim";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nim", $this->nim);
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":jurusan", $this->jurusan);
        $stmt->bindParam(":alamat", $this->alamat);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":no_hp", $this->no_hp);

        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE nim=:nim";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nim", $this->nim);

        return $stmt->execute();
    }
}
?>