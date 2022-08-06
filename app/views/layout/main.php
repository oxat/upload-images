<!doctype HTML>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="author" content="IoNuT" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>UploadImg - <?php echo $title ?></title>
	<meta name="robots" content="index,follow,noodp, noydir" />
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link rel="stylesheet" href="/slim/slim.css">
	<link rel="stylesheet" href="/slim/slim.one.css">
	<link href="/slim/lib/Ionicons/css/ionicons.css" rel="stylesheet">
	<link href="/slim/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div class="slim-header">
      <div class="container">
        <div class="slim-header-left">
          <h2 class="slim-logo"><a href="/">Upload<span>Img</span></a></h2>
        </div>
		<?php if ($user->isAuth()) { ?>
			<div class="slim-header-right">
				<div class="dropdown dropdown-c">
					<a href="/" class="logged-user" data-toggle="dropdown">
						<img height="32" width="32" src="/slim/img/img2.jpg" alt="avatar">
						<span class="group-admin"> <?php echo $user->get()->user; ?></span>
					</a>
				</div>
				<div class="dropdown dropdown-c">
					<a href="/admin/logout" class="logged-user" data-toggle="dropdown">
						<span class="group-admin"> Logout</span>
					</a>
				</div>
			</div>
		<?php }else{
		//	echo '<div class="slim-header-right">
		//		<div class="dropdown dropdown-c">
		//			<a class="btn btn-oblong btn-primary btn-block mg-b-10" href="/admin" class="logged-user" data-toggle="dropdown">
		//				<span class="group-admin"> Login</span>
		//			</a>
		//		</div>
		//	</div>';
		} ?>
      </div><!-- container -->
    </div><!-- slim-header -->
	

	<div class="slim-mainpanel">
		<div class="container">
			<div class="slim-pageheader">
				<ol class="breadcrumb slim-breadcrumb"></ol>
				<h6 class="slim-pagetitle"><?php echo $title ?></h6>
			</div>
			<?php echo $html; ?>
		</div><!-- container -->
	</div><!-- slim-mainpanel -->
	<div class="slim-footer">
		<div class="container">
			<p>Copyright <?php echo date('Y')?> &copy; All Rights Reserved. UploadImg</p>
			<p>Designed by: <a href="">IoNuT</a></p>
		</div><!-- container -->
	</div><!-- slim-footer -->
</body>
</html>