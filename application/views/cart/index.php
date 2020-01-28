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
			<th width="12%"></th>
		</tr>
		</thead>
		<tbody>
		<?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){    ?>
			<tr>
				<td><?php echo $item['name']; ?></td>
				<td><?php echo '$'.$item["price"].' USD'; ?></td>
				<td><?php echo $item["qty"]; ?></td>
				<td><?php echo '$'.$item["subtotal"].' USD'; ?></td>
			</tr>
		<?php } }else{ ?>
		<tr><td colspan="6"><p>Votre panier est vide.....</p></td>
			<?php } ?>
		</tbody>
		<tfoot>
		<tr>
			<td><a href="<?php echo base_url('bds/index'); ?>" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continuer les achats</a></td>
			<td colspan="3"></td>
			<?php if($this->cart->total_items() > 0){ ?>
				<td class="text-left">Grand Total: <b><?php echo '$'.$this->cart->total().' USD'; ?></b></td>
			<?php } ?>
		</tr>
		</tfoot>
	</table>
</div>
