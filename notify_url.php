<?php
/* *
 * 功能：新科云支付异步通知页面
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。


 *************************页面功能说明*************************
 * 创建该页面文件时，请留心该页面文件中无任何HTML代码及空格。
 * 该页面不能在本机电脑测试，请到服务器上做测试。请确保外部可以访问该页面。
 * 该页面调试工具请使用写文本函数logResult，该函数已被默认关闭，见epay_notify_class.php中的函数verifyNotify
 */
require_once("epay.config.php");
require_once("lib/epay_notify.class.php");

//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyNotify($_GET);

if($verify_result) {//验证成功

	//请在这里加上商户的业务逻辑程序代
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）
	
    //获取通知返回参数，可参考技术文档中服务器异步通知参数列表
	//商户订单号
	$out_trade_no=$_GET['out_trade_no'];
	// //支付交易号
	$trade_no=$_GET['trade_no'];
	// //交易状态
	$trade_status = $_GET['trade_status'];
	// //支付方式
	$type = $_GET['type'];
	//商户id
	$pid=$_GET['pid'];
	//商品名称
	$name=$_GET['name'];
	//商品价格
	$money=$_GET['money'];


	if ($_GET['trade_status'] == 'TRADE_SUCCESS') { //判断该笔订单是否在商户系统中已经做过处理，请再添加自己数据库的订单支付状态为判断条件，以免重复操作同一订单
		
		
		//这里请进行数据库，订单信息状态的修改，
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//请务必判断请求时的id等参数与通知时获取的id等参数为一致的
			//如果有做过处理，不执行商户的业务程序
				
		//注意：
		//付款完成后，$_GET['trade_status']为系统发送该交易状态通知
		
		//数据库操作，也可自行引入数据库操作类和公共文件
		
			$servername = "localhost"; //数据库地址
			$username = "123";     //数据库用户名
            $password = "123";    //数据库密码
            $dbname = "123";      //数据库名
             
            // 创建连接
            $conn = new mysqli($servername, $username, $password, $dbname);
            // 检测连接
            if ($conn->connect_error) {
                die("连接失败: " . $conn->connect_error);
            } 
            //插入数据
            $sql = "INSERT INTO order (pid, out_trade_no, name,money,type,trade_status)
            VALUES ('{$pid}','{$out_trade_no}','{$name}','{$money}','{$type}','{$trade_status}')";
             
            if ($conn->query($sql) === TRUE) {
            	$conn->close();
                echo "success";
                
            } else {
            	//插入数据库失败 
                echo "fail";
            }
            		

       }

       	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
        
    	echo "success";	
	
     	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        else {
          //验证失败
            echo "fail";
        }
?>