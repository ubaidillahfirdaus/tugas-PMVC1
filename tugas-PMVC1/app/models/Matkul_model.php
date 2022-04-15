<?php

class Matkul_model
{
    private $table = 'matakuliah';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMatkul()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function cariDataMatkul()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM matakuliah WHERE namaMatkul LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

    public function tambahDataMatkul($data)
    {
        $query = "INSERT INTO matakuliah
                    VALUES
                  (:idMatkul, :namaMatkul, :sks)";

        $this->db->query($query);
        $this->db->bind('idMatkul', $data['id']);
        $this->db->bind('namaMatkul', $data['nama']);
        $this->db->bind('sks', $data['sks']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getMatkulById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE idMatkul=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ubahMatkulById($data)
    {
        $query = "UPDATE matakuliah SET
                    idMatkul = :id,
                    namaMatkul = :nama,
                    sks = :sks
                  WHERE idMatkul = :id";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('sks', $data['sks']);


        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMatkul($id)
    {
        $query = "DELETE FROM matakuliah WHERE idMatkul = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataChildMatkul($id)
    {
        $query = "DELETE FROM studi WHERE idMatkul = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAll()
    {
        $query = "SELECT * FROM studi AS a JOIN mahasiswa AS b ON a.id = b.id JOIN matakuliah AS c ON a.idMatkul = c.idMatkul";
        $this->db->query($query);
        return $this->db->resultSet();
    }
}
