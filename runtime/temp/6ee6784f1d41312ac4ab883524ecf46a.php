<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:48:"D:\www\kaoji/app/mobile\view\user_userorder.html";i:1516964767;s:45:"D:\www\kaoji/app/mobile\view\common_base.html";i:1516874952;s:47:"D:\www\kaoji/app/mobile\view\common_header.html";i:1516961016;s:47:"D:\www\kaoji/app/mobile\view\common_footer.html";i:1516845378;}*/ ?>
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
		.personal{
			height:120px;
			line-height: 120px;
		}
		ol{
			display: -webkit-flex;
			display: flex;
		}
		ol li{
			flex:1;
			text-align: center;
			font-size: 30px;
		}
		ol li span{color:reb(51,51,51);}
		ol li.active>span{display:inline-block;padding:0 0;color:red;border-bottom:4px solid red;}
		.content>div{
			font-size:30px;
		}
		ul li{display: none;}
		ul li.active{display: block;}
		.information .order{
			line-height: 120px;
		}
		.information .order-val{font-size:30px;}
		.information .order-val span{font-size: 30px;}
		.gray span{color:#ddd;}
		.information .examinee-info{color:#333333;}
		.order-info{border-bottom:1px solid rgb(213,213,213);}
		.pay{
			display: inline-block;
			width:140px;
			height:58px;
			line-height: 58px;
			text-align: center;
			margin:0 2px;
			background:rgb(229,229,229);
		}
		.pay.active{
			background:rgb(58,54,51);
			color:#fff;
		}
		.bottom{height:200px;}
		
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
    
     
	<div class="mian">
		<div class="personal">
		<ol>
			<li class="active"><span>全部</span></li>
			<li ><span >未支付</span></li>
			<li ><span>已完成</span></li>
		</ol>
	</div>
	<!-- 确认订单 -->
	<div class="gap-gap"></div>
	<div>
		<ul>
			<li class="active">
                            <?php if(is_array($order) || $order instanceof \think\Collection || $order instanceof \think\Paginator): if( count($order)==0 ) : echo "" ;else: foreach($order as $key=>$od): $ordertype = $od['order_type']; ?>
				<div class="information">
					<div class="order border-bottom-solid">
						<div class="examinee-info">订单编号：<?php echo $od['order_no']; ?></div>
						<div class="order-val"><span><?php if($od['state'] == 1): ?>已完成<?php else: ?>未支付<?php endif; ?></span></div>
					</div>
					<div class="order-info">
						<div class="examinee-info">类型</div>
                                                <?php $info =db("order_type")->where(" id = $ordertype")->find();?>
						<div class="order-info-val"><?php echo $info['name']; ?></div>
                                                
					</div>
					<div class="order-info">
						<div class="examinee-info">姓名</div>
						<div class="order-info-val"><?php echo $od['order_data']['name']; ?></div>
					</div>
					<div class="order-info">
						<div class="examinee-info">提交时间</div>
						<div class="order-info-val"><?php echo date("Y-m-d",$od['addtime']); ?></div>
					</div>
					<div class="order-info bottom">
						<div class="examinee-info"></div>
						<div class="order-info-val gray"><span>支付费用:</span><?php echo $od['order_money']; ?></div>
                                                <?php if($od['state'] == 0): ?>
                                                     <div class="">
							<div class="order-info-val ">
                                                            <div class="pay active payonclick" data-no="<?php echo $od['order_no']; ?>">支付</div>
								<div class="pay">取消</div>
							</div>
						    </div>
                                                <?php endif; ?>
					</div>
				</div>
				<div class="gap-gap"></div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
				
                             <div style="height:150px;">
						
					</div>
				
			</li>
			<li>
				<?php if(is_array($noarr) || $noarr instanceof \think\Collection || $noarr instanceof \think\Paginator): if( count($noarr)==0 ) : echo "" ;else: foreach($noarr as $key=>$od): $ordertype = $od['order_type']; ?>
				<div class="information">
					<div class="order border-bottom-solid">
						<div class="examinee-info">订单编号：<?php echo $od['order_no']; ?></div>
						<div class="order-val"><span><?php if($od['state'] == 1): ?>已完成<?php else: ?>未支付<?php endif; ?></span></div>
					</div>
					<div class="order-info">
						<div class="examinee-info">类型</div>
                                                <?php $info =db("order_type")->where(" id = $ordertype")->find();?>
						<div class="order-info-val"><?php echo $info['name']; ?></div>
                                                
					</div>
					<div class="order-info">
						<div class="examinee-info">姓名</div>
						<div class="order-info-val"><?php echo $od['order_data']['name']; ?></div>
					</div>
					<div class="order-info">
						<div class="examinee-info">提交时间</div>
						<div class="order-info-val"><?php echo date("Y-m-d",$od['addtime']); ?></div>
					</div>
					<div class="order-info bottom">
						<div class="examinee-info"></div>
						<div class="order-info-val gray"><span>支付费用:</span><?php echo $od['order_money']; ?></div>
                                                <?php if($od['state'] == 0): ?>
                                                     <div class="">
							<div class="order-info-val ">
								<div class="pay active payonclick" data-no="<?php echo $od['order_no']; ?>">支付</div>
								<div class="pay">取消</div>
							</div>
						    </div>
                                                <?php endif; ?>
					</div>
				</div>
				<div class="gap-gap"></div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
				
                             <div style="height:150px;">
						
					</div>
			</li>
			<li>
				<?php if(is_array($yesarr) || $yesarr instanceof \think\Collection || $yesarr instanceof \think\Paginator): if( count($yesarr)==0 ) : echo "" ;else: foreach($yesarr as $key=>$od): $ordertype = $od['order_type']; ?>
				<div class="information">
					<div class="order border-bottom-solid">
						<div class="examinee-info">订单编号：<?php echo $od['order_no']; ?></div>
						<div class="order-val"><span><?php if($od['state'] == 1): ?>已完成<?php else: ?>未支付<?php endif; ?></span></div>
					</div>
					<div class="order-info">
						<div class="examinee-info">类型</div>
                                                <?php $info =db("order_type")->where(" id = $ordertype")->find();?>
						<div class="order-info-val"><?php echo $info['name']; ?></div>
                                                
					</div>
					<div class="order-info">
						<div class="examinee-info">姓名</div>
						<div class="order-info-val"><?php echo $od['order_data']['name']; ?></div>
					</div>
					<div class="order-info">
						<div class="examinee-info">提交时间</div>
						<div class="order-info-val"><?php echo date("Y-m-d",$od['addtime']); ?></div>
					</div>
					<div class="order-info bottom">
						<div class="examinee-info"></div>
						<div class="order-info-val gray"><span>支付费用:</span><?php echo $od['order_money']; ?></div>
                                               
					</div>
				</div>
				<div class="gap-gap"></div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
				
                             <div style="height:150px;">
						
					</div>
			</li>
		</ul>
	</div>
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
        
	<script type="text/javascript">
		var $Oli = $("ol li");
		$Oli.click(function(){
			var index=$(this).index();
			$(this).addClass('active').siblings().removeClass('active');
			$(this).parents('.mian').find('ul li').eq(index).addClass('active').siblings().removeClass('active');
			
		});
                $(".payonclick").click(function(e){
                    var order_no=$(this).attr('data-no');
                     $.ajax({
			url:"<?php echo url('saveorderno'); ?>",
			data:{order_no:order_no},
			dataType:'json',
			type:'post',
                        async: false,
			success:function(re){
                            
				window.location.href="<?php echo url('pay/paylist/index',['id'=>1]); ?>";
                                
			}
		   })
                });
                
		
	</script>
        
        
          </body>
  </html>  