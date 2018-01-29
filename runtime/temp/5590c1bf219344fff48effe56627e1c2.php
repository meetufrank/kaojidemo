<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:44:"D:\www\kaoji/app/mobile\view\bsbm_order.html";i:1516948843;s:45:"D:\www\kaoji/app/mobile\view\common_base.html";i:1516874952;s:47:"D:\www\kaoji/app/mobile\view\common_header.html";i:1516961016;s:47:"D:\www\kaoji/app/mobile\view\common_footer.html";i:1516845378;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A simple jQuery image cropping plugin.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, jQuery plugin, image cropping, image crop, image move, image zoom, image rotate, image scale, front-end, frontend, web development">
    <meta name="author" content="Chen Fengyuan">
    <title><?php echo $site_title; ?></title>

    <link rel="stylesheet" href="__MOBILE__/css/iconfont.css">
    <link rel="stylesheet" href="__MOBILE__/css/reset.css">
    <?php $kjdata = json_decode(\think\Session::get('kjdata'),xxx); $bsdata = json_decode(\think\Session::get('bsdata'),xxx); ?>
    
    <link rel="stylesheet" type="text/css" href="__MOBILE__/css/style.css">
    <style type="text/css">
		
		.gap-gap{height:60px;}
	</style>
   
    </head>
    <body>
    
      
<nav class="HomeNav">
        <div class="container">
            <h1 class="clearfix">
                <a class="float-L" href="#">
                    <span class="icon iconfont icon-fanhui"></span>
                </a>
                <span class="title"><?php echo $form_title; ?></span>
            </h1>

        </div>
    </nav>
    <div class="menu">
        <div class="container content">
            <div ><a href="#"><span>在线考级报名平台</span></a></div>
            <div class="menuRight"><a href="#"><span class="icon iconfont icon-xuanxiang"></span></a></div>
        </div>
    </div>
    <div class="show">
			<div onClick="javascript:window.location.href='<?php echo url('user/userorder'); ?>';">我的订单</div>
			<div>审核进度</div>
			<div>退出</div>
		</div>
    
     
	<!-- 确认订单 -->
	<div class="gap-gap">
		<?php echo $bslist['title']; ?>比赛报名系统
	</div>
	<div class="information">
		<div class="order border-bottom-solid">
			<div class="examinee-info">总金额</div>
			<div class="order-val"><span>￥</span><?php echo $costlist['cost']; ?></div>
		</div>
		<div class="order-info">
			<div class="examinee-info">姓名</div>
			<div class="order-info-val"><?php echo $bsdata['name']; ?></div>
		</div>
		<div class="order-info">
			<div class="examinee-info">报名科目</div>
			<div class="order-info-val"><?php echo $costlist['yqtitle']; ?></div>
		</div>
		<div class="order-info">
			<div class="examinee-info">级别</div>
			<div class="order-info-val"><?php echo $costlist['leveltitle']; ?></div>
		</div>
		<div class="order-info">
			<div class="examinee-info">组别</div>
			<div class="order-info-val"><?php echo $costlist['teamtitle']; ?></div>
		</div>
		<div class="order-info">
			<div class="examinee-info">报名费</div>
			<div class="order-info-val"><?php echo $costlist['cost']; ?></div>
		</div>
		<div class="order-info">
			<div class="examinee-info">平台服务费</div>
			<div class="order-info-val"><?php echo $costlist['service_cost']; ?></div>
		</div>
	</div>
	<div class="order-footer">
		<a href="<?php echo url('save_order'); ?>"><button class="order-btn">完成</button></a>
	</div>
        
    
    
    
    
  
    
    
    <script src="__MOBILE__/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>
    	<script>
	    (function () {
	        var timer;
	        changeFixedW();
	        function changeFixedW() {
	            var width = window.screen.width;
	            var fixedW = 750;
	            var scale = width / fixedW;
	            var meta = document.createElement('meta');
	            meta.setAttribute('name','viewport');
	            meta.setAttribute('content','width='+fixedW+',initial-scale='+scale+',maximum-scale='+scale+',user-scalable=no');
	            document.head.appendChild(meta);
	        }
	        window.addEventListener('resize', function () {
	            clearTimeout(timer);    
	            timer = setTimeout(changeFixedW, 300);
	        }, false);
	        window.addEventListener('pageshow', function (e) {
	            if (e.persisted) {
	                clearTimeout(timer);
	                timer = setTimeout(changeFixedW, 300);
	            }
	        }, false);
	    })();
             $('.menuRight').click(function(){
            $('.show').toggle(500);
        });
	</script>
        
        
          </body>
  </html>  