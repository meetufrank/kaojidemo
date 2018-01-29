<?php
namespace app\admin\controller;
use think\Db;
use think\Request;
use think\Controller;
class PayOrder extends Common
{
    public function index(){
       
        if(request()->isPost()) {
            $key=input('post.key');
            $page =input('page')?input('page'):1;
            $pageSize =input('limit')?input('limit'):config('pageSize');
            $map=[
                'delete_time'=>0
            ];
            //条件追加
            if(!empty($key)){
                $map['order_no']=$key;
            }
            
            $list = db('pay_order')
                ->where($map)
                ->order('addtime desc')
                ->paginate(array('list_rows'=>$pageSize,'page'=>$page))
                ->toArray();
            foreach ($list['data'] as $k=>$v){
                $list['data'][$k]['order_data']= json_decode($list['data'][$k]['order_data']);
                $list['data'][$k]['addtime'] = date('Y-m-d H:s',$v['addtime']);
            }
            return $result = ['code'=>0,'msg'=>'获取成功!','data'=>$list['data'],'count'=>$list['total'],'rel'=>1];
        }
        return $this->fetch();
    }
    //删除订单(软删除)
    public function del(){
        $map['id']=input('id');
        db('pay_order')->where($map)->update(['delete_time'=>time()]);
        return $result = ['code'=>1,'msg'=>'删除成功!'];
    }
    public function delall(){
        $map['id'] =array('in',input('param.ids/a'));
        db('pay_order')->where($map)->update(['delete_time'=>time()]);
        $result['msg'] = '删除成功！';
        $result['code'] = 1;
        $result['url'] = url('index');
        return $result;
    }
}