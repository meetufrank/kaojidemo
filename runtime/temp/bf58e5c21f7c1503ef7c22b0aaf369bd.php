<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:45:"D:\www\kaoji/app/admin\view\system\paywx.html";i:1514366125;}*/ ?>
<!doctype html>
<html class="no-js fixed-layout">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>微信充值</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<link rel="alternate icon" type="image/png" href="/favicon.ico">
		<link rel="stylesheet" href="__ADMIN__/wx_pay/assets/css/amazeui.min.css" />
		<link rel="stylesheet" href="__ADMIN__/wx_pay/assets/css/admin.css" />
		<script src="__ADMIN__/wx_pay/js/jquery.js"></script>
		<script src="__ADMIN__/wx_pay/assets/layer/layer.js" type="text/javascript" charset="utf-8"></script>
		<script href="__ADMIN__/wx_pay/assets/js/qrcode.js" ></script>
		<script language="JavaScript">
		/*
			由于微信支付完成后不可以跳转，这里写了个监听跳转
		*/
	    function Check(){
	    	var out_trade_no = "<?php echo $out_trade_no; ?>";

            $.post("<?php echo url('system/paylog'); ?>",{out_trade_no:out_trade_no},function(result){

                //支付成功跳转
                if(result==1){
                   alert("付款成功,即将关闭页面");
                    //location.href = "http://www.baidu.com"; //页面跳转
                    window.close();
				}
            });
	    }
	    window.setInterval("Check()",3000);
	</script>
	<style type="text/css">
		#qrcode img{width: 150px; height: 150px; }
		.ThinkAjax{display: none;}
		#ThinkAjaxResult{display: none;}
		div.am-panel-bd{
			 width:50%;
			 margin: 0 auto;
			 background:#FFFFFF;
			 margin-top:50px;
		}
	</style>
	</head>
	<body style="background:#F0F0F0;">
        <div class="admin-content"  style="width: 100%;height: 100%; background:#F0F0F0;">
        <div class="am-panel-bd" style="padding-bottom:80px">
            <div class="wxpay" style="text-align:center; border-bottom:1px solid #D9D9D9;">
                 <img src="__ADMIN__/wx_pay/assets/img/wx.gif"  style="height:100px"/>
            </div>
            <h3 class="am-text-ss  am-margin-top-lg">付款金额：<font color="#E61C42" size="5"><?php echo $wxje; ?>元</font></h3>
            <style>
              .admin-content img{
                   width:40%;
               }
            </style>
            <div align="center" id="qrcode" class="qrc"></div>
        </div>
        </div>
    <script>
        if(<?php echo $unifiedOrderResult["code_url"] != NULL; ?>)
        {
            var url = 'http://paysdk.weixin.qq.com/example/qrcode.php?data='+"<?php echo urlencode($code_url); ?>";
            
            var wording=document.createElement('p');
            wording.innerHTML = "请打开微信使用扫一扫进行微信支付";
            var code=document.createElement('DIV');
            var img=document.createElement("img");
            img.src=url;
             code.appendChild(img);
            var element=document.getElementById("qrcode");
            element.appendChild(wording);
            element.appendChild(code);

        }
    </script>