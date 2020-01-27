<h2>BDs</h2>

<!-- Cart info -->
<a href="<?php echo base_url('cart/index'); ?>" class="cart-link" title="View Cart">
    <i class="glyphicon glyphicon-shopping-cart"></i>
    <span>(<?php echo $this->cart->total_items(); ?>)</span>
</a>

<!-- List all BDs -->
<div class="container">
    <div class="row">
    <?php if(!empty($bds)){ foreach($bds as $row){ ?>
        <div class="col-sm-4 col-lg-4 col-md-4 pb-3">
			<a class="bd_Card" href="<?php echo base_url('bds/bd/'.$row->id); ?>">
				<img src="<?php echo base_url('uploads/product_images/'.$row->ref).'.jpg'; ?>" onerror="this.src='<?php echo base_url('uploads/product_images/defaut.jpg'); ?>'"/>
				<p class="bd_CardTitle"><?php echo $row->titre; ?></p>
				<p class="bd_CardPrice">$<?php echo $row->prix_public; ?> USD</p>
			</a>
			<a href="<?php echo base_url('add/'.$row->id); ?>" class="btn btn-success btn_bd_Card">Ajouter au panier</a>
        </div>
    <?php } }else{ ?>
        <p>BD(s) not found...</p>
    <?php } ?>
    </div>
	<p><?php echo $links; ?></p>
</div>
