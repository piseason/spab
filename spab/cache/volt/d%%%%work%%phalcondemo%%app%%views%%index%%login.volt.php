<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h1> 登录 </h1>
			<?php if ($text) { ?>
			<p> <?php echo $text; ?> </p>
			<?php } else { ?>
			<p><label>用户名： <?php echo $username; ?></label></p>
			<p><label>昵称： <?php echo $name; ?></label></p>
			<p><label>Email： <?php echo $email; ?></label></p>
			<?php } ?>
		</div>
	</div>
</div>