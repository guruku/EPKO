<?php

require_once ("config.php");

class core extends dbconfig{

    public $table;

    // core method
    public function insert($value,$data){

        try{
            $query = "INSERT INTO $this->table VALUES(".$value.")";
            $result = $this->connection->prepare($query);
            $result->execute($data);
            return true;
        }
        catch (PDOException $e){
            // echo "Koneksi Error :".$e->getMessage();
            $this->error = $e->getMessage();
            return false;
        }

    }

    public function delete($id){

        try{
            $query = "DELETE FROM $this->table WHERE id = ?";
            $result = $this->connection->prepare($query);
            $result->execute([$id]);
            return true;
        }

        catch (PDOException $e){
            // echo "Koneksi Error :".$e->getMessage();
            $this->error = "Gagal untuk menghapus data, data masih terkait";
            return false;
        }
    }

    public function update($set,$data){
        try{
            $query = "UPDATE $this->table set $set";
            $result = $this->connection->prepare($query);
            $result->execute($data);
            return $query;
        }
        catch (PDOException $e){
            // echo "Koneksi Error :".$e->getMessage();
            $this->error = "Gagal untuk mengupdate data";
            return false;
        }
    }
    
    public function readCore($query,$data){
        try{
            $result = $this->connection->prepare($query);
            $result->execute($data);
            $rows = [];
            while($row = $result->fetchAll()){
                $rows = $row;
            }
            return $rows;
        }
        catch (PDOException $e){
            // echo "Koneksi Error :".$e->getMessage();
            $this->error = "Gagal untuk mendapatkan data";
            return false;
        }
    }

    // child core method
    public function read($where,$data){
        $query = "SELECT * FROM $this->table $where";
        return $this->readCore($query,$data);
    }

    public function read_query($query){
        $data = null;
        return $this->readCore($query,$data);
    }

    public function read_query_escape($query,$data){
        return $this->readCore($query,$data);
    }
}
?>
