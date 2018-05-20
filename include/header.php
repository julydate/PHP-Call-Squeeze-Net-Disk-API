<?php if(!defined('PERMIT')) { exit('<script type="text/javascript">window.location.href="../index.php"</script>'); } ?>
<!DOCTYPE html>
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
	<link href="assets/zhagan.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
        <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">榨干网盘API调用</a>
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
            <center>
              <table><tbody>
              	<tr>
              		<td>
            			<div class="input-group">
						<form id="formid" method = 'post'  action = 'index.php'>
						<input type="text" name="pan" id="ur" class="form-control" size="50" placeholder="网盘地址不含‘http’" aria-describedby="basic-addon1" />
						<!--</form>-->
						</div>
					</td>
					<td width="12px">
            		</td>
					<td>
						<div class="input-group">
						<!--<form id="formid" method = 'post'  action = 'index.php'>-->
						<input type="text" name="api" id="key" class="form-control" size="50" placeholder="API KEY 没有可以不填" aria-describedby="basic-addon1" />
						<div style="display: none"><input type="text" name="session" value="<?php echo $sessionhash;?>" /></div>
						</form>
            			</div>
           		 	</td>
            		<td width="12px">
            		</td>
           			<td>
            			<div id="searchbutton">
							<button type="button" class="btn btn-lg btn-primary" onclick = "checkUser();">提交</button>
           				</div>
            		</td>
            	</tr>
              </tbody></table>
			  <script>
				function checkUser(){
					var result = document.getElementById("ur").value;
					if(result == ""  ){
						alert("URL不能为空");
						return false;
					}
					document.getElementById("formid").submit();
				}
			  </script>
             </center>
		</div>