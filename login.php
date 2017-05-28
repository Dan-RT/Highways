<html>
	<head>
		<meta charset="utf-8" />
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link href="CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="CSS/navbar.css"/>
		<link rel="stylesheet" href="CSS/itineraire.css"/>
	</head>

	<body>

		<?php include("navbar.php"); ?>

		<div class="container-fullwidth container-fluid" id="style_container">

			<div class="row">
				<div class="col-lg-offset-4 col-sm-5">
					<h1>Connectez-vous :</h1>
				</div>
			</div>

			<div class="row">
				<div id="workplace" class="col-lg-offset-4 col-sm-4">
					<div class="row form_inside">
						<form action="login_management.php" method="POST">
							<p>
								<label><input class="input-md form-control" name="user_name" placeholder="Admin ID"/></label>
							</p>

							<p>
								<label><input type="password" class="input-md form-control" name="password" placeholder="Password"/></label>
							<p>

							<button type="submit" class="btn_enter btn btn-md btn-default" value="Enter">
								<span class="glyphicon glyphicon-ok"></span> Entrer
							</button>
						</form>
						<div id="data_portion">

						</div>
					</div>
			    </div>
			</div>
	    </div>


		<?php include ("footer.php"); ?>


		<script src="js/lib/jquery.min.js"></script>
		<script src="js/login.js"></script>
	</body>
</html>