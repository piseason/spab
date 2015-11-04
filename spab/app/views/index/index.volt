<script type="text/javascript" src='/lib/jquery.js'></script>
<link rel='stylesheet' type='text/css' href='/bootstrap/css/bootstrap.min.css' />

<div style="width:60%;margin:0 auto">
	<div style="height:40px"></div>
	<img src="/images/flag.jpg" style="width:100%">
</div>

<div class="control">
	<button class='btn btn-warning'  onmouseover= "this.style.backgroundColor = 'rgba(229,100,25,0.5)';this.style.color='#FFF' ;" onmouseout  ="this.style.backgroundColor = 'rgba(229,100,25,0.7)' ;this.style.color='#000'" onclick="window.location='/index/apply'">现在预约</button>
	<button class='btn btn-warning'  onmouseover= "this.style.backgroundColor = 'rgba(229,100,25,0.5)' ;this.style.color='#FFF' ;" onmouseout  ="this.style.backgroundColor = 'rgba(229,100,25,0.7)' ;this.style.color='#000' " onclick="window.location='/checkout/index'">预约查询</button>	
</div>
<a href="https://sso.buaa.edu.cn/logout">注销您的统一认证登录{{info}}</a><br/>
<a href="/test">进入未来一周时间表下载</a>
