<?php
require_once "../core.php";


class admin extends core{

    // read

    public function getsiswa($search){
        $this->table = "siswa";
        $where = "WHERE nis LIKE ? OR name LIKE ? limit 10";
        $data = ['%'.$search.'%','%'.$search.'%'];
        return $this->read($where,$data);
    }
    
    public function getsiswaall(){
        $this->table = "siswa";
        $where = "WHERE 1";
        $data = null;
        return $this->read($where,$data);
    }

  

    public function getusers(){
        $query = "SELECT users.id,users.nis_siswa,siswa.name,siswa.kelas,users.username from users, siswa where users.nis_siswa = siswa.nis";
        $data = null;
        return $this->read_query($query,$data);
    }

    public function getcalon($calon){
        if ($calon == "ketua"){
            $query = "SELECT calon_ketua.id,calon_ketua.imgpath,calon_ketua.nis_siswa,siswa.name,siswa.kelas,calon_ketua.visi,calon_ketua.misi from calon_ketua, siswa where calon_ketua.nis_siswa = siswa.nis;";
        }
        else if ($calon == "wakilketua") {
            $query = "SELECT calon_wakilketua.id,calon_wakilketua.imgpath,calon_wakilketua.nis_siswa,siswa.name,siswa.kelas,calon_wakilketua.visi,calon_wakilketua.misi from calon_wakilketua, siswa where calon_wakilketua.nis_siswa = siswa.nis;";
        }
        $data = null;
        return $this->read_query($query,$data);
    }

    public function getresult(){
        $this->table = "result";
        $where = "WHERE 1";
        $data = null;
        return $this->read($where,$data);
    }

    public function getcount($table){
        $this->table = $table;
        $data = null;
        $where = "WHERE 1";
        return $this->read_count($where,$data);
    }

    // public function getcountcalon($table){
    //     $this->table = $table;
    //     $data = null;
    //     $where = "WHERE 1";
    //     return $this->read_count($where,$data);
    // }

    // public function getcalon($calon){
    //     $this->table = $calon;
    //     $where = "WHERE 1";
    //     $data = null;
    //     return $this->read($where,$data);
    // }

    public function getcountcalonresult($nis){
        $this->table = "result";
        $where = "WHERE nis_calon_ketua = ? or nis_calon_wakilketua = ?";
        $data = [$nis,$nis];
        return $this->read_count($where,$data);
    }

    // insert
    public function insertsiswa($nis,$name,$gender,$kelas){
        $this->table = "siswa";
        $value = "?,?,?,?,?";
        $data = ['',$nis,$name,$gender,$kelas];
        return $this->insert($value,$data);
    }

    public function insertusers($nis,$username,$password){
        $password = password_hash($password,PASSWORD_DEFAULT);
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $this->table = "users";
        $value = "?,?,?,?,?,?";
        $data = ["",$nis,$username,$password,1,$ip];
        return $this->insert($value,$data);
    }

    public function insertcalon($calon,$nis,$imgpath,$visi,$misi){
        if($calon == "ketua"){
            $this->table = "calon_ketua";
        }
        else if($calon == "wakilketua"){
            $this->table = "calon_wakilketua";            
        }

        $value = "?,?,?,?,?";
        $data = ["",$nis,$imgpath,$visi,$misi];
        return $this->insert($value,$data);
    }

    //update

    public function updatesiswa($name,$gender,$kelas,$nis){
        $this->table = "siswa";
        $set = "name = ?, gender = ?, kelas= ? where nis = ?";
        $data = [$name, $gender, $kelas, $nis];
        return $this->update($set,$data);
    }

    public function updateusers($password,$nis){
        $password = password_hash($password,PASSWORD_DEFAULT);
        $this->table = "users";
        $set = "password = ? where nis_siswa = ?";
        $data = [$password, $nis];
        return $this->update($set,$data);
    }

    public function updatecalon($calon,$imgpath,$visi,$misi,$nis){
        if($calon == "calon_ketua"){
            $this->table = "calon_ketua";
        }
        else if($calon == "calon_wakilketua"){
            $this->table = "calon_wakilketua";            
        }
        $set = "imgpath = ?, visi= ?,misi = ? where nis_siswa = ?";
        $data = [$imgpath,$visi, $misi, $nis];
        return $this->update($set,$data);
    }
    // delete

    public function deletesiswa($id){
        $this->table = "siswa";
        return $this->delete($id);
    }
    public function deleteusers($id){
        $this->table = "users";
        return $this->delete($id);
    }
    public function deletecalon($calon,$id){
        if($calon == "calon_ketua"){
            $this->table = "calon_ketua";
        }
        else if($calon == "calon_wakilketua"){
            $this->table = "calon_wakilketua";            
        }
        return $this->delete($id);
    }

    // pagging

    public $rows;

    public function getrows($table){
        $this->table = $table;
        $rows = $this->rows;
        $where = "WHERE 1";
        $data = null;
        return  ceil($this->read_count($where,$data)/$this->rows);
    }

    public function pagging($page,$table){
        $start = ($page-1)*$this->rows;
        if($page == 1){
            $start = 0;
        }
        $end = $this->rows;

        $this->table = $table;
        $where = "WHERE 1";
        return $this->read_limit($where,$start,$end);
    }
}

$admin = new admin();
?>