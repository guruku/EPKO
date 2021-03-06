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
        $data = null;
        return $this->read_query($query,$data);
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
        // $data = null;        
        return $this->read_query_escape($query,$data);
    }

    public function getsiswa($nis){
        $this->table = "siswa";
        $where = "WHERE nis = ?";
        $data = [$nis];
        return $this->read($where,$data);
    }

    //SigUp
    public function signup($nis,$username,$password){
        $password = password_hash($password, PASSWORD_DEFAULT);
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $this->table = "users";
        $value = "?,?,?,?,?,?";
        $data = ['',$nis,$username,$password,1,$ip];
        return $this->insert($value,$data);
    }

    public function ceknisusers($nis){
        $this->table = "users";
        $where = "WHERE nis_siswa = ?";
        $data = [$nis];
        return $this->read_count($where,$data);
    }

    public function cekusernameusers($username){
        $this->table = "users";
        $where = "WHERE username = ?";
        $data = [$username];
        return $this->read_count($where,$data);
    }

    //token
    public function gettoken(){
        $token = md5(uniqid(rand(), true));
        $_SESSION['token'] = $token;
        return $token;
    }

    //SignIn

    public function signin($usernis,$password){
        $query = "SELECT * FROM users WHERE username = ? or nis_siswa = ?";
        $result = $this->connection->prepare($query);
        $result->execute([$usernis,$usernis]);
        $getdata = $result->fetchAll();
        if($result->rowCount() > 0){
            $verify = password_verify($password, $getdata[0]['password']);
            if($verify == true){
                $_SESSION['users_nis'] = $getdata[0]['nis_siswa'];
                $_SESSION['users_username'] = $getdata[0]['username'];
                $_SESSION['users_level'] = $getdata[0]['level'];
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

    public function ceklogin_users(){
        if((isset($_SESSION['users_nis'])) && (isset($_SESSION['users_username'])) && (isset($_SESSION['users_level']))){
            if($_SESSION['users_level'] == 1){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }


    //send suara

    public function insertsuara($nis_ketua,$nis_wakilketua){
        $this->table = "result";
        $value = "?,?,?,?";
        $data = ['',$_SESSION['users_nis'],$nis_ketua,$nis_wakilketua];
        return $this->insert($value,$data);
    }

    public function insertsuara_check(){
        $nis =  $_SESSION['users_nis'];
        $query = "SELECT * FROM result WHERE nis_users = ".$nis;
        $result = $this->connection->query($query);
        $result->execute();
        if ($result->rowCount() > 0) {
             return true;
        }
        else{
            return false;
        }
    }

    //logout

    public function logout(){
        session_unset();
        session_destroy();
    }
    
}


$kpko = new kpko();
?>
