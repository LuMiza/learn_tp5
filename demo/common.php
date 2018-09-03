<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 * implode函数的升级版
 * 将一个多维数组的值转化为字符串
 * @param   $glue
 * @param   $data
 * @return string
 */
function multiImplode($glue, $data)
{
    if( !isset($glue,$data) || !is_array($data) ){
        return '';
    }
    if( count($data)==0 ){
        return '';
    }
    if( count($data,1) == count($data) ){
        return implode($glue, $data);
    }
    $temp = array();
    if( !isset($method) ){
        $method = __FUNCTION__;
    }
    foreach( $data as $key => $val ){
        if( is_array($val) ){
            if( count($data,1) == count($data) ){
                $temp[] = implode($glue, $val);
            }else{
                $temp[] =$method($glue,$val);
            }
        }else{
            $temp[] = $val;
        }
    }
    return implode($glue, $temp);
}

function pp($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function getCombinationToString($arr, $m) {
    if ($m ==1) {
        return $arr;
    }
    $result = array();

    $tmpArr = $arr;
    //unset($tmpArr[0]);
    for($i=0;$i<count($arr);$i++) {
        $s = $arr[$i];
        $ret = getCombinationToString(array_values($tmpArr), ($m-1));

        foreach($ret as $row) {
            if( $s != $row ){
                $result[] = $s .' _ '. $row;
            }
        }
    }

    return $result;
}
