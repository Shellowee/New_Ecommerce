<div class="row">

	<div class="col-3 left_DetailsBD">
		<p><?php echo $detailBd['titre']; ?></p>
		<img src="<?php echo base_url('uploads/product_images/'.$detailBd['ref']).'.jpg'; ?>" onerror="this.src='<?php echo base_url('uploads/product_images/defaut.jpg'); ?>'"/>
		<p><h2><?php echo $detailBd['prix_public']; ?>$</h2></p>
		<p>Genre : <?php echo $genre['nom']; ?></p>
	</div>

	<div class="col-9 right_DetailsBD">
		<p>DECOUVRIR LA BD...</p>
		<div>
			<p><h3><?php echo $detailBd['titre']; ?></h3></p>
			<p>De
				<?php foreach($auteurs as $auteur){ ?>
					<?php echo $auteur['nom']; ?>&nbsp;
				<?php } ?>
			</p>
			<p><span class="glyphicon glyphicon-book"></span> Edité chez <?php echo $editeur['nom']; ?></p>
			<p>Références : <span class="label label-danger"><?php echo $detailBd['ref_editeur']; ?></span>
			<span class="label label-primary"><?php echo $detailBd['ref_fournisseur']; ?></span></p>
		</div>
		<p><?php echo $detailBd['resume']; ?></p>
		<button onclick="history.go(-1);">< Retour à la liste </button>
	</div>

</div>






















