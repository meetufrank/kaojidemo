<?php
namespace app\mobile\controller;
class Index extends Common{
    public function _initialize(){
        parent::_initialize();
    }
    public function index(){
        return $this->fetch();
    }
}