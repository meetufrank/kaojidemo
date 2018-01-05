<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:49:"D:\www\kaoji/app/admin\view\module\fieldForm.html";i:1504236339;s:44:"D:\www\kaoji/app/admin\view\common\head.html";i:1512630547;s:44:"D:\www\kaoji/app/admin\view\common\foot.html";i:1503623995;}*/ ?>
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
<div class="admin-main layui-anim layui-anim-upbit" ng-app="hd" ng-controller="ctrl">
    <fieldset class="layui-elem-field layui-field-title">
        <legend><?php echo $title; ?></legend>
    </fieldset>
    <form class="layui-form layui-form-pane">
       <div class="layui-form-item">
            <label class="layui-form-label">字段类型</label>
            <div class="layui-input-4">
                <select id="type" name="type" lay-filter="type" ng-model="field.type" class="required" lay-verify="required" <?php if(ACTION_NAME == 'fieldedit'): ?>disabled<?php endif; ?>>
                    <option value='' >请选择字段类型</option>
                    <option value="catid">栏目</option>
                    <?php if(ACTION_NAME == 'fieldedit'): ?><option value="title">标题</option><?php endif; ?>
                   <!-- <option value="typeid">类别</option>-->
                    <option value="text" >单行文本</option>
                    <option value="textarea" >多行文本</option>
                    <option value="editor" >编辑器</option>
                    <option value="select" >下拉列表</option>
                    <option value="radio" >单选按钮</option>
                    <option value="checkbox" >复选框</option>
                    <option value="image" >单张图片</option>
                    <option value="images" >多张图片</option>
                    <option value="file" >文件上传</option>
                    <!--<option value="files" >多文件上传</option>-->
                    <option value="number" >数字</option>
                    <option value="datetime" >日期和时间</option>
                    <option value="posid" >推荐位</option>
                    <option value="groupid" >会员组</option>
                    <option value="linkage" >联动菜单</option>
                    <option value="template">模板选择</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">字段名</label>
            <div class="layui-input-4">
                <input type="text" name="field" ng-model="field.field" lay-verify="required" placeholder="必填：字段名" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">别名</label>
            <div class="layui-input-4">
                <input type="text" name="name" ng-model="field.name" lay-verify="required" placeholder="必填：别名" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">字段设置</label>
            <div class="layui-input-4" id="field_setup">

            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">class名称</label>
            <div class="layui-input-4">
                <input type="text" name="class" ng-model="field.class" value="" placeholder="class名称" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">必填</label>
            <div class="layui-input-block">
                <input type="radio" name="required" ng-model="field.required" ng-checked="field.required==1" ng-value="1" title="是">
                <input type="radio" name="required" ng-model="field.required" ng-checked="field.required==0" ng-value="0" title="否">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">验证规则</label>
            <div class="layui-input-4">
                <select name="pattern" lay-verify="required" ng-model="field.pattern" ng-options="v.name as v.title for v in pattern"></select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">字符长度</label>
            <div class="layui-input-inline" style="width: 100px;">
                <input type="text" name="minlength" ng-model="field.minlength"  class="layui-input">
            </div>
            <div class="layui-form-mid">-</div>
            <div class="layui-input-inline" style="width: 100px;">
                <input type="text" name="maxlength" ng-model="field.maxlength" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">错误信息</label>
            <div class="layui-input-4">
                <input type="text" name="errormsg" ng-model="field.errormsg" value="" placeholder="验证失败错误信息" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="submit"><?php echo lang('submit'); ?></button>
                <a href="<?php echo url('field',['id'=>$moduleid]); ?>" class="layui-btn layui-btn-primary"><?php echo lang('back'); ?></a>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>


<script src="__STATIC__/common/js/jquery.2.1.1.min.js"></script>
<script src="__STATIC__/common/js/angular.min.js"></script>
<script>
    var m = angular.module('hd',[]);
    m.controller('ctrl',['$scope',function($scope) {
        $scope.field = '<?php echo $info; ?>'!='null'?<?php echo $info; ?>:{type:'',field:'',name:'',required:1,minlength:'',maxlength:'',errormsg:'',pattern:''};
        $scope.pattern = <?php echo $pattern; ?>;
        var oldfield = $scope.field.field;
        layui.use(['form', 'layer'], function () {
            var form = layui.form, layer = layui.layer;
            field_setting($scope.field,'edit',form);
            //事件监听
            form.on('select(type)', function(type){
                field_setting(type,'add',form);
            });
            form.on('submit(submit)', function (data) {
                var loading = layer.load(1, {shade: [0.1, '#fff']});
                data.field.moduleid = "<?php echo $moduleid; ?>";
                if($scope.field.id){
                    data.field.oldfield = oldfield;
                    data.field.id = $scope.field.id;
                }
                $.post("", data.field, function (res) {
                    layer.close(loading);
                    if (res.code > 0) {
                        layer.msg(res.msg, {time: 1800, icon: 1}, function () {
                            location.href = res.url;
                        });
                    } else {
                        layer.msg(res.msg, {time: 1800, icon: 2});
                    }
                });
            });

        });
    }]);
    function field_setting(info,action,form) {
        if(action=='add'){
            var data =  '';
            var url =  "<?php echo url('fieldAdd'); ?>?isajax=1&moduleid=<?php echo $moduleid; ?>&type="+type.value;
        }else{
            var data = info.setup;
            var url =  "<?php echo url('fieldAdd'); ?>?isajax=1&moduleid=<?php echo $moduleid; ?>&type="+info.type+"&name="+info.field;
        }
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            beforeSend:function(){
                $('#field_setup').html('<i class="fa fa-spinner fa-spin fa-fw"></i>');
                form.render()
            },
            success: function(msg){
                $('#field_setup').html(msg);
                form.render()
            },
            complete:function(){
            },
            error:function(){
            }
        });
    }
</script>