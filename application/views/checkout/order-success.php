<h2 class="pt-3">Merci pour votre commande !</h2>
<p class="ord-succ pb-5">Votre commande a bien été prise en compte et sera traîtée rapidement.</p>

<!-- Order status & shipping info -->
<div class="row col-lg-12 ord-addr-info">
	<div class="col-sm-4 div-adresse">
		<div class="hdr titre-partieAdresse">Adresse de livraison</div>
		<p class="name-inCart"><?php echo $order['name']; ?></p>
		<p><?php echo $order['email']; ?></p>
		<p><?php echo $order['phone']; ?></p>
		<p><?php echo $order['address']; ?></p>
	</div>
	<div class="col-sm-2"></div>
	<div class="col-sm-6 info">
		<div class="hdr titre-partieAdresse">Order Info</div>
		<p class="name-inCart"><b>Numéro de commande: </b> #<?php echo $order['id']; ?></p>
		<p><b>Total: </b> <?php echo $order['grand_total'].'€'; ?></p>
	</div>
</div>

<!-- Order items -->
<div class="row checkout top-table-resume">
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
		<?php if(!empty($order['items'])){ foreach($order['items'] as $item){ ?>
			<tr>
				<td></td>
				<td><?php echo $item["titre"]; ?></td>
				<td><?php echo $item["prix_public"].'€'; ?></td>
				<td><?php echo $item["quantity"]; ?></td>
				<td><?php echo $item["sub_total"].'€'; ?></td>
			</tr>
		<?php } } ?>
		</tbody>
	</table>
</div>
