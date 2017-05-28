
<?php

	session_start();
?>

<link rel="stylesheet" href="CSS/navbar.css"/>

<div class="container-fullwidth">

	<nav class="navbar" >
	    <div class="container-fluid">
		    <ul class="nav navbar-nav navbar-fixed-top">

		        <li class="active"> <a  class="logo_site" href="index.php">HOME</a> </li>
				<li><a href="Liste_highways.php">Liste Autoroutes</a></li>
				<li><a href="Liste_villes.php">Liste Villes</a></li>
				<li><a href="choix_itinéraire.php"></span> Itinéraire</a></li>
				<?php

					if ($_SESSION['connected'] == true) {
				?>

					<li class="user_name">Admin</li>
					<li>
						<form method="POST" action="login_management.php">
							<button style="margin-top: 1vh; margin-left: 1vw" type="submit" class="btn_submit btn btn-sm btn-default" value="Enter">
								Logout
							</button>
						</form>

					</li>




				<?php
					} else {
				?>
					<li><a href="login.php">Login</a></li>

				<?php
					}

				?>

		    </ul>
	    </div>
	</nav>
</div>




