<?php
/* *
 * 配置文件
 */
 
//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
//商户ID
$alipay_config['partner']		= '1000';      //测试商户号，请填写申请的商户id, 申请地址：pay.700b.cn

//商户KEY
$alipay_config['key']			= '76vzGa67z0IKJfWOpQwjzj0IF0WkoJ7O';


//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑


//签名方式 不需修改
$alipay_config['sign_type']    = strtoupper('MD5');

//字符编码格式 目前支持 gbk 或 utf-8
$alipay_config['input_charset']= strtolower('utf-8');

//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http,(最好是http)
$alipay_config['transport']    = 'http';

//支付API地址
$alipay_config['apiurl']    = 'http://pay.700b.cn/';
?>