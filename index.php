<?php
error_reporting(0);//抑制当前页面报错
define('PERMIT', TRUE);
require 'config.php';
if ($sec == '1'){//开启密码访问
	if(isset($_SESSION["session"])){if($_SESSION["session"] == $sessionhash){$isview = true;}else{$isview = false;}//检测到SESSION
		}else{//未检测到SESSION
			if(isset($_POST["session"])){if($_POST['session'] == $sessionhash){$isview = true;}else{$isview = false;}//检测到表单POST_SESSION
				}else{//未检测到表单POST_SESSION
				if(isset($_POST['pwd'])){//检测到表单POST_pwd
				//require_once dirname(dirname(__FILE__)) . '/lib/class.geetestlib.php';
				if($check == '1'){//开启验证码
				require_once('gt/lib/class.geetestlib.php');
				session_start();
				$GtSdk = new GeetestLib();
				if ($_SESSION['gtserver'] == 1) {
					$result = $GtSdk->validate($_POST['geetest_challenge'], $_POST['geetest_validate'], $_POST['geetest_seccode']);
					if ($result == TRUE) {
						//echo 'Yes!';
						if($_POST['pwd'] == $password){$isview = true;$_SESSION['session'] = $sessionhash;}else{$isview = false;}
					} else if ($result == FALSE) {
						//echo 'No';
						$isview = false;
					} else {
						//echo 'FORBIDDEN';
						$isview = false;
					}
				}else{
					if ($GtSdk->get_answer($_POST['geetest_validate'])) {
						//echo "yes";
						if($_POST['pwd'] == $password){$isview = true;$_SESSION['session'] = $sessionhash;}else{$isview = false;}
					}else{
						//echo "no";
						$isview = false;
					}
				}
				}else{//未开启验证码
					if($_POST['pwd'] == $password){$isview = true;$_SESSION['session'] = $sessionhash;}else{$isview = false;}
				}
				}else{//未检测到表单POST_pwd
					$isview = false;
				}
			}
	}
if($isview){ //密码正确返回值
require 'include/header.php';
if(isset($_POST['pan'])){//接收到提交的网盘地址返回值
	if (empty($_POST['api'])){
		echo'<!--php从API获取JSON1-->';
		$purl = $_POST["pan"];
		@ $handle = file_get_contents("http://zg.yangsifa.com/wp/?url=$purl&apikey=$myapi");
		if(!$handle){//链接API失败返回值
			require 'include/fail.php';
			die('error raised.');
			} else {//链接API成功返回值
				$content = $handle;
				/*while (!feof($handle)) {
					$content .= fread($handle, 10000);
				}*/
				fclose($handle);
				echo'<!--php从API获取JSON1完毕-->';
				require 'include/bt1.php';
				exit(0);
		}
		} else {
			echo'<!--php从API获取JSON2-->';
			$purl = $_POST["pan"];
			$papi = $_POST["api"];
			@ $handle = file_get_contents("http://zg.yangsifa.com/wp/?url=$purl&apikey=$myapi");
			if(!$handle){//链接API失败返回值
				require 'include/fail.php';
				die('error raised.');
				} else {//链接API成功返回值
					$content = $handle;
					/*while (!feof($handle)) {
						$content .= fread($handle, 10000);
					}*/
					fclose($handle);
					echo'<!--php从API获取JSON2完毕-->';
					require 'include/bt2.php';
			}
	}
	}else{//未接收到网盘地址返回值
		require 'include/footer.php';
}
	} else{//密码错误返回值
		echo '<form id="fail" method = "post"  action = "login.php"><input type="hide" style="display: none" name="fail" value="fail" /></form><script type="text/javascript">document.getElementById("fail").submit();</script>';
}
	} else{//未开启密码访问
		require 'include/header.php';
		if(isset($_POST['pan'])){//接收到提交的网盘地址返回值
			if (empty($_POST['api'])){
				echo'<!--php从API获取JSON1-->';
				$purl = $_POST["pan"];
				@ $handle = file_get_contents("http://zg.yangsifa.com/wp/?url=$purl&apikey=$myapi");
				if(!$handle){//链接API失败返回值
					require 'include/fail.php';
					die('error raised.');
					} else {//链接API成功返回值
						$content = $handle;
						/*while (!feof($handle)) {
							$content .= fread($handle, 10000);
						}*/
						fclose($handle);
						echo'<!--php从API获取JSON1完毕-->';
						require 'include/bt1.php';
						exit(0);
				}
				} else {
					echo'<!--php从API获取JSON2-->';
					$purl = $_POST["pan"];
					$papi = $_POST["api"];
					@ $handle = file_get_contents("http://zg.yangsifa.com/wp/?url=$purl&apikey=$myapi");
					if(!$handle){//链接API失败返回值
						require 'include/fail.php';
						die('error raised.');
						} else {//链接API成功返回值
							$content = $handle;
							/*while (!feof($handle)) {
								$content .= fread($handle, 10000);
							}*/
							fclose($handle);
							echo'<!--php从API获取JSON2完毕-->';
							require 'include/bt2.php';
					}
			}
			}else{//未接收到网盘地址返回值
				require 'include/footer.php';
		}
}	
?>