<?php if(!defined('PERMIT')) { exit('<script type="text/javascript">window.location.href="../index.php"</script>'); } ?>
<div style="width:80%;margin-left: auto;margin-right: auto;">
			<div class="bs-example" data-example-id="list-group-variants">
			<div class="row">
				<ul class="list-group">
					<li class="list-group-item list-group-item-danger">文件名称</li>
					<li class="list-group-item list-group-item-success"><span id="jname"></span></li>
					<li class="list-group-item list-group-item-warning">文件大小</li>
					<li class="list-group-item list-group-item-info"><span id="jsize"></span></li>
					<li class="list-group-item list-group-item-success">下载地址</li>
					<li class="list-group-item list-group-item-warning">
					<textarea style="width:100%;overflow:auto; word-break:break-all;height:100px;max-width:100%;max-height:400px;" id="jurl" readonly="readonly"></textarea>
					</li>
					<li class="list-group-item list-group-item-success">提示信息</li>
					<li class="list-group-item list-group-item-danger"><span id="jmsg"></span><div id="jkey" style="display:none">联系QQ：<span id="jkey1"></span>&nbsp;&nbsp;&nbsp;API KEY:<span id="apikey"></span><br />已用次数：<span id="jkey2"></span>&nbsp;&nbsp;&nbsp;剩余次数：<span id="jkey3"></span>&nbsp;&nbsp;&nbsp;申请时间：<span id="jkey4"></span><br />温馨提示：<span id="jkey5"></span></div><div id="nbsp" style="display:none">&nbsp;&nbsp;&nbsp;&nbsp;<span id="jwar"></span></div></li>
					<li class="list-group-item list-group-item-warning">
						<div class="alert alert-success" role="alert" id="about">
							<strong>关于</strong><br /><br />本页面旨在方便一些不会使用API的普通用户来获取网盘下载地址<br />第一个空填网盘URL,第二空填APIKEY,没有可不填，我们承诺不会记录你的APIKEY，若仍担心APIKEY泄露您可继续使用免费版<br />URL填写规范：不需要填写“http://”,直接填写网盘地址，若有密码可用‘|’分开<br />如：yunpan.cn/cK6BdUtwmBVd3|d4d9<br />“榨干那些网盘”作者：<a href="//zg.yangsifa.com" target="_blank">admin@yangsifa.com</a>&nbsp;本页面作者：<a href="http://blog.lqweb.net" target="_blank">夏日聆风</a>
						</div>
					</li>
				</ul>
			</div>
			</div>
		</div>
<!--返回JSON处理-->
<script type="text/javascript">
var JSONObject= <?php echo $content;?>;
var message = JSONObject.msg;
var war = JSONObject.warning;
//var kmsg = JSONObject.downios_apikey.msg;
document.getElementById("jname").innerHTML=JSONObject.name
document.getElementById("jsize").innerHTML=JSONObject.size
document.getElementById("jurl").innerHTML=JSONObject.download
if(typeof message === 'undefined'  ){
	var kmsg = JSONObject.down_apikey.msg;
	if(typeof kmsg === 'undefined'  ){
		document.getElementById("apikey").innerHTML=JSONObject.down_apikey.apikey
		document.getElementById("jkey1").innerHTML=JSONObject.down_apikey.联系qq
		document.getElementById("jkey2").innerHTML=JSONObject.down_apikey.已用次数
		document.getElementById("jkey3").innerHTML=JSONObject.down_apikey.剩余次数
		document.getElementById("jkey4").innerHTML=JSONObject.down_apikey.申请时间
		document.getElementById("jkey5").innerHTML=JSONObject.down_apikey.温馨提示
		jkey.style.display = "block"//$(jkey).show()
	}else{document.getElementById("jmsg").innerHTML=JSONObject.down_apikey.msg}
}else{
document.getElementById("jmsg").innerHTML=JSONObject.msg
};
if(typeof war === 'undefined'  ){nbsp.style.display = "none";}else{nbsp.style.display = "block";document.getElementById("jwar").innerHTML=JSONObject.warning}
</script>
<!--返回JSON处理完毕-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>