<?php 
require_once __DIR__ ."/admin.php";
if($admin->ceklogin_admin() == true){
if(isset($_POST['nis'])){
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["imgpath"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imgpath"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["imgpath"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } 
    else {
        if (move_uploaded_file($_FILES["imgpath"]["tmp_name"], $target_file)) {
            // echo "The file ". basename( $_FILES["imgpath"]["name"]). " has been uploaded.";
            
            $nis = $_POST['nis'];
            $calon = $_POST['calon'];
            $imgpath = $_FILES["imgpath"]["name"];
            $visi = $_POST['visi'];
            $misi = $_POST['misi'];
            $calon = $admin->insertcalon($calon,$nis,$imgpath,$visi,$misi);
            if($calon == true)
            {
                header('Location:http://localhost/epko/admin/calon.php');                
            }
            else{
                echo $admin->error;
            }
            // if($admin->insertcalon($calon,$nis,$imgpath,$visi,$misi) == true){
            //     echo "sukses";
            // }
            // else{
            //     echo $admin->eror;
            // }
                
            // {
            //     $status = ["status"=>true,"message"=>"Data berhasil di tambahkan"];
            //     echo json_encode($status,true);
            // }
            // else{
            //     $status = ["status"=>true,"message"=> $admin->error];
            //     echo json_encode($status,true);

        }
        else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

}
}
?>