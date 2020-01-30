<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    /* Update item quantity */
    function updateCartItem(obj, rowid){
        $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
            if(resp == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
</script>

<h2 class="pt-3">Panier</h2>
<div class="row cart">
	<table class="table">
		<thead>
		<tr>
			<th width="30%">BDs</th>
			<th width="15%">Prix</th>
			<th width="13%">Quantité</th>
			<th width="20%">Sous-total</th>
			<th width="12%">Actions</th>
		</tr>
		</thead>
		<tbody>
		<?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){    ?>
			<tr>
				<td><?php echo $item['name']; ?></td>
				<td><?php echo $item["price"].'€'; ?></td>
				<td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>"
						   onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
				<td><?php echo $item["subtotal"].'€'; ?></td>
				<td>
					<a href="<?php echo base_url('cart/removeItem/'.$item["rowid"]); ?>" class="btn btn-danger"
					   onclick="return confirm('Etes vous sûr de vouloir supprimer cet article de votre panier?')"><i class="material-icons">
							delete
						</i></a>
				</td>
			</tr>
		<?php } }else{ ?>
		<tr><td colspan="6"><p>Votre panier est vide.....</p></td>
			<?php } ?>
		</tbody>
		<tfoot>
		<tr>
			<td><a href="<?php echo base_url('bds/index'); ?>" class="btn btn-warning"><i class="material-icons">
						add_shopping_cart
					</i> Continuer les achats</a></td>
			<?php if($this->cart->total_items() > 0) {?>
			<td>
				<a href="<?php echo base_url('checkout/index'); ?>" class="btn btn-success btn-block">
					<i class="material-icons">
						credit_card
					</i> Commander</a>
			</td>
			<?php } ?>
			<td colspan="1"></td>
			<?php if($this->cart->total_items() > 0){ ?>
				<td class="text-left">Grand Total: <b><?php echo $this->cart->total().'€'; ?></b></td>
				<td>
					<a href="<?php echo base_url('cart/endSession'); ?>" class="btn btn-secondary btn-block"
					   onclick="return confirm('Etes vous sûr de vouloir vider votre panier?')">
						<i class="material-icons">
							remove_shopping_cart
						</i></a>
				</td>
			<?php } ?>
		</tr>
		</tfoot>
	</table>
</div>
