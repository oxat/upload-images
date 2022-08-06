<div class="section-wrapper">
	<div align="center">
		<h1>Select an image:</h1>
		<br>
		<form method="post" enctype="multipart/form-data">
			<div class="col-sm-6 col-md-3 mg-t-20 mg-md-t-0">
				<input type="file" name="file" value="" class="form-control">
			</div>
			<br>
			<div class="col-sm-6 col-md-3 mg-t-20 mg-md-t-0">
				<input type="submit" name="submit" value="Upload" class="btn btn-oblong btn-primary btn-block mg-b-10">
			</div>
		</form>
		<br><br>
		<h3>Drag and drop anywhere and start uploading your images now. 10 MB limit. (JPG, PNG, GIF) Charge quickly and safely.</h3>
		<small>By uploading, you agree to the <a href="/terms">Terms of Use</a>.</small>
	</div>
</div>
<?php
	if($message){
		if($message['success']){
			echo '<script type="text/javascript">
					swal("", "'.$message['success'].'", "success");
				  </script>
				  <script type="text/javascript">
						setTimeout(function () {
						window.location.href = "/images/'.$code.'";
					}, 2000); //will call the function after 2 secs.
				  </script>';
		}
		if($message['error']){
			echo '<script type="text/javascript">
					swal("", "'.$message['error'].'", "error");
				</script>';
		}
		if($message['true']){
			echo '<script type="text/javascript">
					swal("", "'.$message['true'].'", "success");
				  </script>
				  <script type="text/javascript">
						setTimeout(function () {
						window.location.href = "/";
					}, 2000); //will call the function after 2 secs.
				  </script>';
		}
	}
?>