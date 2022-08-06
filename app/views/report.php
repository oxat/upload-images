<div class="section-wrapper">
<center>
	<form id="upload" method="post" enctype="multipart/form-data">
		<div class="col-lg-4">
			<div class="form-group">
				<label class="form-control-label">Email: <span class="tx-danger">*</span></label>
				<input class="form-control" type="text" name="email" value="email@site.com" placeholder="email@site.com">
			</div>
		</div><!-- col-4 -->
		<div class="col-lg-4">
			<div class="form-group mg-b-10-force">
				<label class="form-control-label">Reason: <span class="tx-danger">*</span></label>
				<select class="form-control select2 select2-hidden-accessible" name="topic" data-placeholder="Choose country" tabindex="-1" aria-hidden="true">
					<option value="inappropriate">Inappropriate</option>
					<option value="hacking_or_spam">Hacking or Spam</option>
					<option value="copyrighted">Copyright/DMCA</option>
					<option value="gore">Gore</option>
				</select>
			</div>
		</div><!-- col-4 -->
		<div class="form-layout-footer">
			<button type="submit" name="submit" value="Upload" class="btn btn-primary bd-0">Report</button>
		</div><!-- form-layout-footer -->
	</div>
</center>
<br>
</div>
<br><br><br><br>
<?php
	if($message){
		if($message['success']){
			echo '<script type="text/javascript">
					swal("", "'.$message['success'].'", "success");
				  </script>
				  <script type="text/javascript">
						setTimeout(function () {
						window.location.href = "/";
					}, 2000); //will call the function after 2 secs.
				  </script>';
		}
		if($message['error']){
			echo '<script type="text/javascript">
					swal("", "'.$message['error'].'", "error");
				</script>';
		}
	}
?>