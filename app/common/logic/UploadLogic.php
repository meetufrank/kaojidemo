<?php
namespace app\common\logic;

class UploadLogic extends Logic {
  

   
     public function uploadphoto(){
        // print_r($_POST['data']);exit;
        $path='uploads/photo/';
        $output_file = time().'.jpeg';
        $path = $path.$output_file;
        $base_img = str_replace('data:image/jpeg;base64,', '', $_POST['data']);
        $data=base64_decode($base_img);
        $file=file_put_contents($path, base64_decode($base_img));
         
        $msg['msg']=1;
        session('imgurl','/'.$path);
        echo json_encode($msg);
        exit;
    }
    
  
}
