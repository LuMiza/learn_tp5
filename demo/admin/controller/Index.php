<?php
namespace  app\admin\controller;

use app\admin\model\orders;
use app\index\controller\Init;

class Index extends Init{
    
    
    protected function dataMeger($starts,$ends){

    }

    public function index(){

        $arr = array('颜色:红色','尺寸:L');
        $arr = array('颜色:红色','尺寸:L','型号:890L');
        $result = array();
        $t = getCombinationToString($arr, 3);
        echo '<pre>';
        print_r($t);
        exit();
        $data = array(
            array('蓝色','绿色','粉红'),
            array('M'),
        );

        print_r($data);

        exit();
        $orders = new orders();
        $result = $orders->get(function($query){
            $query->find();
        });
        echo $result->order_sn;
        $alls = $orders->all(function($query){
            $query->select();
        });
/*        foreach ($alls as $key => $val){
            echo $val->address ,'<br/>';
        }*/
        $this->assign('all_list', $alls);
        return   $this->fetch();
    }
    
}