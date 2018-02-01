<?php
namespace app\mobile\controller;
use think\Input;
use think\Db;
use clt\Leftnav;
use think\Request;
use think\Controller;
class Common extends Controller{
    protected $pagesize,$site_title,$form_title;
    public function _initialize(){
      session('user.id',1);
       if (!session('user.id')) {
           
            session('l_return_url', request()->url(true));
            if(is_weixin()){
                $this->redirect(url('user/loginApi/login',array('oauth'=>'phone_weixin')));
                exit;
            }else{
                $this->redirect(url('user/loginApi/login',array('oauth'=>'phone_weixin')));
                exit;
            }
            
       }else{
          
            session('l_return_url',null);
       }
    }
    public function _empty(){
        return $this->error('空操作，返回上次访问页面中...');
    }
    
   public function assignfetch($template='') {
        
        
        $this->assign('site_title', $this->site_title);
        $this->assign('form_title', $this->form_title);
        return $this->fetch();
    }
}