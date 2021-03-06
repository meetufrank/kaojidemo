<?php
namespace app\mobile\controller;

use app\common\logic\KjLogic;
use app\common\logic\UploadLogic;
class Bsbm extends Common{
    public function _initialize(){
        parent::_initialize();
    }
     /*
      * 获取并渲染比赛信息
      */
    public function getbslist() {
        $id= input('bsid');
        $map=[];
        if(empty($id)){
            if(empty(session('bsdata'))){
               $this->error('缺少必要参数'); 
            }else{
                $id= json_decode(session('bsdata'),true)['bsid'];
            }
        }
       if($id){
           $map=[ 'id'=>$id ];
           $list=KjLogic::getInstance()->getbslist($map);
        if(!empty($list)){
            
            $this->site_title=$list[0]['title'];
             $this->assign('bslist',$list[0]);  //比赛
             return $id;
        }else{
            $this->error('比赛不存在或禁止报名');
           
        }
       }
    }
    public function Index(){
        
       
        $this->form_title='比赛信息';
       $id= input('bsid');
       if($id){
           if(empty(session('bsdata'))){
                session('bsdata', json_encode(['bsid'=>$id]));
           }else{
              
               $data=json_decode(session('bsdata'),true);
             if(empty($data['bsid'])){
               session('bsdata', json_encode(['bsid'=>$id]));
            }else{
                
                $data['bsid']=$id;
                session('bsdata', json_encode($data));
            }  
           }
            
          
       }else{
           $this->error('未选择比赛'); 
       }
        
        $this->getbslist();
        
         return $this->assignfetch();
       
        
    }

    public function address(){
        
        $this->form_title='参赛信息';
        $this->getbslist();
       
      
        $province = db('Region')->where ( array('pid'=>1) )->select ();
        
        //查询证件类型
        //身份证
        $cardlist=db('idcard')->select();
        $this->assign('cardlist',$cardlist);
        $this->assign('province',$province);
        return $this->assignfetch();
    }

     public function order(){
        
        $this->form_title='确认订单';
        $id=$this->getbslist();
        if($id){
            //提取表单填写信息，并总结价格
            
           $costlist=KjLogic::getInstance()->getcost();
           if(!empty($costlist)){
                $costlist= $costlist[0];
                $amount= round($costlist['cost']+$costlist['service_cost'],2);
                $costlist['amount']=$amount;
               $this->assign('costlist',$costlist);
               return  $this->assignfetch();
           }else{
               $this->error('提交参赛项目有误，请重新提交');
           }
           
        }
        
    }
   //生成订单
     public function save_order(){
      
            
       $form= json_decode(session('bsdata'),true);
       $costlist=KjLogic::getInstance()->getcost();
       
       if(!empty($costlist)){
              //生成订单
           $costlist=$costlist[0];
           $wxje = $costlist['cost']; //报名金额
           $fwje = $costlist['service_cost']; //平台服务费
           $jg=round($wxje+$fwje,2);
           $out_trade_no = date('Ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8); //订单号
          
          
           
           /*
            * 整合报名数据
            */
           $bmdata=[
              'data'=>[
               'name'=>$form['name'], 
               'uid'=>session('user.id'), 
               'sex'=>$form['sex'], 
               'birthday'=> $form['date'], 
               'country'=>$form['country'], 
               'nation'=>$form['ethnic'], 
               'tel'=>$form['tel'], 
               'thumb'=>$form['bsthumb'],
               'email'=>$form['email'],
               'province'=>$form['province'], 
               'city'=>$form['city'],
               'district'=>$form['district'],
               'address'=>$form['address'],
               'zipcode'=>$form['zipcode'],
               'cardid'=>$form['cardid'],
               'idtpl'=>$form['idtpl'],
               'school'=>$form['school'],
               'costid'=>$costlist['costid'],
               'costtitle'=>$costlist['costtitle'],
               'videourl'=>$form['videourl'],
               'sings'=>trim_array_element($form['sings']),
               'order_no'=>$out_trade_no,
               'createtime'=> time()
              ],
              'more'=>$costlist
           ];
           foreach ($bmdata['data'] as $key => $value) {
               if(empty($value)){
                  unset($bmdata['data'][$key]); 
               }
               
           }
           $data=[
             'title'=>$costlist['gametitle'].'报名比赛订单',//标题
             'order_no'=>  $out_trade_no,
             'order_money' => $jg, //订单总金额
             'fee'=>$wxje,//报名费
             'fw_fee'=>$fwje,//服务费
             'state' => 0, //支付状态 0 未支付, 1已支付
             'uid' => session('user.id'), //用户uid
             'addtime' => time(), //下单时间
             'update_time' => 0, //支付时间
             'order_type'=> 3, //订单类型，3为比赛类型 
             'order_data'=>serialize(json_encode($bmdata))  //报名数据
           ];
           $result=KjLogic::getInstance()->addorder($data);
               if($result){
                   session('order_no',$out_trade_no);
                   session('bsdata',null);
                   session('bsdata', json_encode(['bsid'=>$form['bsid']]));
                   $this->redirect(url('pay/paylist/index',['id'=>1]));  //微信浏览器支付
               }
           }else{
               $this->error('提交参赛项目有误，请重新提交');
           }
    }
    
    
        public function cropper(){
        $this->form_title='上传头像';
        $id= $this->getbslist();
        
        
       return  $this->assignfetch();
    }
    
     public function project() {
        
        $this->form_title='参赛项目';
        $id= $this->getbslist();
       if($id){
          //获取比赛乐器
       $map=[
           'gc.gameid'=>$id
       ]; 
        $gamelist=KjLogic::getInstance()->getgamecost($map);
        
        $this->assign('gamelist',$gamelist);
        return  $this->assignfetch();
       }
       
       
       
    }

    
    public function bsupload() {
         
        if(input('post.data')){
           
            $path=UploadLogic::getInstance()->uploadphoto(input('post.data'));
            $this->getkjdata(['bsthumb'=>$path?$path:'']);
            return ['code'=>1,'msg'=>'ok'];
        }else{
           return false;
        }
        
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

    /*
     * 获取联动比赛级别项
     */
    public function getLevel(){
       
        $pid = input("yqid");
        $id= $this->getbslist();
        $map=[
           'gc.gameid'=>$id,
            'gc.yqid'=>$pid
       ]; 
        $gamelist=KjLogic::getInstance()->getgamecost($map);
        
        return json($gamelist);
    }
    /*
     * 获取联动比赛组别项
     */
    public function getTeam(){
       
        $pid = input("levelid");
        $id= $this->getbslist();
        $map=[
           'gc.gameid'=>$id,
            'gc.id'=>$pid
        ]; 
       
        $gamelist=KjLogic::getInstance()->getgamecost($map);
        
        return json($gamelist);
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
        if(session('bsdata')){
           $kjdata=json_decode(session('bsdata'),true);
         }else{
             $kjdata=[];
         }
         if (is_array($arr)) {
            foreach ($arr as $key => $value) {
                $kjdata[$key]=$value;
            }
        }
        
         session('bsdata', json_encode($kjdata));
        
    }
  
}