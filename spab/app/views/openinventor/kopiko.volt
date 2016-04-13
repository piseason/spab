<script type="text/javascript" src="/lib/jquery.js"></script>
<p>
<h2>用户名：<input id="user" type="text" />{{username}}<br/></h1>
<h2>原密码：<input id="op" type="password" />{{oldpwd}}</h2>
</p>

<p>
<h2>	新密码：<input id="np" type="password" />{{newpwd}}<br/></h3>
<h2>	重新输入：<input id="ri" type="password" /><span id="info"></span></h4>
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

			if(ri!=np){
				$("#info").html("两次输入的密码必须一致，请重新输入");
				$("#ri").val("");
				$("#np").val("");
				return;
			}else{
				$("#info").html("");
			}

			// $.post("/openinventor/kopiko2",{"user":user,"op":hex_sha1($("#op").val()),"np":np},function(data){
   //                  if(!data.error){
   //                      window.location.href=data.url;
   //                  }else{
   //                      leomessage(data.error);
   //                  }
   //          });
		});
	});
</script>