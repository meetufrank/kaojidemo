<?php
namespace app\mobile\controller;

use app\common\logic\KjLogic;

class Kjbm extends Common{
    public function _initialize(){
        parent::_initialize();
    }
     
    public function index(){
        $this->site_title='首页';
        $this->form_title='首页';
   
        
       
         return $this->assignfetch();
    }
    public function candidates(){
        $this->site_title='古筝考级信息';
        $this->form_title='古筝考级信息';
        return $this->assignfetch();
    }
    public function information(){
        $this->site_title='考生信息';
        $this->form_title='考生信息';
        //存储id
        $id= input("id");
       
        $data=[
           'id'=>$id 
         ];
        $this->getkjdata($data);
         
        
       
        
       
        return $this->assignfetch();
    }
    public function address(){
        $this->site_title='邮寄地址';
        $this->form_title='邮寄地址';
        
       
      
        $province = db('Region')->where ( array('pid'=>1) )->select ();
        
        $this->assign('province',$province);
        return $this->assignfetch();
    }
    public function cropper(){
        $this->site_title='上传头像';
        $this->form_title='上传头像';
      
        
        
       return  $this->assignfetch();
    }
     public function gradOrder(){
        $this->site_title='确认订单';
        $this->form_title='确认订单';
       return  $this->assignfetch();
    }
    
     public function pianoInformation(){
        $this->site_title='钢琴考级信息';
        $this->form_title='钢琴考级信息';
        return $this->assignfetch();
    }
     public function zitherInfrmation(){
        $this->site_title='古筝考级信息';
        $this->form_title='古筝考级信息';
        return $this->assignfetch();
    }
    /*
     * 获取联动地址
     */
    
    public function getRegion(){
        $Region=db("region");
        $pid = input("pid");
        $map['pid']=$pid;
        $list=$Region->where($map)->select();
        
        return json($list);
    }

    public function savedata() {
        $input=input('post.data');
        
         parse_str($input,$arr);
         
        $this->getkjdata($arr);
        
        $msg=[
            'code'=>1,
            'msg'=>'成功'
        ];
        return json($msg);
    }
    /*
     * 存储报名数据
     */
    public function getkjdata(array $arr) {
        if(session('kjdata')){
           $kjdata=json_decode(session('kjdata'),true);
         }else{
             $kjdata=[];
         }
         if (is_array($arr)) {
            foreach ($arr as $key => $value) {
                $kjdata[$key]=$value;
            }
        }
        
         session('kjdata', json_encode($kjdata));
        
    }
  
}