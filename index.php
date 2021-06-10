<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">


	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">


	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Adminboard</title>
</head>

<body class="overlay-scrollbar ">

	<div class="navbar">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link">
					<i class="fas fa-bars" onclick="collapseSidebar()"></i>
				</a>
			</li>
			<li class="nav-item">
				<img src="assets/LOGO.png" class="logo" alt="Logo Myteam">

				</a>
			</li>
		</ul>
		<ul class="navbar-nav nav-right">

			<li class="nav-item">
				<div class="avt dropdown">
					<img class="dropdown-toggle" data-toggle="user-menu" src="https://cours-informatique-gratuit.fr/wp-content/uploads/2014/05/administrateur.png" alt="image Admin">
					<ul id="user-menu" class="dropdown-menu">
						<li class="dropdown-menu-item">

							<a href="../logout.php" class="dropdown-menu-link">
								<div>
									<i class="fas fa-sign-out-alt"></i>
								</div>
								<span>Déconnection</span>
							</a>
						</li>

					</ul>
				</div>
			</li>
		</ul>
	</div>

	<div class="sidebar">
		<ul class="sidebar-nav">
			<li class="sidebar-nav-item">
				<a href="dashboard.php" class="sidebar-nav-link">
					<div class="">
						<i class="fa fa-tachometer-alt"></i>
					</div>
					<span>
						dashboard
					</span>
				</a>

			</li>
			<li class="sidebar-nav-item">
				<a href="membres.php" class="sidebar-nav-link active">
					<div>
						<i class="fab fa-accusoft"></i>
					</div>
					<span>Afficher les memebres</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="publier_article.php" class="sidebar-nav-link">
					<div>
						<i class="fas fa-tasks"></i>
					</div>
					<span>Publier un nouvel article</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="articles.php" class="sidebar-nav-link">
					<div>
						<i class="fas fa-spinner"></i>
					</div>
					<span>Afficher les articles</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="membres.php" class="sidebar-nav-link">
					<div>
						<i class="fas fa-check-circle"></i>
					</div>
					<span>Afficher les membres</span>
				</a>
			</li>
		</ul>

	</div>

	<div class="wrapper">


		<div class="row">
			<div class="col-8 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h3>
							Table
						</h3>
						<i class="fas fa-ellipsis-h"></i>
					</div>
					<div class="card-content">
						<table>
							<thead>
								<tr>
									<th>#</th>
									<th>Nom</th>
									<th>Prénom</th>
									<th>Pseudo</th>
									<th>Email</th>
									<th>Role</th>
									<th>IP</th>
									<th>Status</th>
									<th>date d'inscription</th>
									<th></th>
									<th>Localisation</th>
								</tr>
							</thead>
							<tbody>
								<?php

								include 'includes/functions.php';
								$users = getUsersAndRoles();

								foreach ($users as $user) {

									echo '<tr>
								<td>' . $user['uid'] . ' </td>
								<td>' . $user['first_name'] . '</td>
								<td>' . $user['last_name'] . '</td>
								<td>' . $user['pseudo'] . '</td>
								<td>' . $user['email'] . '</td>
								<td>' . getRoleName($user['uid']) . '</td>
								<td>' . long2ip($user['ip']) . '</td>
								<td>
									<span class="dot">
										<i class="bg-success"></i>
										Completed
									</span>
								</td>
								<td>17/07/2020</td>
								<td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cc/Cross_red_circle.svg/1024px-Cross_red_circle.svg.png" alt="delete" style="height:25px;cursor:pointer;" /></td>
							</tr>';
								}
								?>

							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>



	</div>




	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src="index.js"></script>

</body>

</html>