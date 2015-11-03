<?php

$localurl="10.254.20.50";
echo $localurl;


// header("Content-Type: text/html; charset=utf-8");
 include_once('CAS.php');			
 phpCAS::setDebug();												
// phpCAS::client(CAS_VERSION_2_0,'sso.buaa.edu.cn',443,'');
// phpCAS::setNoCasServerValidation();
// phpCAS::forceAuthentication();echo "ok";
// phpCAS::handleLogoutRequests();  
// /$auth = phpCAS::checkAuthentication();
// if($auth){
// 	$username = phpCAS::getAttributes();
// 	//echo $username['uid'];
// 	//$_SESSION["auth"]=$username;
// 	//header("Location: http://".$localurl.":5001/index/apply");   
// 	exit;
// } 




 //当前的登录用户ID
//如果有扩展属性 可以参考的到用户ID的方法如$userNo= phpCAS::getAttribute("cn");前提是cas客户段已经配置了扩展属性
?>
