<html>
<head>
	<title>E-commerce</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('css/custom.css'); ?>">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="/">BD FOLIZZ</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url(); ?>">Accueil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('/bds/index'); ?>">Toutes les BD</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('/cart/index'); ?>">Panier</a>
			</li>
		</ul>
	</div>
</nav>

<div class="container">

