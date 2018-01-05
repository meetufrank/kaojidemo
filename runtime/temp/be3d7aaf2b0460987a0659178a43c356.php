<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:47:"D:\www\kaoji/app/admin\view\system\payconf.html";i:1514527521;s:44:"D:\www\kaoji/app/admin\view\common\head.html";i:1512630547;s:44:"D:\www\kaoji/app/admin\view\common\foot.html";i:1503623995;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo config('sys_name'); ?>后台管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="__STATIC__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/global.css" media="all">
    <link rel="stylesheet" href="__STATIC__/common/css/font.css" media="all">
</head>
<body class="skin-<?php if(!empty($_COOKIE['skin'])){echo $_COOKIE['skin'];}else{echo '0';setcookie('skin','0');}?>">

<div class="admin-main layui-anim layui-anim-upbit">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>支付配置</legend>
    </fieldset>
    <div class="layui-tab layui-tab-card" >
  <ul class="layui-tab-title">
      <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $k=>$vo): ?>
       <li <?php if($k == 0): ?>class="layui-this" <?php endif; ?>><?php echo $vo['payname']; ?>配置</li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
  <div class="layui-tab-content">
      <?php foreach($info as $vo): switch($vo['id']): case "1": ?>  
    <div class="layui-tab-item layui-show">
      <form class="layui-form layui-form-pane">
          <input type="hidden" lay-verify="required" name="id"  value="<?php echo $vo['id']; ?>" class="layui-input">
        <div class="layui-form-item">
            <label class="layui-form-label">
                APPID
            </label>
            <div class="layui-input-4">
                <input type="text" lay-verify="required" name="app_id" placeholder="APPID" <?php if(isset($vo['data']['app_id'])): ?>value="<?php echo $vo['data']['app_id']; ?>"<?php endif; ?> class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">商户私钥</label>
            <div class="layui-input-4">
                <input type="text" lay-verify="required" name="merchant_private_key" placeholder="商户私钥" <?php if(isset($vo['data']['merchant_private_key'])): ?>value="<?php echo $vo['data']['merchant_private_key']; ?>"<?php endif; ?>  class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">支付宝公钥</label>
            <div class="layui-input-4">
                <input type="text" name="alipay_public_key" lay-verify="required" placeholder="支付宝公钥" <?php if(isset($vo['data']['alipay_public_key'])): ?>value="<?php echo $vo['data']['alipay_public_key']; ?>"<?php endif; ?>  class="layui-input">
            </div>
        </div>
       <div class="layui-form-item">
            <label class="layui-form-label"><?php echo $vo['payname']; ?>logo</label>
            <input type="hidden" name="pic" id="pic<?php echo $vo['id']; ?>" <?php if(isset($vo['logo'])): ?>value="<?php echo $vo['logo']; ?>"<?php endif; ?>>
            <div class="layui-input-block">
                <div class="layui-upload">
                    <button type="button" class="layui-btn layui-btn-primary" id="adBtn<?php echo $vo['id']; ?>"><i class="icon icon-upload3"></i>点击上传</button>
                    <div class="layui-upload-list">
                        <img class="layui-upload-img" id="adPic<?php echo $vo['id']; ?>" <?php if(isset($vo['logo'])): ?>src="__PUBLIC__<?php echo $vo['logo']; ?>"<?php endif; ?> >
                        <p id="demoText<?php echo $vo['id']; ?>"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="submit"><?php echo lang('submit'); ?></button>
                <button type="reset" class="layui-btn layui-btn-primary"><?php echo lang('reset'); ?></button>
                <button type="button" class="layui-btn layui-btn-normal" id="trySend<?php echo $vo['id']; ?>">测试</button>
            </div>
        </div>
     </form>
    </div>
      <?php break; case "2": ?>  
    <div class="layui-tab-item ">
      <form class="layui-form layui-form-pane">
          <input type="hidden" lay-verify="required" name="id"  value="<?php echo $vo['id']; ?>" class="layui-input">
        <div class="layui-form-item">
            <label class="layui-form-label">
                <?php echo $vo['payname']; ?>APPID
            </label>
            <div class="layui-input-4">
                <input type="text" lay-verify="required" name="appid" placeholder="<?php echo $vo['payname']; ?>APPID" <?php if(isset($vo['data']['appid'])): ?>value="<?php echo $vo['data']['appid']; ?>" <?php endif; ?> class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><?php echo $vo['payname']; ?>SECRET</label>
            <div class="layui-input-4">
                <input type="text" lay-verify="required" name="appsecret" placeholder="<?php echo $vo['payname']; ?>SECRET" <?php if(isset($vo['data']['appsecret'])): ?>value="<?php echo $vo['data']['appsecret']; ?>" <?php endif; ?> class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">商户ID</label>
            <div class="layui-input-4">
                <input type="text" name="mchid" lay-verify="required" placeholder="商户ID" <?php if(isset($vo['data']['mchid'])): ?>value="<?php echo $vo['data']['mchid']; ?>" <?php endif; ?> class="layui-input">
            </div>
        </div>
          <div class="layui-form-item">
            <label class="layui-form-label">商户秘钥</label>
            <div class="layui-input-4">
                <input type="text" lay-verify="required" name="key" placeholder="商户支付秘钥" <?php if(isset($vo['data']['key'])): ?>value="<?php echo $vo['data']['key']; ?>" <?php endif; ?> class="layui-input">
            </div>
        </div>
           <div class="layui-form-item">
            <label class="layui-form-label">回调域名</label>
            <div class="layui-input-4">
                <input type="text" lay-verify="required" name="notify" placeholder="回调域名" <?php if(isset($vo['data']['notify'])): ?>value="<?php echo $vo['data']['notify']; ?>" <?php endif; ?> class="layui-input">
            </div>
        </div>
       <div class="layui-form-item">
            <label class="layui-form-label"><?php echo $vo['payname']; ?>logo</label>
            <input type="hidden" name="pic" id="pic<?php echo $vo['id']; ?>" <?php if(isset($vo['logo'])): ?>value="<?php echo $vo['logo']; ?>"<?php endif; ?>>
            <div class="layui-input-block">
                <div class="layui-upload">
                    <button type="button" class="layui-btn layui-btn-primary" id="adBtn<?php echo $vo['id']; ?>"><i class="icon icon-upload3"></i>点击上传</button>
                    <div class="layui-upload-list">
                        <img class="layui-upload-img" id="adPic<?php echo $vo['id']; ?>" <?php if(isset($vo['logo'])): ?>src="__PUBLIC__<?php echo $vo['logo']; ?>"<?php endif; ?> >
                        <p id="demoText<?php echo $vo['id']; ?>"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="submit"><?php echo lang('submit'); ?></button>
                <button type="reset" class="layui-btn layui-btn-primary"><?php echo lang('reset'); ?></button>
                <button type="button" class="layui-btn layui-btn-normal" id="trySend<?php echo $vo['id']; ?>">测试</button>
            </div>
        </div>
     </form>
    </div>
      <?php break; default: ?>
          <div class="layui-tab-item">需要配置</div>
             <?php endswitch; endforeach; ?>
  </div>
</div>
    
</div>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>


<script>
layui.use('element', function(){
  var $ = layui.jquery
  ,element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块
  
  //触发事件
  var active = {
    tabAdd: function(){
      //新增一个Tab项
      element.tabAdd('demo', {
        title: '新选项'+ (Math.random()*1000|0) //用于演示
        ,content: '内容'+ (Math.random()*1000|0)
        ,id: new Date().getTime() //实际使用一般是规定好的id，这里以时间戳模拟下
      })
    }
    ,tabDelete: function(othis){
      //删除指定Tab项
      element.tabDelete('demo', '44'); //删除：“商品管理”
      
      
      othis.addClass('layui-btn-disabled');
    }
    ,tabChange: function(){
      //切换到指定Tab项
      element.tabChange('demo', '22'); //切换到：用户管理
    }
  };
  
  $('.site-demo-active').on('click', function(){
    var othis = $(this), type = othis.data('type');
    active[type] ? active[type].call(this, othis) : '';
  });
  
  //Hash地址的定位
  var layid = location.hash.replace(/^#test=/, '');
  element.tabChange('test', layid);
  
  element.on('tab(test)', function(elem){
    location.hash = 'test='+ $(this).attr('lay-id');
  });
  
});
</script>
<script>
    layui.use(['form', 'layer','upload'], function () {
        var form = layui.form,layer = layui.layer,$= layui.jquery;upload = layui.upload;
        
        //提交监听
        form.on('submit(submit)', function (data) {
            loading =layer.load(1, {shade: [0.1,'#fff']});
            $.post("<?php echo url('system/payedit'); ?>",data.field,function(res){
                layer.close(loading);
                if(res.code > 0){
                    layer.msg(res.msg,{icon: 1, time: 1000},function(){
                        location.href =location.href;
                    });
                }else{
                    layer.msg(res.msg,{icon: 2, time: 1000});
                }
            });
        });
        
        //普通图片上传
         <?php foreach($info as $vo): ?>
         $('#trySend<?php echo $vo['id']; ?>').click(function(){
          
             loading =layer.load(1, {shade: [0.1,'#fff']});
             var tmpWin  = window.open();
             $.post("<?php echo url('system/addorder'); ?>",'',function(res){
                layer.close(loading);
                if(res.code > 0){
                    
                    var orderid=res.id;
                   tmpWin.location.href = "<?php echo url('System/payceshi'); ?>?id=<?php echo $vo['id']; ?>&orderid="+orderid;
                 
                }else{
                    
                   tmpWin.document.write('服务器处理异常');
                    layer.msg(res.msg,{icon: 2, time: 1000});
                }
            });
    
           
        });
        
            var uploadInst<?php echo $vo['id']; ?> = upload.render({
                elem: '#adBtn<?php echo $vo['id']; ?>'
                ,url: '<?php echo url("UpFiles/upload"); ?>'
                ,before: function(obj){
                    //预读本地文件示例，不支持ie8
                    obj.preview(function(index, file, result){
                        $('#adPic<?php echo $vo['id']; ?>').attr('src', result); //图片链接（base64）
                    });
                },
                done: function(res){
                    if(res.code>0){
                        $('#pic<?php echo $vo['id']; ?>').val(res.url);
                    }else{
                        //如果上传失败
                        return layer.msg('上传失败');
                    }
                }
                ,error: function(){
                    //演示失败状态，并实现重传
                    var demoText = $('#demoText<?php echo $vo['id']; ?>');
                    demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                    demoText.find('.demo-reload').on('click', function(){
                        uploadInst<?php echo $vo['id']; ?>.upload();
                    });
                }
            });
            <?php endforeach; ?>
    })
</script>
</body>
</html>