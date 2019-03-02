<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="#">Formulaire de modification</a></li>
									
								</ol>
								<div class="btn-group mb-0">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?php echo base_url(); ?>administration/slidersListes"><i class="fas fa-eye mr-2"></i>Voir la liste des slides</a>
										
										
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i> Paramètres</a>
									</div>
								</div>
</div>
							<div class="row">
									<?php echo form_open_multipart("administration/slidersModifier/$id_slide"); ?> 

									<?php

														             if(isset($info_slide_id)){
                                                                        
															            foreach ($info_slide_id as $info) {

															            	 $imgs =$info->img ;
				                                                              if(empty($imgs) || $imgs==""){

				                                                              	$img="1.jpg";

				                                                              }else{

				                                                                $img=$imgs;
				                                                              }
															            	
			                                                              
															    ?>
								<div class="col-lg-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Ajouter/Modifier l'image Slider</h2>
										</div>
										<div class="card-body">
											<input type="file" class="dropify" data-default-file="<?php echo base_url(); ?>uploads/sliders/<?php if(isset($img)) echo $img; ?>" data-height="300"  />
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
                                                    <input type="hidden" name="id_slide" value="<?php if(isset($info->id_slide)) echo $info->id_slide; ?>">

													<div class="form-group">
														<input type="text" class="form-control is-invalid state-invalid" name="titre1" placeholder="Titre 1" value="<?php if(isset($info->titre1)) echo $info->titre1; ?>">
													</div>
													<div class="form-group">
														<input type="text" class="form-control is-invalid state-invalid" name="titre2" placeholder="Titre 2" value="<?php if(isset($info->titre2)) echo $info->titre2; ?>" >
													</div>
													
												</div>
												<div class="col-md-6">
													

													<div class="form-group">
														<input type="text" class="form-control is-invalid state-invalid" name="titre3" placeholder="Titre 3" value="<?php if(isset($info->titre3)) echo $info->titre3; ?>" >
													</div>

													<div class="form-group">
														<input type="text" class="form-control is-invalid state-invalid" name="titre4" placeholder="Titre 4" value="<?php if(isset($info->titre4)) echo $info->titre4; ?>" >
													</div>

													<?php }
												                    }

												                ?>

													
												</div>
												
											</div>
											<div class="row" style="margin-top: 20px;">
                                                <div class="col-md-12">
													<ul class="list-inline wizard mb-0">
															
															<li class="next list-inline-item float-right"><button type="submit" class="btn btn-primary mb-0 waves-effect waves-light">Modifier</button></li>
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