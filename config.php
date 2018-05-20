<?php

######################################
###配置文件，请根据提示修改相关配置###
######################################
####切记不要使用记事本编辑本文件######
######################################

$myapi = '';//这里填写你的APIKEY，没有请留空，申请请访问zg.yangsifa.com

$sec = '0';//是否开启密码保护，是填'1'，否填'0'

$password = "beautiful";//这里是密码

$check = '0';//是否开启登录界面验证码，是填'1'，否填'0'

$contact = "blog.lqweb.net";//这里填写你的联系方式，会显示在登陆界面以及APIKEY提供者处

$myhash = "2shaw9S7";//加密盐(八位随机数)，为了安全起见请一定要更改哦

################################
###好了，不要在编辑以下部分了###
################################

function get_password( $length = 24 ){
	$timenow = substr(md5(date('mYHd')), 0, $length);//md5加密，time()当前时间戳
	return $timenow;
}

$timehash = get_password( $length = 24 );

$sessionhash = $myhash.$timehash;

?>
<?php if(!defined('PERMIT')) { exit('<script type="text/javascript">window.location.href="index.php"</script>'); } ?>