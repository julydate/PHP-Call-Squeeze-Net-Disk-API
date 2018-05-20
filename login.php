<?php
error_reporting(0);//抑制当前页面报错
define('PERMIT', TRUE);
session_start();
require 'config.php';
if ($sec == 0){exit ('<script type="text/javascript">window.location.href="index.php"</script>');}
?>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>榨干网盘API调用</title>
	<!--<link rel="shortcut icon" href="assets/favicon.ico" />-->
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.js"></script>
	<style>
	#searchbox1{
		text-align: center;
		left: 50%;
		top: auto;
		right: 50%;
		bottom: auto;
		padding-top: 100px;
		padding-right: 0px;
		padding-bottom: 50px;
		padding-left: 20px;
	}
	#searchbutton{
		text-align:center;
	}
	#div_geetest_lib{
		margin-left:auto;
		margin-right:auto;
	}
	#mmbox{
		width: 70%;
		margin-left:auto;
		margin-right:auto;
	}
	#about{
		margin-bottom: 0px;
	}
	</style>
</head>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">榨干那些网盘APIKEY版-登录界面</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">榨干</a></li>
            <li><a href="#about">关于</a></li>
            <li><a href="//zg.yangsifa.com" target="_blank">榨干网盘</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
        <div id="searchbox1" style="width:90%;margin-left: auto;margin-right: auto;">
			<img src="assets/zg.png" width="50%" />
			<br />
			<br />
			<br />
			<form id="formid" method = 'post'  action = 'index.php'>
				<center><table><tbody>
              	<tr>
              		<td>
				<div class="input-group" id="mmbox">
					<span class="input-group-addon" id="basic-addon1">密码</span>
					<input type="text" id="pwd" name="pwd" class="form-control" size="50" placeholder="在这里输入您的密码" aria-describedby="basic-addon1" />
				</div>
					</td>
				</tr><tr><td><br /><?php if(isset($_POST['fail'])){echo '<center><font style="color:#FF0000">检测到错误，请重新输入密码访问</font></center>';}?><br /></td></tr>
				<?php if($check == '1'){ ?>
				<tr>
					<td>
				<div class="input-group" id="div_geetest_lib">
				<div id="div_id_embed"></div>;
				<script type="text/javascript">
				
					var gtFailbackFrontInitial = function(result) {
						var s = document.createElement('script');
						s.id = 'gt_lib';
						s.src = 'http://static.geetest.com/static/js/geetest.0.0.0.js';
						s.charset = 'UTF-8';
						s.type = 'text/javascript';
						document.getElementsByTagName('head')[0].appendChild(s);
						var loaded = false;
						s.onload = s.onreadystatechange = function() {
							if (!loaded && (!this.readyState|| this.readyState === 'loaded' || this.readyState === 'complete')) {
								loadGeetest(result);
								loaded = true;
							}
						};
					}
					//get  geetest server status, use the failback solution


					var loadGeetest = function(config) {

						//1. use geetest capthca
						window.gt_captcha_obj = new window.Geetest({
							gt : config.gt,
							challenge : config.challenge,
							product : 'embed',
							offline : !config.success
						});

						gt_captcha_obj.appendTo("#div_id_embed");
					}

					s = document.createElement('script');
					s.src = 'http://api.geetest.com/get.php?callback=gtcallback';
					$("#div_geetest_lib").append(s);
					
					var gtcallback =( function() {
						var status = 0, result, apiFail;
						return function(r) {
							status += 1;
							if (r) {
								result = r;
								setTimeout(function() {
									if (!window.Geetest) {
										apiFail = true;
										gtFailbackFrontInitial(result)
									}
								}, 1000)
							}
							else if(apiFail) {
								return
							}
							if (status == 2) {
								loadGeetest(result);
							}
						}
					})()
					
					$.ajax({
								url : "gt/web/StartCaptchaServlet.php?rand="+Math.round(Math.random()*100),
								type : "get",
								dataType : 'JSON',
								success : function(result) {
									// console.log(result);
									gtcallback(result)
								}
							})
				</script>
				</div>
					</td>
				</tr>
				<?php } ?>
				<tr>
					<td><br /><br />
				<div id="searchbutton">
					<button type="button" class="btn btn-lg btn-primary" onclick = "checkUser();">提交</button>
           		</div>
					</td>
				</tr>
				</tbody></table></center>
			</form>
			<script>
				function checkUser(){
					var result = document.getElementById("pwd").value;
					if(result == ""  ){
						alert("密码不能为空");
						return false;
					}
					document.getElementById("formid").submit();
				}
			</script>
		</div>
	<div style="width:80%;margin-left: auto;margin-right: auto;">
		<div class="bs-example" data-example-id="list-group-variants">
			<div class="row">
				<ul class="list-group">
					<li class="list-group-item list-group-item-warning">
						<div class="alert alert-success" role="alert" id="about">
							<strong>关于</strong>&nbsp;&nbsp;&nbsp;&nbsp;<strong><font style="color:#FF0000">请输入密码，获取密码请联系<?php echo $contact ?></font></strong><br /><br />
							本程序旨在方便一些不会使用API的普通用户来获取网盘下载地址，我们承诺不会记录你的APIKEY，若仍担心APIKEY泄露您可继续使用免费版<br />
							URL填写规范：不需要填写“http://”,直接填写网盘地址，若有密码可用‘|’分开<br />
							如：yunpan.cn/cK6BdUtwmBVd3|d4d9<br />
							“榨干那些网盘”作者：<a href="//zg.yangsifa.com" target="_blank">admin@yangsifa.com</a>&nbsp;本程序作者：<a href="http://blog.lqweb.net" target="_blank">夏日聆风</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>