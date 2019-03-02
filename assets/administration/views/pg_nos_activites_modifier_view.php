<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="#">Formulaire</a></li>
									
								</ol>
								<div class="btn-group mb-0">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?php echo base_url(); ?>administration/nosActivitesListes"><i class="fas fa-eye mr-2"></i>Voir la liste des activités</a>
										
										
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i> Paramètres</a>
									</div>
								</div>
                            </div>
							<div class="row">

								<?php

														             if(isset($info_activite_id)){
                                                                        
															            foreach ($info_activite_id as $info) {

															            	 $imgs =$info->image ;
				                                                              if(empty($imgs) || $imgs==""){

				                                                              	$image="1.jpg";

				                                                              }else{

				                                                                $image=$imgs;
				                                                              }
															            	
			                                                              
															    ?>
								
								<div class="col-lg-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Ajouter/Modifier l'image de l'activité</h2>
										</div>
										<div class="card-body">
											<input type="file" class="dropify" data-default-file="<?php echo base_url(); ?>uploads/activite/<?php if(isset($image)) echo $image; ?>" data-height="300"  />
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


													<input type="hidden" name="id_activite" value="<?php if(isset($info->id_activite)) echo $info->id_activite; ?>">

													<div class="form-group">
														<input type="text" class="form-control is-invalid state-invalid" name="input" placeholder="Nom activité" value="<?php if(isset($info->nom_activite)) echo $info->nom_activite; ?>">
													</div>

												</div>

												<div class="col-md-6">
												    <div class="form-group">
														<input type="text" class="form-control is-invalid state-invalid" name="input" placeholder="Description courte" value="<?php if(isset($info->description_court)) echo $info->description_court; ?>">
												    </div>
												</div>
												
												<div class="col-md-12">
													<textarea class="form-control is-invalid state-invalid" id="exampleFormControlTextarea1" rows="3" placeholder="Description complète ..."><?php if(isset($info->description_complete)) echo $info->description_complete; ?></textarea>



												</div>


												<?php }
												                    }

												                ?>

											</div>
											<div class="row" style="margin-top: 20px;">
                                                <div class="col-md-12">
													<ul class="list-inline wizard mb-0">
															
															<li class="next list-inline-item float-right"><a href="#" class="btn btn-primary mb-0 waves-effect waves-light">Modifier</a></li>
														</ul>
												</div>
											</div>
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