<h2 class="pt-3">Prévisualisation de la commande</h2>
<div class="row checkout">
	<!-- Order items -->
	<table class="table">
		<thead>
		<tr>
			<th width="13%"></th>
			<th width="34%">Product</th>
			<th width="18%">Price</th>
			<th width="13%">Quantity</th>
			<th width="22%">Subtotal</th>
		</tr>
		</thead>
		<tbody>
		<?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){ ?>
			<tr>
				<td></td>
				<td><?php echo $item["name"]; ?></td>
				<td><?php echo $item["price"].'€'; ?></td>
				<td><?php echo $item["qty"]; ?></td>
				<td><?php echo $item["subtotal"].'€'; ?></td>
			</tr>
		<?php } }else{ ?>
			<tr>
				<td colspan="5"><p>Aucun produit dans votre panier...</p></td>
			</tr>
		<?php } ?>
		</tbody>
		<tfoot>
		<tr>
			<td colspan="4"></td>
			<?php if($this->cart->total_items() > 0){ ?>
				<td class="text-center">
					<strong>Total <?php echo $this->cart->total().'€'; ?></strong>
				</td>
			<?php } ?>
		</tr>
		</tfoot>
	</table>
</div>

	<!-- Shipping address -->
	<form class="form-horizontal" method="post">
		<div class="ship-info">
			<div class="row">
				<div class="col-lg-12 title-livraison">
				<h4>Vos informations de livraison</h4>
				</div>
			</div>

			<div class="container">
				<div class="row form-custom">
					<div class="col-lg-6">
						<div class="form-group">
							<label class="control-label col-sm-2 title-adress required">Nom:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="name" value="<?php echo !empty($custData['name'])?$custData['name']:''; ?>" placeholder="Votre nom complet">
								<?php echo form_error('name','<p class="help-block error">','</p>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2 title-adress required">Email:</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="email" value="<?php echo !empty($custData['email'])?$custData['email']:''; ?>" placeholder="Votre email">
								<?php echo form_error('email','<p class="help-block error">','</p>'); ?>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label class="control-label col-sm-2 title-adress required">Téléphone:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="phone" value="<?php echo !empty($custData['phone'])?$custData['phone']:''; ?>" placeholder="Fixe ou portable">
								<?php echo form_error('phone','<p class="help-block error">','</p>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2 title-adress required">Adresse:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="address" value="<?php echo !empty($custData['address'])?$custData['address']:''; ?>" placeholder="Votre adresse complète">
								<?php echo form_error('address','<p class="help-block error">','</p>'); ?>
							</div>
						</div>
					</div>
					<div class="footBtn col-lg-12 valid-buttons">
						<div>
						<a href="<?php echo base_url('cart/index'); ?>" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Retour au panier</a>
						</div>
						<div class="button-ok-form">
						<button type="submit" name="placeOrder" class="btn btn-success orderBtn">Valider la commande <i class="glyphicon glyphicon-menu-right"></i></button>
						</div>
					</div>
				</form>
		</div>
	</div>
</div>
