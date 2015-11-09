<link rel="stylesheet" type="text/css" href="/css/login.css">
<script type="text/javascript" src="/lib/sha1-min.js"></script>
<div style="height:30px;"></div>
<div class="login">
    <div style='font-size:20px;color:purple;text-align:center;padding:30px 0;font-family: "微软雅黑"；'>欢&nbsp;迎&nbsp;登&nbsp;录</div>
    <div style='text-align:center'>
        <label for='username'><span style='font-size:25px;font-family: Microsoft YaHei UI; font-weight:normal;'>账&nbsp;号&nbsp;&nbsp;</span></label>
        <input autofocus required class='form-control' id='username' style='display:inline-block;height:36px;font-size:20px;width:180px;'/>
    </div>
    <div style='text-align:center;margin-top:10px;'>
        <label for='password'><span style='font-size:25px;font-family: Microsoft YaHei UI; font-weight:normal;'>密&nbsp;码&nbsp;&nbsp;</span></label>
        <input required type='password' class='form-control' id='password' style='display:inline-block;height:36px;font-size:20px;width:180px;'/>
    </div>
    <div style="height:30px;"></div>
    <div style="text-align:center">
         <button type="submit" id='submit' class='btn btn-warning' style='color:#000;border:0; width:75%; background-color:rgba(229,100,25,0.7); font-size:20px; padding:5px;font-family: Microsoft YaHei;' onmouseover= "this.style.backgroundColor = 'rgba(229,100,25,0.5)' ;this.style.color='#FFF' ;" onmouseout  ="this.style.backgroundColor = 'rgba(229,100,25,0.7)' ;this.style.color='#000' ">登&nbsp;&nbsp;录</button>
    </div>          
</div>
<a href="/test" style="margin:0 auto;">进入未来一周时间表下载</a>

<script type="text/javascript">
    $("document").ready(function(){
        $("#submit").click(function(){
	
            $.post("/superadmi/login",{"username":$("#username").val(),"password":hex_sha1($("#password").val())},function(data){
                    if(!data.error){
                        window.location.href=data.url;
                    }else{
                        leomessage(data.error);
                    }
            });
        });
    });
</script>
