<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:44:"D:\www\kaoji/app/mobile\view\bsbm_index.html";i:1516932190;s:45:"D:\www\kaoji/app/mobile\view\common_base.html";i:1516874952;s:47:"D:\www\kaoji/app/mobile\view\common_header.html";i:1516961016;s:47:"D:\www\kaoji/app/mobile\view\common_footer.html";i:1516845378;}*/ ?>
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
    
     <link rel="stylesheet" href="__MOBILE__/date/css/weui.min.css">
    <link rel="stylesheet" href="__MOBILE__/date/css/jquery-weui.css">
    <link rel="stylesheet" href="__MOBILE__/date/css/demos.css">
    <!--<link rel="stylesheet" href="css/layui.css">-->
    <link rel="stylesheet" href="__MOBILE__/css/information.css">
    <style type="text/css">
    	.inBg{
    		height:60px;
    		line-height: 50px;
    		text-align: center;
    		font-size:26px;
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
                <label class="formLabel float-L ">姓名</label>
                <div class="formInput float-L">
                    <input class="bor" type="text" id="name" name="name" data-foolish-msg="请填写正确的姓名"  placeholder="姓名" value="<?php echo $bsdata['name']; ?>" >
                </div>
            </div>
            <div class="content clearfix">
                <label class="formLabel float-L">性别</label>
                <div class="formInput float-L sex">
                    <div class="sex-radio">
                        <input type="radio" name="sex" value="1" title="男" <?php if($bsdata['sex'] == 1): ?>checked<?php endif; ?>>
                        <label>男</label>
                    </div>
                    <div class="sex-radio">
                        <input type="radio" name="sex" value="0" title="女" <?php if($bsdata['sex'] == 0): ?>checked<?php endif; ?>>
                        <label >女</label>
                    </div>
                </div>
            </div>
            <div class="content clearfix">
                <label class="formLabel float-L">生日</label>
                <div class="formInput float-L">
                    <input readonly type="text" id="dateTime" name="date" data-foolish-msg="请填写出生日期" value="<?php echo $bsdata['date']; ?>" placeholder="日期" >
                </div>
            </div>
            <div class="content clearfix">
                <label class="formLabel float-L">国籍</label>
                <div class="formInput float-L">
                    <select id="country" name="country" data-foolish-msg="请选择国籍" >
                        <option value="0"  >请选择国籍</option>
                        <?php $result = db("country")->where("")->limit(999)->order("listorder asc,createtime desc")->select();foreach ($result as $k=>$vo):?>
                        <option value="<?php echo $vo['id']; ?>" seleted <?php if($bsdata['country'] == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['name']; ?></option>
                        <?php endforeach ?>
                        
                    </select>
                </div>
            </div>
            <div class="content clearfix">
                <label class="formLabel float-L">民族</label>
                <div class="formInput float-L">
                    <select name="ethnic" id="ethnic" data-foolish-msg="请选择民族">
                        <option value="0">请选择民族</option>
                        <?php $result = db("nation")->where("")->limit(999)->order("listorder asc,createtime desc")->select();foreach ($result as $k=>$vo):?>
                        <option value="<?php echo $vo['id']; ?>"  <?php if($bsdata['ethnic'] == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['name']; ?></option>
                        <?php endforeach ?>
                       
                    </select>

                </div>
            </div>
            <div class="content clearfix">
                <label class="formLabel float-L">手机</label>
                <div class="formInput float-L">
                    <input id="tel" class="bor" type="tel" name="tel" data-foolish-msg="请填写正确手机号" placeholder="请填写手机号" value="<?php echo $bsdata['tel']; ?>">
                </div>
            </div>
        </form>
    </div>
    <div class="bottom">
        <span type="submit">下一步</span>

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
    <script src="__MOBILE__/js/datePicker.js"></script>
    <script src="__MOBILE__/date/js/jquery-2.1.4.js"></script>
    <script src="__MOBILE__/date/js/fastclick.js"></script>
    <script>
        $(function() {
            FastClick.attach(document.body);
        });
    </script>
    <script src="__MOBILE__/date/js/jquery-weui.js"></script>

    <script>


        $("#dateTime").datetimePicker({
            //  title: '自定义格式',
            yearSplit: '年',
            monthSplit: '月',
            dateSplit: '日',

            times: function () {

            },
            onChange: function (picker, values, displayValues) {
                console.log(values);
            }
        });


    </script>
    <script>


        var requestData ={};
        $(".bottom").click(function() {
            event.preventDefault();
            var valid = true;
            var requestData = {
                name : $("#name").val(),
                dateTime : $("#dateTime").val(),
                country : $("#country").val(),
                ethnic :$("#ethnic").val(),
                tel : $("#tel").val()
            };
            
            if(valid && !name(requestData.name)){
                var valid = false;
                var tips = $("#name").attr("data-foolish-msg");
                $("#name").focus();


            }
            if(valid && requestData.dateTime == ""){
                var valid = false;
                var tips = $("#dateTime").attr("data-foolish-msg");
                $("#dateTime").focus();


            }
            if(valid && requestData.country <= 0){
                var valid = false;
                $("#country").focus();
                var tips = $("#country").attr("data-foolish-msg");


            }
            if(valid && requestData.ethnic <= 0){
                var valid = false;
                var tips = $("#ethnic").attr("data-foolish-msg");
                $("#ethnic").focus();


            }

            if(valid && !checkMobile(requestData.tel)){
                valid = false;
                var tips = $("#tel").attr("data-foolish-msg");
                $("#tel").focus();


            }

            function name(mobile) {
                if((/^[a-zA-Z\u4e00-\u9fa5]+$/).test(mobile)){
                    return true;
                }else{
                    return false;
                }
            }

            function checkMobile(mobile){
                if((/^1[3|4|5|6|7|8]\d{9}$/.test(mobile))){
                    return true;
                }else{
                    return false;
                }
            }


            if(valid){

               savedata();
            }else{
                layer.open({
                    content: tips
                    ,skin: 'msg'
                    ,time: 1
                })
            }

        });
function savedata(){
  $.ajax({
			url:"<?php echo url('savedata'); ?>",
			data:{data:$('#form').serialize()},
			dataType:'json',
			type:'post',
			success:function(re){
				window.location.href='<?php echo url('address'); ?>';
			}
		}) 
}

        
    </script>
    
        
          </body>
  </html>  