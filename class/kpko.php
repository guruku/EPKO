<?php
require_once "core.php";

class kpko extends core{


    // get
    public function getcalon($calon){
        if ($calon == "ketua"){
            $calon = "calon_ketua";
        }
        else if($calon == "wakilketua"){
            $calon = "calon_wakilketua";
        }
        $query = "SELECT $calon.nis_siswa, $calon.imgpath, siswa.name from $calon,siswa where siswa.nis = $calon.nis_siswa;";
        return $this->read_query($query);
    }

    public function getprofile($calon,$nis){
        if ($calon == "ketua"){
            $calon = "calon_ketua";
        }
        else if($calon == "wakilketua"){
            $calon = "calon_wakilketua";
        }
        $query = "SELECT $calon.nis_siswa, $calon.imgpath, siswa.name, siswa.kelas, $calon.visi, $calon.misi from $calon,siswa where siswa.nis = ? and $calon.nis_siswa = ?";
        $data = [$nis,$nis];
        return $this->read_query_escape($query,$data);
    }



    // public function getprofile($id){
    //     try{
    //         $query = "SELECT siswa.name,siswa.kelas,calons.nis_siswa,calons.visi,calons.misi FROM siswa,calons WHERE (siswa.nis = calons.nis_siswa) AND calons.id = ?";
    //         $result = $this->connection->prepare($query);
    //         $result->execute([$id]);
    //         $result = $result->fetchAll();
    //         return $result;
    //     }
    //     catch (PDOException $e){
    //         echo "Koneksi Error :".$e->getMessage();
    //         $this->error = "Gagal untuk mendapatkan data calons";
    //     }
    // }

    // public function getconfirm($ketua,$wakilketua){
    //     try{
    //         $query = "SELECT siswa.name,siswa.kelas,calons.nis_siswa FROM siswa,calons WHERE (siswa.nis = calons.nis_siswa) AND calons.id IN(?,?) ORDER BY jabatan ASC";
    //         $result = $this->connection->prepare($query);
    //         $result->execute([$ketua,$wakilketua]);
    //         $result = $result->fetchAll();
    //         return $result;
    //     }
    //     catch (PDOException $e){
    //         echo "Koneksi Error :".$e->getMessage();
    //         $this->error = "Gagal untuk mendapatkan data calons";
    //     }
    // }

}


$kpko = new kpko();
?>
