<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:46:"D:\www\kaoji/app/mobile\view\bsbm_address.html";i:1516933645;s:45:"D:\www\kaoji/app/mobile\view\common_base.html";i:1516874952;s:47:"D:\www\kaoji/app/mobile\view\common_header.html";i:1516961016;s:47:"D:\www\kaoji/app/mobile\view\common_footer.html";i:1516845378;}*/ ?>
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
    
    <link rel="stylesheet" href="__MOBILE__/css/address.css">
    <style type="text/css">
		.inBg{
			height:60px;
			line-height: 60px;
			font-size:26px;
			text-align:center;
		}
        form{height:90%;}
		form .content .formInput{
			margin-top:20px;
		}
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
    
    
    
   <div class="inBg">
       
       <?php echo $bslist['title']; ?>比赛报名系统

   </div>
    <div class="container">
        <form  id="form">
            <div class="content clearfix">
                <label class="formLabel float-L">省</label>
                <div class="formInput float-L">
                    <select name="province" id="province" data-foolish-msg="请填省份" >
                        <option value="">请填省份</option>
                        <?php if(is_array($province) || $province instanceof \think\Collection || $province instanceof \think\Paginator): if( count($province)==0 ) : echo "" ;else: foreach($province as $key=>$vo): ?>
                        <option value="<?php echo $vo['id']; ?>" <?php if($bsdata['province'] == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        
                    </select>

                </div>
            </div>
            <div class="content clearfix">
                <label class="formLabel float-L">市</label>
                <div class="formInput float-L">
                    <select name="city" id="city" data-foolish-msg="请填写市" >
                        <option value="">请填写市</option>
                      
                    </select>
                </div>
            </div>
            <div class="content clearfix">
                <label class="formLabel float-L">区</label>
                <div class="formInput float-L">
                    <select name="district" id="district" data-foolish-msg="请填写区/县" >
                        <option value="">请填写区/县</option>
                        
                    </select>

                </div>
            </div>
            <div class="content clearfix">
                <label class="formLabel float-L">详细地址</label>
                <div class="formInput float-L">
                    <input id="address" class="bor" data-foolish-msg="请输入联系地址" type="text" name="address"  placeholder="请输入联系地址" value="<?php echo $bsdata['address']; ?>">
                </div>
            </div>
            <div class="content clearfix">
                <label class="formLabel float-L">邮编</label>
                <div class="formInput float-L">
                    <input id="email" class="bor" type="tel" name="email" data-foolish-msg="请输入正确的邮编" placeholder="请填写邮编" value="<?php echo $bsdata['email']; ?>" >
                </div>
            </div>
            <div style="height:100px;"></div>

        </form>
    </div>



    <div id="footer" class="bottom clearfix">
        <div><a href="javascript:history.back(-1);"><span class="on">上一步</span></a></div>
        <div><span class="active">下一步</span></div>
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
        
	<script src="__MOBILE__/mobile/layer.js"></script>
    <script>
   
        function getcity(id){
          		var current_province_id=id;
                  
		
		$.ajax({
			url:"<?php echo url('getRegion'); ?>",
			data:{pid:current_province_id},
			dataType:'json',
			type:'post',
                        async: false,
			success:function(re){
                            
				var html='<option value="0">请选择</option>';
                                $("[name='district']").html(html);
				var item=re;
				for(var i in item){
                                    if (item[i]['id']=='<?php echo $bsdata['city']; ?>'){
					html +='<option value="'+item[i]['id']+'" selected>'+item[i]['name']+'</option>';
                                    }else{
                                        html +='<option value="'+item[i]['id']+'" >'+item[i]['name']+'</option>';
                                    }
					
				}
				$("[name='city']").html(html);
                                
			}
		})
      }
      
      
      function getdistrict(id){
          		var current_city=id;
		$.ajax({
			url:"<?php echo url('getRegion'); ?>",
			data:{pid:current_city},
			dataType:'json',
			type:'post',
			success:function(re){
				var html='<option value="0">请选择</option>';
				var item=re;
				for(var i in item){
                                    if (item[i]['id']=='<?php echo $bsdata['district']; ?>'){
					html +='<option value="'+item[i]['id']+'" selected>'+item[i]['name']+'</option>';
                                    }else{
                                        html +='<option value="'+item[i]['id']+'" >'+item[i]['name']+'</option>';
                                    }
					
				}
				$("[name='district']").html(html);
			}
		})
      }
      	$("[name='province']").change(function(){
		$("[name='city']").html('<option value="0">请选择</option>');
                getcity($(this).val());
                $("[name='district']").val();
	})
	$("[name='city']").change(function(){
		$("[name='district']").html('<option value="0">请选择</option>');

                getdistrict($(this).val());
	})
	var pro_id=$("[name='province']").val();
        if(pro_id>0){
            $("[name='city']").html('<option value="0">请选择</option>');
            getcity($("[name='province']").val());
            $("[name='district']").html('<option value="0">请选择</option>');
            getdistrict($("[name='city']").val());
        }
        
        var requestData ={};
        $("#footer .active").click(function() {
            var valid = true
            var requestData = {
                province : $("#province").val(),
                city : $("#city").val(),
                Area : $("#district").val(),
                address :$("#address").val(),
                email : $("#email").val()
            };
          
            if(valid && requestData.province.length <= 0){
                valid = false;
                var tips = $("#province").attr("data-foolish-msg");
                $("#province").focus();


            }
            if(valid && requestData.city.length <= 0){
                valid = false;
                var tips = $("#city").attr("data-foolish-msg");
                $("#city").focus();


            }
            if(valid && requestData.Area.length <= 0){
                valid = false;
                var tips = $("#district").attr("data-foolish-msg");
                $("#district").focus();


            }
            if(valid && requestData.address.length <=0){
                valid = false;
                var tips = $("#address").attr("data-foolish-msg");
                $("#address").focus();


            }
            if(valid && requestData.email.length !==6 ){
                valid = false;
                var tips = $("#email").attr("data-foolish-msg");
                $("#email").focus();


            }

            if(valid){
                savedata();
            }else{
                layer.open({
                    content: tips
                    ,skin: 'msg'
                    ,time: 1 //2秒后自动关闭
                });
            }


function savedata(){
  $.ajax({
			url:"<?php echo url('savedata'); ?>",
			data:{data:$('#form').serialize()},
			dataType:'json',
			type:'post',
			success:function(re){
				window.location.href='<?php echo url('project'); ?>';
			}
		}) 
}

        });





    </script>
    
        
          </body>
  </html>  