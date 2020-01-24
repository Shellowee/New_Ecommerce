<h2>BDs</h2>
	
<!-- Cart info -->
<a href="<?php echo base_url('cart'); ?>" class="cart-link" title="View Cart">
    <i class="glyphicon glyphicon-shopping-cart"></i>
    <span>(<?php echo $this->cart->total_items(); ?>)</span>
</a>

<!-- List all BDs -->
<div class="row">
    <div class="col-lg-12">
    <?php if(!empty($bds)){ foreach($bds as $row){ ?>
        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
                <img src="<?php echo base_url('uploads/product_images/'.$row['ref']).'.jpg'; ?>" />
                <div class="caption">
                    <h4 class="pull-right">$<?php echo $row['prix_public']; ?> USD</h4>
                    <h4><?php echo $row['titre']; ?></h4>
                    <p><?php echo $row['resume']; ?></p>
                </div>
                <div class="atc">
                    <a href="<?php echo base_url('bds/addToCart/'.$row['id']); ?>" class="btn btn-success">
                        Add to Cart
                    </a>
                </div>
            </div>
        </div>
    <?php } }else{ ?>
        <p>BD(s) not found...</p>
    <?php } ?>
    </div>
</div>