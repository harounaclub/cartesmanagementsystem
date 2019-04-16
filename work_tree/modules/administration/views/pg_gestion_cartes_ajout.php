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
							<?php echo form_open('administration/ajoutCartes'); ?>
							<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Formulaire d'enregistrement de cartes</h2>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-md-6">

												<div class="form-group">
													
													<select class="form-control select2 w-100" name="id_cmd_appro">
													<option value="">Selectionner la commande d'approvis. </option>

													<?php

																 if(isset($list_cmdAppro)){
																	$compt=0;
																	foreach ($list_cmdAppro as $info) {
																		$compt++;
																		
																		foreach($info["_id"] as $value){

																			$id_m_appro=$value;

																		?>

																			<option value="<?php echo $id_m_appro; ?>"><?php echo $info["designation_approCartes"]." / Qte :".$info["quantite"]; ?> </option>
																		
																		<?php

																		}
																	}

																 }
																	  
															?>
												   
													
											   
													</select>
												</div>
													
													<div class="form-group">
													<textarea class="form-control" name="description_lot" rows="5" placeholder="Entrer la description du lot"></textarea>
														
													    <?php echo form_error('description_lot','<font color="red">','</font>'); ?>
													</div>
													

                                                    
													
												</div>
												<div class="col-md-6">

												<div class="form-group">
													
														<select class="form-control select2 w-100" name="mois_expiration">
                                                        <option value="">Selectionner le mois d'expiration </option>

														<option value="01">01 - Janvier</option>
														<option value="02">02 - Fevrier</option>
														<option value="03">03 - Mars</option>
														<option value="04">04 - Avril</option>
														<option value="05">05 - Mai</option>
														<option value="06">06 - Juin</option>

														<option value="07">07 - Juillet</option>
														<option value="08">08 - Août</option>
														<option value="09">09 - Septembre</option>
														<option value="10">10 - Octobre</option>
														<option value="11">11 - Novembre</option>
														<option value="12">12 - Decembre</option>

														</select>
												</div>

												<div class="form-group">
													
														<select class="form-control select2 w-100" name="annee_expiration">
                                                        <option value="">Selectionner l'année d'expiration </option>

														<option value="2019">2019</option>
														<option value="2020">2020</option>
														<option value="2021">2021</option>
														<option value="2022">2022</option>
														<option value="2023">2023</option>
														<option value="2024">2024</option>

														

														</select>
												</div>

												   

													<div class="form-group">
														<input type="text" class="form-control" name="int_debut" placeholder="Indice debut carte" value="">
														<?php echo form_error('int_debut','<font color="red">','</font>'); ?>
													</div>
													<div class="form-group">
														<input type="text" class="form-control" name="int_fin" placeholder="Indice fin carte" value="" >
													    <?php echo form_error('int_fin','<font color="red">','</font>'); ?>
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