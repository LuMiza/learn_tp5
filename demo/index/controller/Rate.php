<?php
namespace app\index\controller;

use think\Controller;

class Rate extends Controller{

    protected function getRate($arr){
        $result = '';
        //概率数组的总概率精度
        $sum = array_sum($arr);
        //概率数组循环
        foreach( $arr as $key => $val ){
            $rand = mt_rand(1,$sum);
            if( $rand <= $val ){
                $result = $key;
                break;
            }else{
                $sum -= $val;
            }
        }
        unset($arr);
        return $result;
    }
    public function index(){
        $prizes = array(
            '0' => array('id'=>1,'prize'=>'平板电脑','v'=>1),
            '1' => array('id'=>2,'prize'=>'数码相机','v'=>2),
            '2' => array('id'=>3,'prize'=>'音箱设备','v'=>10),
            '3' => array('id'=>4,'prize'=>'4G优盘','v'=>12),
            '4' => array('id'=>5,'prize'=>'10Q币','v'=>22),
            '5' => array('id'=>6,'prize'=>'下次没准就能中哦','v'=>50),
        );
        $arr = array();
        foreach($prizes as $key  => $val){
            $arr[$val['id']] = $val['v'];
        }
        $pos = $this->getRate($arr);
        echo $prizes[$pos-1]['prize'];


/*        array_walk($prizes,function($v,$k,$arr){
            echo $k,'<br/>';
            $arr[$v['id']] = $v['v'];
//            array_push($arr,$v['v']);
            echo '<pre>';
            print_r($arr);
        },$arr);
        echo '<pre>';
        print_r($arr);*/
    }

}