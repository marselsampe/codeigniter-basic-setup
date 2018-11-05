<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Page not found</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?= base_url('assets/adminlte-2.4.5/dependencies/bootstrap/dist/css/bootstrap.min.css') ?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets/adminlte-2.4.5/dependencies/font-awesome/css/font-awesome.min.css') ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?= base_url('assets/adminlte-2.4.5/dependencies/Ionicons/css/ionicons.min.css') ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/adminlte-2.4.5/core/css/AdminLTE.min.css') ?>">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="<?= base_url('assets/adminlte-2.4.5/fonts.css') ?>">

    </head>


    <!-- Main wrapper-->  
    <div class="wrapper">
    	<!-- Content Wrapper. Contains page content -->
    	<div class="content-wrapper" style="margin-left: 0;">
    		
    		<!-- Main content -->
    		<section class="content">
    			<div class="error-page">
    				<h2 class="headline text-yellow"> 404</h2>

    				<div class="error-content">
    					<br/>
    					<center>
    						<h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
    						<p>
    							We could not find the page you were looking for.
    							<br/>
    							Meanwhile, you may <a href="<?= base_url('home') ?>">return to Home</a>.
    						</p>
    					</center>
    				</div>
    				<!-- /.error-content -->

    			</div>
    			<!-- /.error-page -->
    		</section>
    		<!-- /.content -->
    	</div>

    </div>

    <!-- JS DEPENDENCIES -->
    <script src="<?= base_url('assets/adminlte-2.4.5/dependencies/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets/adminlte-2.4.5/dependencies/bootstrap/dist/js/bootstrap.min.js') ?>"></script>

</body>
</html>