<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="#">Formulaire d'ajout</a></li>
									
								</ol>
								<div class="btn-group mb-0">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?php echo base_url(); ?>administration/gestionApproCartes"><i class="fas fa-eye mr-2"></i>Voir la liste des approvisionnements</a>
										
										
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i> Paramètres</a>
									</div>
								</div>
</div>
							<?php echo form_open('administration/ajoutApproCartes'); ?>
							<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Formulaire d'enregistrement approvisionnement</h2>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<input type="text" class="form-control" name="date_commande" placeholder="Entrer la date de la commande" value="">
														<?php echo form_error('date_commande','<font color="red">','</font>'); ?>
													</div>
													<div class="form-group">
														<input type="text" class="form-control" name="quantite" placeholder="Entrer la quantité de carte commandée" value="" >
													    <?php echo form_error('quantite','<font color="red">','</font>'); ?>
													</div>
													<div class="form-group">
														<input type="text" class="form-control" name="n_debut" placeholder="Entrer le numero de debut" value="" >
													    <?php echo form_error('n_debut','<font color="red">','</font>'); ?>
													</div>

                                                    <div class="form-group">
														<input type="text" class="form-control" name="n_fin" placeholder="Entrer le numero de fin" value="" >
													    <?php echo form_error('n_fin','<font color="red">','</font>'); ?>
													</div>
													
												</div>
											
												<div class="col-md-12">
													
												</div>

												
												
											</div>
											<div class="row" style="margin-top: 20px;">
                                                <div class="col-md-12">
													<ul class="list-inline wizard mb-0">
															
															<li class="next list-inline-item float-right"><button type="submit" class="btn btn-primary mb-0 waves-effect waves-light">Valider</button></li>
														</ul>
												</div>
											</div>
										</div>
									</div>
									
								</div>
							</div>
							<?php echo form_close(); ?>
<!-- file uploads js -->
<script src="<?php echo base_url(); ?>assets/administration/plugins/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/administration/plugins/fileuploads/js/dropify.min.js"></script>
							<script>
		$('.dropify').dropify({
			messages: {
				
				'replace': 'Cliquer/déposer ou remplacer le logo',
				'remove': 'Supprimer',
				'error': 'Ooops, something wrong appended.'
			},
			error: {
				'fileSize': 'The file size is too big (2M max).'
			}
		});
	</script>