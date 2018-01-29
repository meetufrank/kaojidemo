<?php
namespace app\common\logic;
use app\common\model\Region;
class KjLogic extends Logic {
  
    protected  $where;
    public function autoload($map=null){
//        $this->where_query=''
//                . '->where(function($query){$query->where([\'is_open\'=>1,\'status\'=>1]);} '
        $this->where=[
           0=>[
               'is_open'=>1,
               'status'=>1,
           ],
            1=>[
               'is_open'=>1,
               'createtime'=>['elt',time()],
           ]
            
        ];
        $this->addfield($map);
    }
    
    
    /*
     * 给 where 加入额外条件
     * 
     */
    public function addfield($map=null) {
        if(is_array($map)&&!empty($map)){
             foreach ($this->where as $key => $value) {
                 foreach ($map as $k => $v) {
                     $this->where[$key][$k]= $v;
                 }
             }
         }
         define('WHEREARR', json_encode($this->where));
    }
    /*
     * 查询有效报考乐器数量
     */
    public function yq_count() {
        $this->autoload();
        $count=db('type')
                ->where(function($query){ $query->where(json_decode(WHEREARR,true)[0]);})
                ->whereOr(function($query){ $query->where(json_decode(WHEREARR,true)[1]);})
                        ->count(); 
        
        
        return $count;
    }
    
   /*
    * 查询有效比赛列表
    */
   public function getbslist($map=null) {
       $this->autoload($map);
 
        $list=db('game')
                ->where(function($query){ $query->where(json_decode(WHEREARR,true)[0]);})
                ->whereOr(function($query){ $query->where(json_decode(WHEREARR,true)[1]);})
                        ->select(); 
       
        return $list;
   }
   
   /*
    * 获取有效比赛费用列表
    */
   
   public function getgamecost($map=null) {
       $gameid='g';//比赛表
       $yqid='gy';//比赛乐器
       $teamid='gt';//参赛组
       $gamecost='gc';  //费用表
       $where=[
           0=>[
               $gamecost.'.is_open'=>1,
               $gamecost.'.status'=>1,
               $gameid.'.is_open'=>1,
               $gameid.'.status'=>1,
               $teamid.'.is_open'=>1,
               $teamid.'.status'=>1,
               $yqid.'.is_open'=>1,
               $yqid.'.status'=>1,
           ],
            1=>[
               $gamecost.'.is_open'=>1,
               $gamecost.'.createtime'=>['elt',time()],
               $gameid.'.is_open'=>1,
               $gameid.'.createtime'=>['elt',time()],
               $teamid.'.is_open'=>1,
               $teamid.'.createtime'=>['elt',time()],
               $yqid.'.is_open'=>1,
               $yqid.'.createtime'=>['elt',time()],
           ]
       ];
       //加入额外条件
       if(is_array($map)&&!empty($map)){
             foreach ($where as $key => $value) {
                 foreach ($map as $k => $v) {
                     $where[$key][$k]= $v;
                 }
             }
         }
         define('GEAMWHERE', json_encode($where));
         $fieldstr=$gamecost.'.id as levelid,'
                 .$gamecost.'.title as leveltitle,'
                 .$gameid.'.id as gameid,'
                 .$gameid.'.title as gametitle,'
                 .$yqid.'.id as yqid,'
                 .$yqid.'.title as yqtitle,'
                 .$teamid.'.id as teamid,'
                 .$teamid.'.title as teamtitle,'
                 .$gamecost.'.cost as cost,'
                 .$gamecost.'.service_cost as service_cost';
         $list=db('gamecost')->alias($gamecost)
                ->join(config('database.prefix').'game '.$gameid,$gamecost.'.gameid = '.$gameid.'.id','left')
                ->join(config('database.prefix').'gameyq '.$yqid,$gamecost.'.yqid = '.$yqid.'.id','left')
                ->join(config('database.prefix').'gameteam '.$teamid,$gamecost.'.teamid = '.$teamid.'.id','left')
                ->where(function($query){ $query->where(json_decode(GEAMWHERE,true)[0]);})
                ->whereOr(function($query){ $query->where(json_decode(GEAMWHERE,true)[1]);})
                ->field($fieldstr)
                        ->select(); 
              
         return $list;
   }
   
   /*
    * 验证比赛报名获取价格必需字段是否非法,并获取费用数据
    */
   public function getcost() {
       
       $form= json_decode(session('bsdata'),true);
       if(isset($form['bsid'])&&isset($form['levelid'])&&isset($form['teamid'])&&isset($form['yqid'])){
            $gameid=$form['bsid'];
            $levelid=$form['levelid'];
            $teamid=$form['teamid'];
            $yqid=$form['yqid'];
            if(!empty($gameid)&&!empty($levelid)&&!empty($teamid)&&!empty($yqid)){
                
           
           $where=[
               'gc.gameid'=>$gameid,
               'gc.id'=>$levelid,
               'gc.teamid'=>$teamid,
               'gc.yqid'=>$yqid
                
           ];
           $costlist= $this->getgamecost($where);
           
           return $costlist;
            }else{
                return false;
            }
       }else{
           return false;
       }
           
            
   }

   /*
    * 插入订单表
    */
   public function addorder($data) {
       
       $result=db('pay_order')->insert($data);
       return $result;
   }
   
   /*
    * 获取订单列表
    */
   public function getorder($map=null) {
       
       $list=db('pay_order')
               ->where($map)->select();
       
       return $list;
   }
}
