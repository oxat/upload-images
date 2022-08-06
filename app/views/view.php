<div align="center">
	<img src="/Upload/<?php echo $page; ?>">
</div>
<br>
<div class="section-wrapper">
	<strong>Image Link:</strong> <a href="https://<?php echo DOMAIN; ?>/images/<?php echo $slug; ?>">https://<?php echo DOMAIN; ?>/images/<?php echo $slug; ?></a>
	<br>
	<strong>Direct Link:</strong> <a href="https://<?php echo DOMAIN; ?>/Upload/<?php echo $page; ?>">https://<?php echo DOMAIN; ?>/Upload/<?php echo $page; ?></a>
	<br>
	<?php 
		if($ip_post == $ip_addres){
	?>
	<strong>Delete Link:</strong> <a href="https://<?php echo DOMAIN; ?>/delete/<?php echo $slug; ?>?code=<?php echo $cod_del; ?>">https://<?php echo DOMAIN; ?>/delete/<?php echo $slug; ?>?code=<?php echo $cod_del; ?></a>
	<?php 
		}
	?>
	<br><br>
	<strong>BBcodes:</strong> 
	<code>[img]https://<?php echo DOMAIN; ?>/Upload/<?php echo $page; ?>[/img]</code>
	<br>
	<strong>HTML:</strong> <code>&lt;img src="https://<?php echo DOMAIN; ?>/Upload/<?php echo $page; ?>" /&gt;</code>
	<br><br>
	<strong>Upload Date:</strong> <?php echo $data; ?> UTC<br><br>
	<div align="center">
		<div class="col-sm-6 col-md-3 mg-t-20 mg-md-t-0">
			<a href="https://<?php echo DOMAIN; ?>/report/<?php echo $slug; ?>" class="btn btn-primary btn-block mg-b-10">Report</a>
		</div>
	</div>
</div>
