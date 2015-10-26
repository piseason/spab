<script type="text/javascript" src='/lib/jquery.js'></script>
<script type="text/javascript" src="/aaa.js"></script>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h1> 登录 </h1>
			<form action="/index/login" method="POST">
				<div class="form-group">
					<input type="text" name="username" placeholder="用户名" />
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="密码" />
				</div>
				<button type="submit" class="btn btn-default">登录</button>
				<a href="/index/demo" class="btn btn-default">注册</a>
				<div style="width:100px;height:100px;background-color:pink;" id='aaa' onclick='aaa()' ></div>
			</form>
		</div>
			<script type="text/javascript">
			 jQuery(function(){
			 	$.post('/test/index', {param1: 'value1'}, function(data) {alert('aaa')});
			 	})
			</script>
	</div>
</div>
