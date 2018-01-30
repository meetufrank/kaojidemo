<?php
namespace app\common\logic;

class UploadLogic extends Logic {
  

   
       /*
     * base64链接生成图片
     */
      public function uploadphoto($data){
        // print_r($_POST['data']);exit;
         
         
          
           $path='uploads/photo/';
        $output_file = time().'.jpeg';
        $path = $path.$output_file;
        $base_img = str_replace('data:image/jpeg;base64,', '', $data);
        $data=base64_decode($base_img);
        $file=file_put_contents($path, base64_decode($base_img));
       
         
        return '/public/'.$path;
    }
  
}
