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

    if($token == $_SESSION['token']){
        if(post_captcha($recaptcha)['success'] == true){
            if($kpko->signup($nis,$username,$password) == true){
                $status = ['status'=>'true','message'=>'signup berhasil, klik ok untuk lanjut login'];
            }
            else{
                $status = ['status'=>'false','message'=>'gagal, nis tidak terdaftar / nis yang dimasukan sudah pernah mendaftar'];
            }
        }
        else{
            $status = ['status'=>'false','message'=>'signup gagal, Catptcha tidak valid'];
        }
    }
    else{
        $status = ['status'=>'false','message'=>'signup gagal, token tidak valid'];
    }
    echo json_encode($status,true);
}
?>