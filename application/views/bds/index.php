	<?php if(empty($bdsWithCat)){ ?>
		<h2 class="pt-3">Toutes les BDs</h2>
	<?php } else { ?>
		<h2 class="pt-3">BDs de la catégorie <?php echo $categorie ?></h2>
	<?php } ?>

<!-- List all BDs -->
<div class="container">
	<div class="pagination-custom">
		<nav class ="pb-3 pt-2">
			<?php echo $links; ?>
		</nav>
	</div>
    <div class="row">
    <?php if(!empty($bds)){ foreach($bds as $row){ ?>
        <div class="col-sm-4 col-lg-4 col-md-4 pb-3">
			<a class="bd_Card" href="<?php echo base_url('bds/bd/'.$row->id); ?>">
				<img src="<?php echo base_url('uploads/product_images/'.$row->ref).'.jpg'; ?>" onerror="this.src='<?php echo base_url('uploads/product_images/defaut.jpg'); ?>'"/>
				<p class="bd_CardTitle"><?php echo $row->titre; ?></p>
				<p class="bd_CardPrice">$<?php echo $row->prix_public; ?> USD</p>
			</a>
			<a href="<?php echo base_url('add/'.$row->id); ?>" class="btn btn-info btn_bd_Card">Ajouter au panier</a>
        </div>
    <?php } }else if (!empty($bdsWithCat)){ foreach($bdsWithCat as $row){ ?>
		<div class="col-sm-4 col-lg-4 col-md-4 pb-3">
			<a class="bd_Card" href="<?php echo base_url('bds/bd/'.$row['id']); ?>">
				<img src="<?php echo base_url('uploads/product_images/'.$row['ref']).'.jpg'; ?>" onerror="this.src='<?php echo base_url('uploads/product_images/defaut.jpg'); ?>'"/>
				<p class="bd_CardTitle"><?php echo $row['titre']; ?></p>
				<p class="bd_CardPrice">$<?php echo $row['prix_public']; ?> USD</p>
			</a>
			<a href="<?php echo base_url('add/'.$row['id']); ?>" class="btn btn-info btn_bd_Card">Ajouter au panier</a>
		</div>
	<?php } } else { ?>
        <p>BD(s) not found...</p>
    <?php } ?>
    </div>
</div>
