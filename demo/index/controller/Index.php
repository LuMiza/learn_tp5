<?php
namespace app\index\controller;

use app\index\model\Orders;
use help\Folder;
use help\imgcompress;
use help\SqlFormatter;
use think\Request;
use think\Config;
use think\Env;
use think\Url;
use think\Db;
use app\index\model\User;

class Index extends Init
{
    public function index()
    {
        $str = "create table wx_category_tpl( 	 ct_id int(10) unsigned NOT NULL AUTO_INCREMENT  PRIMARY KEY comment '主键', 	 ct_title varchar(60) NOT NULL DEFAULT '' comment '模板命名', 	 ct_content varchar(1000) NOT NULL DEFAULT '' comment '模板内容', 	 ct_css varchar(1000) NOT NULL DEFAULT '' comment '模板css样式，', 	 ct_child varchar(1000) NOT NULL DEFAULT '' comment '子类个数', 	 ct_parent_css varchar(1000) NOT NULL DEFAULT '' comment '父类样式', 	 ct_parent_img varchar(1000) NOT NULL DEFAULT '' comment '父类图片地址', 	 ct_parent_url varchar(200) NOT NULL DEFAULT '' comment '父类的url', 	 ct_is_used tinyint(1) unsigned NOT NULL DEFAULT '0' comment '是否使用该模板：默认0【不使用】，1【使用】', 	 ct_add_time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP comment '时间' )engine InnoDB charset utf8 comment '【福利平台】分类模板表';";
        echo SqlFormatter::format($str);
        exit;
        echo '<pre>';
        print_r( $_GET );
        print_r( $this->request->param() );
        print_r( $this->request->get(false) );
        exit();
        $foo = 'lu';
        if( !isset($foo{5}) ){
            echo 'this is to short';
        }
        exit;
        session('lu_name','rumble');
        echo session_id();
        echo "<br/>\r\n";
        echo session_save_path();
        echo '<pre>';
        print_r( Folder::getFiles(session_save_path()) );
        echo "<br/>\r\n";
        $str = '&#27993;&#27743;&#30465; &#37329;&#21326;&#24066;';
        echo iconv('UTF-8//IGNORE','gb2312',$str);
        exit();
        $js = '1be4337aa4d0b55dbd1c9327994eecc8';
        var_dump($js == md5('lumingzhe') );
        echo md5('lumingzhe');
        exit();
//        echo url('admin/index/test',array('id'=>8),true,true);
        $arr = array(
            88,
            array('pp','uu'),
            array(
                array('three_one','three_two'),
                array('three_one','three_two'),
            ),
        );
        echo  multiImplode(',',$arr);
//        exit;
//        (new \app\index\event\User())->tt();
//        $event = \think\Loader::controller('User', 'event')->tt();
//        return $this->display($this->fetch('Index/test'));
        
        exit;
        echo url('admin/index/test',array('id'=>8),true,true);
        dump(Env::get('database.username'));
        exit;
        $url = 'http://bpic.588ku.com/element_origin_min_pic/01/51/88/565745d85903851.jpg';
        //配置文件
        //拓展配置文件配置获取
        dump(Config::get('self.config'));//extra目录下的lu.php文件的pp参数
//        dump(Config::get());//获取所有配置参数
        
        echo "当前模块名称是：" . request()->module();
        echo "当前模块名称是：" . request()->controller();
        echo "当前模块名称是：" . request()->action();
        //return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }
    
    public function hello(Request $request)
    {
        (new User())->getList();
        exit();
        echo Db::table('user')->force('u_openid')->select(false);
        exit;
        pp($_GET);
        
        exit();
        $where = array(
            'u_user_id' => array('eq',9)
        );
        $res = Db::table('user')->where($where)->whereOr(array('u_user_id'=>8))->select();
        pp(Db::getTableInfo('user'));
        exit;
        echo 88;
        echo  'Hello,' . $request->param('name') . '！';
    }
    
    public function test( )
    {
        $request = Request::instance();
        print_r(input('param.'));
        print_r($request->request());
        print_r($request->param());
        exit();
        
        echo 'get参数：';
        $request->param();
        dump(input());
        exit();
        echo "当前模块名称是：" . request()->module();
        echo "当前模块名称是：" . request()->controller();
        echo "当前模块名称是：" . request()->action();
        echo 'this is my test program','<br/>';
        echo url('/home/user','t=88&p=99',true,true);
    }

    public function group(){
        echo 'this is group';
        $a = [88=>88,99=>99];
        echo json_encode($a);
        print_r( json_decode('{"21":"95"}',true) );
    }

    public function get(){
        $rest = Orders::get(function($query){
            $query->field('order_sn')->where('o_id',1);
        });
        echo $rest['order_sn'],'<br/>';
        echo '<pre>';
        print_r($rest);
    }

    public function img(){
       /* $img = APP_PATH.'img/wo_niu.png';
        $imgObj = imagecreatefrompng($img);
        imagepng($imgObj,APP_PATH.'new/wo_niu.png',2);*/
        $source =   APP_PATH.'img/w.png';
        $dst_img = APP_PATH.'new/w.png';
        $percent = 1;  #原图压缩，不缩放，但体积大大降低
        $image = (new imgcompress($source,$percent))->compressImg($dst_img);
    }

}
