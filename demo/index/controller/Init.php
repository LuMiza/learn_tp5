<?php
namespace app\index\controller;

use think\Controller;

class Init extends Controller{
    
    protected function _initialize(){
        /**
         * permission权限表
         *          id  name权限名称   model_name模块名   controller_name控制器名   action_name 方法名
         * role角色表  
         *          id   name 角色名称
         * user用户表
         *      id
         * role_user 用户角色表
         * 
         * role_permission 角色权限表
         * */
        //echo '这个是_initialize';
    }
}