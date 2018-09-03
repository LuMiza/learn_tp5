<?php
namespace app\index\model;

use think\Model;
use think\Db;
class User extends Model{
    
    
    public function getList(){
        
        //pp(Db::table('user')->where('u_user_id = 8')->find());
    }
    
}