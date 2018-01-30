<?php
return array (
  'is_open' => 
  array (
    'id' => 196,
    'moduleid' => 19,
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
  \'options\' => \'禁用|0
开启|1\',
  \'fieldtype\' => \'varchar\',
  \'numbertype\' => \'1\',
  \'default\' => \'1\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'yqid' => 
  array (
    'id' => 175,
    'moduleid' => 19,
    'field' => 'yqid',
    'name' => '选择乐器',
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
  \'db\' => \'type\',
  \'name\' => \'title\',
  \'value\' => \'id\',
  \'where\' => \'\',
  \'fieldtype\' => \'mediumint\',
  \'numbertype\' => \'1\',
  \'size\' => \'\',
  \'default\' => \'\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 1,
    'status' => 1,
    'issystem' => 0,
  ),
  'title' => 
  array (
    'id' => 169,
    'moduleid' => 19,
    'field' => 'title',
    'name' => '等级名称',
    'tips' => '',
    'required' => 1,
    'minlength' => 1,
    'maxlength' => 80,
    'pattern' => 'defaul',
    'errormsg' => '标题必须为1-80个字符',
    'class' => 'title',
    'type' => 'text',
    'setup' => 'array (
  \'default\' => \'\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 2,
    'status' => 1,
    'issystem' => 1,
  ),
  'cost' => 
  array (
    'id' => 176,
    'moduleid' => 19,
    'field' => 'cost',
    'name' => '报考费用',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'number',
    'errormsg' => '请正确填写费用',
    'class' => 'cost',
    'type' => 'number',
    'setup' => 'array (
  \'numbertype\' => \'1\',
  \'decimaldigits\' => \'2\',
  \'default\' => \'0.00\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 3,
    'status' => 1,
    'issystem' => 0,
  ),
  'createtime' => 
  array (
    'id' => 171,
    'moduleid' => 19,
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
    'id' => 173,
    'moduleid' => 19,
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
  'template' => 
  array (
    'id' => 172,
    'moduleid' => 19,
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
    'status' => 0,
    'issystem' => 1,
  ),
);
?>