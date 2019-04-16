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
							<?php echo form_open('administration/gestionCartesAffectations_ajout'); ?>
							<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Formulaire d'affectations de cartes spéciales</h2>
										</div>
										<div class="card-body">

										<div class="row">
												<div class="col-md-6">
												<h3>Faites le choix de votre mode d'affectattion</h3>
													<div class="custom-control custom-radio mb-3">
														<input class="custom-control-input" name="choix" id="customRadio1" type="radio" checked>
														<label class="custom-control-label" for="customRadio1">Affectation par lot</label>
													</div>
													<div class="custom-control custom-radio mb-3">
														<input class="custom-control-input" name="choix" id="customRadio2" type="radio">
														<label class="custom-control-label" for="customRadio2">Affectation par cartes</label>
													</div>
												</div>
										</div>
											<div class="row">

												<div class="col-md-12" id="select_lot">

												
													
													<div class="form-group">
													
														<select class="form-control select2 w-100" name="id_lot">
                                                        <option value="">Selectionner un lot de cartes </option>

														<?php
	
														             if(isset($liste_lots)){
                                                                        $compt=0;
															            foreach ($liste_lots as $info) {
																			$compt++;
																			
																			foreach($info["_id"] as $value){

																				$id_m_lot=$value;

																			?>

																				<option value="<?php echo $info["id_lot"]; ?>"><?php echo $info["numero_cartes_lot"]."/ Qte : ".$info["nbre_total_cartes_lot"]; ?> </option>
																			
																			<?php

																			}
																		}

																	 }
			                                                              
															    ?>
                                                       
                                                        
                                                   
														</select>
													</div>
													
													
													
												</div>

												<div class="col-md-6" id="indice_depart">

													<div class="form-group">
															<input type="text" class="form-control" name="indice_depart" placeholder="Entrer le premier indice de carte" value="">
															<?php echo form_error('date_commande','<font color="red">','</font>'); ?>
													</div>

												

												</div>


											
												<div class="col-md-6" id="indice_fin">

													<div class="form-group">
															<input type="text" class="form-control" name="indice_fin" placeholder="Entrer le dernier indice de carte" value="">
															<?php echo form_error('date_commande','<font color="red">','</font>'); ?>
													</div>
													
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

	<script type="text/javascript">

	// A $( document ).ready() block.
		$( document ).ready(function() {
			console.log( "ready!" );

			$("#indice_depart").hide();
			$("#indice_fin").hide();
			$("#select_lot").show();
		});

	
		
		$("#customRadio1").click(function() {

			$("#indice_depart").hide();
			$("#indice_fin").hide();
			$("#select_lot").show();
		});

		$("#customRadio2").click(function() {

			$("#indice_depart").show();
			$("#indice_fin").show();
			$("#select_lot").hide();
		});


		
	
	</script>