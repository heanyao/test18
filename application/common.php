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
// 加密
function encryptStr($str, $key='8888'){
  $block = mcrypt_get_block_size('des', 'ecb');
  $pad = $block - (strlen($str) % $block);
  $str .= str_repeat(chr($pad), $pad);
  $enc_str = mcrypt_encrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);
  return base64_encode($enc_str);
}

// 解密
function decryptStr($str, $key='8888'){
  $str = base64_decode($str);
  $str = mcrypt_decrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);
  $block = mcrypt_get_block_size('des', 'ecb');
  $pad = ord($str[($len = strlen($str)) - 1]);
  return substr($str, 0, strlen($str) - $pad);
}


    //自定义二维数组排序
function diySort($a, $b){
    $key='addtime';
    if($a[$key] == $b[$key]) return 0;
    return ($a[$key] < $b[$key])?-1:1;
}

//判断输入是中文还是英文
function EnglishOrChinese($str){
    $mb = mb_strlen($str,'utf-8');
    $st = strlen($str);
    if($st==$mb)
        return 1;     //'纯英文';
    if($st%$mb==0 && $st%3==0){
        return 2;     //'纯汉字';
    }
    else{
        return 3;     //'汉英混合';
    }
}


//8位随机数
function myrandcode(){
 return date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);//生成随机订单号（当前日期加上8位随机数 2016071199575151）
}

//16位随机数
// function myrandcode(){
//  return date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);//生成随机订单号（当前日期加上8位随机数 2016071199575151）
// }