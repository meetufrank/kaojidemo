<?php
namespace app\common\logic;
use app\common\model\Region;
class KaodLogic extends Logic {
    
    private $db='user_kaod';
    private $alias='uk';

    /*
     * 关联查询考点数据
     */
    public function getKaod($map=null,$order=' sort asc') {
        
        //获取地区表的表名
        $region=Region::getInstance();
        $data= db($this->db)->alias($this->alias)
                ->field($this->alias.'.*,rg.name as areaname')
                ->join($region->name.' rg ', $this->alias.'.area = rg.id')
                ->where($map)
                ->order($order)
                ->select();
        
        return $data;
    }
    
  
}
