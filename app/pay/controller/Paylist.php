<?php
namespace app\pay\controller;

use think\Controller;
use think\Loader;
use app\common\logic\PayLogic;
use think\db;
use think\Request;
use app\common\payapi;
class Paylist extends Controller {


    public function index() {
        $wxje = 0.01; //金额
          $out_trade_no = date('Ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8); //订单号
          $result=db('pay_order')->insert(array(
                'order_no' => $out_trade_no,
                'order_money' => $wxje, //订单金额
                'state' => 0, //支付状态 0 未支付, 1已支付
                'uid' => 1, //用户uid
                'addtime' => time(), //下单时间
                'update_time' => 0 //支付时间
            ));
            session('order_no',$out_trade_no);
            $this->redirect(url('wxwap'));
    }
    
    
    //微信浏览端
     public function wxwap(Request $request) {
        Loader::import('wxpay.WxPayPubHelper');
         $orderid= session('order_no');  //input('orderid')
         $orderid || $this->error("未接收到订单号");
         $order=db('pay_order')->where(['order_no'=>$orderid])->find();
         if(empty($order)){
             $this->error("该订单不存在");
         }
        //获取微信配置
        //调用微信接口
        $wxje = 0.01; //金额
         $order_no=$order['order_no'];
         //获取用户openid
         $tools=new \JsApi_pub();
         if(!isset($_GET['code'])){
              $redirectUrl=$request->url(true);
             $tools->getCode($redirectUrl);   //获取code
         }else{
             $tools->setCode($_GET['code']);   //获取openid
            $opendid=$tools->getOpenid(); 
         }
         
        
        $unifiedOrder = new \UnifiedOrder_pub();
            $unifiedOrder->setParameter("body", "测试"); //商品描述
            
            $unifiedOrder->setParameter("out_trade_no", "$order_no"); //商户订单号
          
            $unifiedOrder->setParameter("total_fee", $wxje*100); //总金额
            

            /*
             * 换成你的域名写死
             */
            $unifiedOrder->setParameter("notify_url", $request->domain().'/pay/Pay/wx.html'); //回调地址
           
            $unifiedOrder->setParameter("trade_type", "JSAPI"); //交易类型
            //设置openid
            $unifiedOrder->setParameter("openid", "$opendid"); //交易类型
            $unifiedOrderResult = $unifiedOrder->getResult();
            if ($unifiedOrderResult["return_code"] == "FAIL") {
                //商户自行增加处理流程
                echo "通信出错：" . $unifiedOrderResult['return_msg'] . "<br>";
            } elseif ($unifiedOrderResult["result_code"] == "FAIL") {
                //商户自行增加处理流程
                echo "错误代码：" . $unifiedOrderResult['err_code'] . "<br>";
                echo "错误代码描述：" . $unifiedOrderResult['err_code_des'] . "<br>";
            } elseif ($unifiedOrderResult["prepay_id"] != NULL) {
                
                //获取参数
                $tools->setPrepayId($unifiedOrderResult["prepay_id"]);
                $jsApiParameters=$tools->getParameters();
              
                //商户自行增加处理流程
                /*
                  $data['u_id'] = session('uid');
                  $data['dh'] = $out_trade_no;
                  $data['total_fee'] = $wxje;
                  $data['dstatus'] = '0';
                  $data['dtime'] = time();
                  $data['jklx'] = '2';
                  session('wxdh', $out_trade_no);
                  $ord = M('Orderlist');
                  $ord->add($data);
                 */
            }
            $this->assign('out_trade_no', $order_no);
            $this->assign('jsApiParameters', $jsApiParameters);
            $this->assign('wxje', $wxje);
            $this->assign('unifiedOrderResult', $unifiedOrderResult);
            return $this->fetch();
    }
    
    
    
    //支付成功页面
    public function success() {
        echo '支付成功';
    }

}
