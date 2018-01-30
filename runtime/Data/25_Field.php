<?php
return array (
  'title' => 
  array (
    'id' => 212,
    'moduleid' => 25,
    'field' => 'title',
    'name' => '等级名称',
    'tips' => '',
    'required' => 1,
    'minlength' => 1,
    'maxlength' => 80,
    'pattern' => 'defaul',
    'errormsg' => '标题必须为1-80个字符',
    'class' => 'title',
    'type' => 'title',
    'setup' => 'array (
  \'thumb\' => \'0\',
  \'style\' => \'0\',
)',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 1,
    'status' => 1,
    'issystem' => 1,
  ),
  'yqid' => 
  array (
    'id' => 222,
    'moduleid' => 25,
    'field' => 'yqid',
    'name' => '选择比赛乐器',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'yqid',
    'type' => 'select_db',
    'setup' => 'array (
  \'multiple\' => \'0\',
  \'db\' => \'gameyq\',
  \'name\' => \'title\',
  \'value\' => \'id\',
  \'where\' => \'\',
  \'fieldtype\' => \'varchar\',
  \'numbertype\' => \'1\',
  \'size\' => \'\',
  \'default\' => \'\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 2,
    'status' => 1,
    'issystem' => 0,
  ),
  'teamid' => 
  array (
    'id' => 229,
    'moduleid' => 25,
    'field' => 'teamid',
    'name' => '选择比赛组',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'teamid',
    'type' => 'select_db',
    'setup' => 'array (
  \'multiple\' => \'0\',
  \'db\' => \'gameteam\',
  \'name\' => \'title\',
  \'value\' => \'id\',
  \'where\' => \'\',
  \'fieldtype\' => \'varchar\',
  \'numbertype\' => \'1\',
  \'size\' => \'\',
  \'default\' => \'\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 3,
    'status' => 1,
    'issystem' => 0,
  ),
  'cost' => 
  array (
    'id' => 223,
    'moduleid' => 25,
    'field' => 'cost',
    'name' => '报名费用',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'cose',
    'type' => 'number',
    'setup' => 'array (
  \'numbertype\' => \'1\',
  \'decimaldigits\' => \'2\',
  \'default\' => \'0.00\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 4,
    'status' => 1,
    'issystem' => 0,
  ),
  'service_cost' => 
  array (
    'id' => 236,
    'moduleid' => 25,
    'field' => 'service_cost',
    'name' => '平台服务费',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'service_cost',
    'type' => 'number',
    'setup' => 'array (
  \'numbertype\' => \'1\',
  \'decimaldigits\' => \'2\',
  \'default\' => \'0.00\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 4,
    'status' => 1,
    'issystem' => 0,
  ),
  'gameid' => 
  array (
    'id' => 235,
    'moduleid' => 25,
    'field' => 'gameid',
    'name' => '选择一场比赛',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'gameid',
    'type' => 'select_db',
    'setup' => 'array (
  \'multiple\' => \'0\',
  \'db\' => \'game\',
  \'name\' => \'title\',
  \'value\' => \'id\',
  \'where\' => \'\',
  \'fieldtype\' => \'varchar\',
  \'numbertype\' => \'1\',
  \'size\' => \'\',
  \'default\' => \'\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 5,
    'status' => 1,
    'issystem' => 0,
  ),
  'createtime' => 
  array (
    'id' => 214,
    'moduleid' => 25,
    'field' => 'createtime',
    'name' => '发布时间',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'date',
    'errormsg' => '',
    'class' => '',
    'type' => 'datetime',
    'setup' => '',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 97,
    'status' => 1,
    'issystem' => 1,
  ),
  'status' => 
  array (
    'id' => 216,
    'moduleid' => 25,
    'field' => 'status',
    'name' => '状态',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => '',
    'errormsg' => '',
    'class' => '',
    'type' => 'radio',
    'setup' => 'array (
  \'options\' => \'发布|1
定时发布|0\',
  \'fieldtype\' => \'tinyint\',
  \'numbertype\' => \'1\',
  \'labelwidth\' => \'75\',
  \'default\' => \'1\',
)',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 98,
    'status' => 1,
    'issystem' => 1,
  ),
  'is_open' => 
  array (
    'id' => 234,
    'moduleid' => 25,
    'field' => 'is_open',
    'name' => '是否开启',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'is_open',
    'type' => 'radio',
    'setup' => 'array (
  \'options\' => \'开启|1
禁用|0\',
  \'fieldtype\' => \'varchar\',
  \'numbertype\' => \'1\',
  \'default\' => \'1\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 98,
    'status' => 1,
    'issystem' => 0,
  ),
  'template' => 
  array (
    'id' => 215,
    'moduleid' => 25,
    'field' => 'template',
    'name' => '模板',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => '',
    'errormsg' => '',
    'class' => '',
    'type' => 'template',
    'setup' => '',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 99,
    'status' => 1,
    'issystem' => 1,
  ),
);
?>