<!DOCTYPE html>
<html lang="fr" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Workspace</title>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
	</head>
	<body>
		<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="#">Workspace</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">

				</ul>
		    <form class="form-inline my-2 my-lg-0">
					<a class="btn btn-outline-warning my-2 my-sm-0 mr-2" href="http://localhost:8000">PhpMyAdmin</a>
		      <a class="btn btn-outline-primary my-2 my-sm-0" href="http://localhost:1080">MailDev</a>
		    </form>
		  </div>
		</nav>
		<?php
			require 'assets/pages/site.php';
		?>
		<script src="assets/js/jquery.js" charset="utf-8"></script>
		<script src="assets/js/bootstrap.min.js" charset="utf-8"></script>
	</body>
</html>
