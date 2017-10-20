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

    //sigin
    public function signup($nis,$username,$password){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->table = "users";
        $value = "?,?,?,?,?";
        $data = ['',$nis,$username,$password,1];
        return $this->insert($value,$data);
    }

    public function gettoken(){
        $token = md5(uniqid(rand(), true));
        $_SESSION['token'] = $token;
        return $token;
    }

    //login

    public function signin($usernis,$password){
        $query = "SELECT * FROM users WHERE username = ? or nis_siswa = ?";
        $result = $this->connection->prepare($query);
        $result->execute([$usernis,$usernis]);
        $getdata = $result->fetchAll();
        if($result->rowCount() > 0){
            $verify = password_verify($password, $getdata[0]['password']);
            if($verify == true){
                return true;
            }
            else{
                $this->error = "Password yang anda masukan salah :)";
                return false;
            }
        }
        else{
            $this->error = "NIS / Username tidak terdaftar";
            return false;
        }
    }
}


$kpko = new kpko();
?>
