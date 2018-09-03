<?php
namespace  app\admin\model;

use think\Db;
use think\Model;

class orders extends Model{

    public function getlist(){
        /*return self::all(function($query){
            $query->select();
        });*/
        return Db::table('orders')->select();
    }



}