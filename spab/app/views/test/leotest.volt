你是怎么知道有这个页面的？？？？！！！！！
<script type="text/javascript" src="/lib/jquery.js"></script>
<script type="text/javascript" src="/lib/sha1-min.js"></script>
<input type="text" id="pas" />
<button id="but"> do it</button>

<script type="text/javascript">
$("#but").click(function(){
	$.post("test/ttt",{"pas":hex_sha1($("#pas").val())},function(data){
		alert("return");
	});
});
	
</script>
