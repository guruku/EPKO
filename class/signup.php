<?php
require_once ("kpko.php");

function post_captcha($user_response) {
    $fields_string = '';
    $fields = array(
        'secret' => '6LceQzUUAAAAAATy5rii8Y6xBAXlDSrs_Q21Ps5H',
        'response' => $user_response
    );
    foreach($fields as $key=>$value)
    $fields_string .= $key . '=' . $value . '&';
    $fields_string = rtrim($fields_string, '&');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

    $result = curl_exec($ch);
    curl_close($ch);

    return json_decode($result, true);
}

if(isset($_POST['token'])){
    $token = $_POST['token'];
    $nis = $_POST['nis'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $recaptcha = $_POST['recaptcha'];

    $ceknisusers = $kpko->ceknisusers($nis);
    $cekusernameusers = $kpko->cekusernameusers($username);

    // cek nis
    if($ceknisusers == 0){
    if($cekusernameusers == 0){
        // token
        if($token == $_SESSION['token']){
            //captcha
            if(post_captcha($recaptcha)['success'] == true){

                if($kpko->signup($nis,$username,$password) == true){
                    $status = ['status'=>'true','message'=>'signup berhasil, Loading...'];
                }
                else{
                    $status = ['status'=>'false','message'=>'Pendaftaran Gagal,'];
                }

            }

            else{
                $status = ['status'=>'false','message'=>'Signup gagal, Catptcha tidak valid'];
            }
            // end captcha
        }
        else{
            $status = ['status'=>'false','message'=>'Signup gagal, token tidak valid'];
        }
        // end token
    }
    else{
        $status = ['status'=>'false','message'=>'Signup gagal, Username tidak tersedia'];
    }
    }
    else{
        $status = ['status'=>'false','message'=>'Signup gagal, NIS sudah didaftarkan'];
    }
    // end username


    // end nis
    echo json_encode($status,true);
}
?>

