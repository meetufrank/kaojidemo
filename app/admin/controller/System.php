<?php
namespace app\admin\controller;
use think\Db;
use think\Request;
use clt\Leftnav;
use app\admin\model\System as SysModel;
use app\common\payapi;
class System extends Common
{
    /********************************站点管理*******************************/
    //站点设置
    public function system($sys_id=1){
        $table = db('system');
        if(request()->isPost()) {
            $datas = input('post.');
            if($table->where('id',1)->update($datas)!==false) {
                savecache('System');
                return json(['code' => 1, 'msg' => '站点设置保存成功!', 'url' => url('system/system')]);
            } else {
                return json(array('code' => 0, 'msg' =>'站点设置保存失败！'));
            }
        }else{
            $system = $table->field('id,name,url,title,key,des,bah,copyright,ads,tel,email,logo')->find($sys_id);
            $this->assign('system', $system);
            return $this->fetch();
        }
    }
    public function email(){
        $table = db('config');
        if(request()->isPost()) {
            $datas = input('post.');
            foreach ($datas as $k=>$v){
                $table->where(['name'=>$k,'inc_type'=>'smtp'])->update(['value'=>$v]);
            }
            return json(['code' => 1, 'msg' => '邮箱设置成功!', 'url' => url('system/email')]);
        }else{
            $smtp = $table->where(['inc_type'=>'smtp'])->select();
            $info = convert_arr_kv($smtp,'name','value');
            $this->assign('info', $info);
            return $this->fetch();
        }
    }
    public function trySend(){
        $sender = input('email');
        //检查是否邮箱格式
        if (!is_email($sender)) {
            return json(['code' => -1, 'msg' => '测试邮箱码格式有误']);
        }
        $send = send_email($sender, '测试邮件', '您好！这是一封来自'.$this->system['name'].'的测试邮件！');
        if ($send) {
            return json(['code' => 1, 'msg' => '邮件发送成功！']);
        } else {
            return json(['code' => -1, 'msg' => '邮件发送失败！']);
        }
    }
    
    
    
    /********************************支付管理*******************************/
    /*
     * 支付配置列表
     */
      public function payconf(){
          $data=db('paylist')->where(['delete_time'=>0])->select();
          foreach ($data as $key => $value) {
              if(!empty($data[$key]['data'])){
              $data[$key]['data']=json_decode($data[$key]['data'],true); 
              }
          }
          
          $this->assign('info', $data);
        return $this->fetch();
     }
     /*
      * 支付配置修改与添加
      */
     public function payedit(){
         $table=db('paylist');
         if(request()->isPost()) {
         //接收参数
       $data=input('post.');
  
       //将转换成json
       if (isset($data['id'])){
           $id=$data['id'];
           //如果是支付宝
           if($id==1){
                $jsonarr=[
                     'app_id'=>$data['app_id'],
                     'merchant_private_key'=>$data['merchant_private_key'],
                     'alipay_public_key'=>$data['alipay_public_key']
                   ];
                $jsonstr= json_encode($jsonarr);
                $t=[
                    'data'=>$jsonstr,
                    'logo'=>$data['pic']
                ];
                $result=$table->where(['id'=>$id])->update($t);
                if($result){
                   return json(['code' => 1, 'msg' => '修改配置成功！']); 
                }else{
                    return json(['code' => -1, 'msg' => '修改配置失败！']);
                }
           }
           //如果是微信
           if($id==2){
                $jsonarr=[
                     'appid'=>$data['appid'],
                     'secret'=>$data['secret'],
                     'shopid'=>$data['shopid'],
                     'shopsecret'=>$data['shopsecret'],
                   ];
                $jsonstr= json_encode($jsonarr);
                $t=[
                    'data'=>$jsonstr,
                    'logo'=>$data['pic']
                ];
                $result=$table->where(['id'=>$id])->update($t);
                if($result){
                   return json(['code' => 1, 'msg' => '修改配置成功！']); 
                }else{
                    return json(['code' => -1, 'msg' => '修改配置失败！']);
                }
           }
       }
   }
   
        
     }
     
     /*
      * 测试调用
      * 
      */
     public function payceshi(){
        $id = input('id');
        $apidata=db('paylist')->where(['id'=>$id])->find();
        if($id==1){  //支付宝
           
            //将配置 数据提取出来
            $data=json_decode($apidata['data'],true);
             $api=new payapi\baoapi($data);
             $params=[
                 'subject'=>'测试',
                 'out_trade_no'=>1111111,
                 'total_amount'=>1*100
             ];
             $api->webpay($params);   //后台测试使用电脑端支付
             //$api->wappay($params);   //手机端
         }
         if($id==2){  //微信
             
         }
         
         
      }
}
