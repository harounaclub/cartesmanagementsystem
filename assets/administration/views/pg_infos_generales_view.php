<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="#">Formulaire d'ajout</a></li>
									
								</ol>
								
</div>
							<div class="row">
								<?php echo form_open_multipart('administration/infosGenerales'); ?> 
								<div class="col-lg-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Ajouter/Modifier le logo</h2>
										</div>

										<?php

											             if(isset($infosGenerales)){

												            foreach ($infosGenerales as $info) {
                                                              
                                                              $logo=$info->logo;
                                                              if(empty($logo) || $logo==""){

                                                              	$img="1.jpg";

                                                              }else{

                                                                $img=$logo;
                                                              }
												             ?>
										<div class="card-body">
											
											<input type="file" name="userfile" class="dropify" data-default-file="<?php echo base_url(); ?>uploads/logo/<?php echo $img; ?>" data-height="300"  />
										</div>
									</div>
								</div>
                                    
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Formulaire</h2>
										</div>
										<div class="card-body"> 

											
											<div class="row">

													
												<div class="col-md-6">
													 
                                                    <div class="form-group">
														<input type="text" class="form-control is-invalid state-invalid" name="libelle_organisation" placeholder="Libellé organisation" value="<?php if(isset($info->libelle_organisation)) echo $info->libelle_organisation; ?>" >
													</div>

													<div class="form-group">
														<input type="text" class="form-control is-invalid state-invalid" name="pays" placeholder="Pays" value="<?php if(isset($info->pays)) echo $info->pays; ?>">
													</div>
													<div class="form-group">
														<input type="text" class="form-control is-invalid state-invalid" name="ville" placeholder="Ville" value="<?php if(isset($info->ville)) echo $info->ville; ?>" >
													</div>
													<div class="form-group">
														<input type="text" class="form-control is-invalid state-invalid" name="commune" placeholder="Commune" value="<?php if(isset($info->commune)) echo $info->commune; ?>" >
													</div>
													<div class="form-group">
														<input type="text" class="form-control is-invalid state-invalid" name="email" placeholder="Email" value="<?php if(isset($info->email)) echo $info->email; ?>" >
													</div>

													<div class="form-group">
														<input type="text" class="form-control is-invalid state-invalid" name="telephone" placeholder="Numéro de téléphone" value="<?php if(isset($info->telephone)) echo $info->telephone; ?>" >
													</div>

													<div class="form-group">
														<input type="text" class="form-control is-invalid state-invalid" name="horaire_travail" placeholder="Horaire de travail" value="<?php if(isset($info->horaire_travail)) echo $info->horaire_travail; ?>" >
													</div>
												</div>
												<div class="col-md-6">
													

													<div class="form-group">
														<input type="text" class="form-control is-invalid state-invalid" name="copyright" placeholder="Copyright" value="<?php if(isset($info->copyright)) echo $info->copyright; ?>" >
													</div>

													<div class="form-group">
														<input type="text" class="form-control is-invalid state-invalid" name="facebook" placeholder="Lien Facebook" value="<?php if(isset($info->facebook)) echo $info->facebook; ?>" >
													</div>

													<div class="form-group">
														<input type="text" class="form-control is-invalid state-invalid" name="twitter" placeholder="Lien Twitter" value="<?php if(isset($info->twitter)) echo $info->twitter; ?>" >
													</div>

													<div class="form-group">
														<input type="text" class="form-control is-invalid state-invalid" name="instagram" placeholder="Lien Instagram" value="<?php if(isset($info->instagram)) echo $info->instagram; ?>" >
													</div>

													<div class="form-group">
														<input type="text" class="form-control is-invalid state-invalid" name="youtube" placeholder="Lien Youtube" value="<?php if(isset($info->youtube)) echo $info->youtube; ?>" >
													</div>

													<div class="form-group">
														<input type="text" class="form-control is-invalid state-invalid" name="slogan" placeholder="Slogan" value="<?php if(isset($info->slogan)) echo $info->slogan; ?>" >
													</div>
												</div>
												<div class="col-md-12">
													<textarea name="bref_description" class="form-control is-invalid state-invalid" id="exampleFormControlTextarea1" rows="3" placeholder="Bref description ..."><?php if(isset($info->bref_description)) echo $info->bref_description; ?></textarea>
												</div>

												 <?php }
								                    }

								                 ?>

												
												
											</div>
											<div class="row" style="margin-top: 20px;">
                                                <div class="col-md-12">
													<ul class="list-inline wizard mb-0">
															
															<li class="next list-inline-item float-right"><button type="submit" class="btn btn-primary mb-0 waves-effect waves-light">Valider</button></li>
														</ul>
												</div>
											</div>
											<?php echo form_close(); ?>
										</div>
									</div>
									
								</div>
							</div>
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