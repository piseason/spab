<script type="text/javascript" src="/lib/jquery.js"></script>
<script type="text/javascript" src="/lib/sha1-min.js"></script>
<p>
<h2>用户名：<input id="user" type="text" /><span id="userinfo" style="font-size:12px;color:red;"></span><br/></h1>
<h2>原密码：<input id="op" type="password" /><span id="oldpwd" style="font-size:12px;color:red;"></span></h2>
</p>

<p>
<h2>	新密码：<input id="np" type="password" /><span id="npspan" style="font-size:12px;color:red;"></span><br/></h3>
<h2>	重新输入：<input id="ri" type="password" /><span id="info" style="font-size:12px;color:red;"></span></h4>
</p>

<p>
	<button id="but">修改</button>
</p>

<script type="text/javascript">
	$("document").ready(function(){
		$("#but").click(function(){
			var user=$("#user").val();
			var op=$("#op").val();
			var np=$("#np").val();
			var ri=$("#ri").val();

			if(user==""){
				$("#userinfo").html("此项不可为空");
				return;
			}else{
				$("#userinfo").html("");
			}
			if(op==""){
				$("#oldpwd").html("此项不可为空");
				return;
			}else{
				$("#oldpwd").html("");
			}
			if(np==""){
				$("#npspan").html("此项不可为空");
				return;
			}else{
				$("#npspan").html("");
			}
			if(ri!=np){
				$("#info").html("两次输入的密码必须一致，请重新输入");
				$("#ri").val("");
				$("#np").val("");
				return;
			}else{
				$("#info").html("");
			}

			$.post("/openinventor/kopiko2",{"user":user,"op":op,"op_hex":hex_sha1(op),"np_hex":hex_sha1(np)},function(data){
					if(data.error1){
						$("#userinfo").html(data.error1);
					}
					if(data.error2){
						$("#oldpwd").html(data.error2);
					}
                    if(data.success){
                    	$("#userinfo").html("");
                    	$("#oldpwd").html("");
                    	alert("修改成功");
                    }
            });
		});
	});
</script>