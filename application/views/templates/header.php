<html>
<head>
	<title>E-commerce</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('css/custom.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
		  rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark header-color">
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
			<li class="nav-item">
				<a href="<?php echo base_url('cart/index'); ?>" class="cart-link" title="View Cart">
					<i class="material-icons">
						shopping_cart
					</i><span>(<?php echo $this->cart->total_items(); ?>)</span>
				</a>
			</li>
		</ul>
	</div>
</nav>

<div class="container">

